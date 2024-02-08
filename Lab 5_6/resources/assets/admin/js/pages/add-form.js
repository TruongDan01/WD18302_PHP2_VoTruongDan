//Xử lý hiển thị trường tieu đề và lưu dữ liệu
let titleValue = "";
const titleInput = document.getElementById("titleInput");
const valueDisplay = document.getElementById("valueTitle");

if(titleInput) {
  titleInput.addEventListener("input", () => {
    titleValue = titleInput.value;
    valueDisplay.textContent = titleValue;
  });
  //Xử lý hiển thị trường lớp học và lưu dữ liệu vào mảng
  const classSelect = document.getElementById("choices-class");
  const classesSelect = document.getElementById("classes-select");
  const classes = [];
  
  classSelect.addEventListener("change", () => {
    classesSelect.innerHTML = "";
    classes.length = 0;
  
    Array.from(classSelect.selectedOptions).forEach((option) => {
      const classesValue = option.value;
      classes.push(classesValue);
  
      addSelectOption(classesValue, classesSelect);
    });
  });
  
  //Xử lý hiển thị trường lớp học và lưu dữ liệu vào mảng
  const subjectSelect = document.getElementById("choices-subject");
  const subjects = [];
  
  subjectSelect.addEventListener("change", () => {
    subjects.length = 0;
  
    Array.from(subjectSelect.selectedOptions).forEach((option) => {
      const subjectsValue = option.value;
      subjects.push(subjectsValue);
    });
  });
  
  //Xử lý hiển thị trường khóa học và lưu dữ liệu vào mảng
  const semesterSelect = document.getElementById("choices-semester");
  const semesterValue = document.getElementById("semester-select");
  const semesters = [];
  semesterSelect.addEventListener("change", () => {
    semesterValue.innerHTML = "";
    semesters.length = 0;
  
    Array.from(semesterSelect.selectedOptions).forEach((option) => {
      const semester = option.value;
      semesters.push(semester);
  
      addSelectOption(semester, semesterValue);
    });
  });
  
  function addSelectOption(select, selectElement) {
    const option = document.createElement("option");
    option.value = select;
    option.textContent = select;
    selectElement.appendChild(option);
  }
  
  //Xử lý hiển thị trường câu hỏi đánh giá và lưu dữ liệu vào mảng
  const answerTypeSelect = document.getElementById("exampleFormControlSelect1");
  const evaluationQuestionInput = document.getElementById("evaluationQuestion");
  const addQuestionButton = document.getElementById("addQuestionButton");
  const submitButton = document.querySelector('button[type="submit"]');
  let questionCount = 0;
  const questions = [];
  
  addQuestionButton.addEventListener("click", addQuestion);
  submitButton.addEventListener("click", submitForm);
  
  function generateEvaluationRadio(answerType) {
    const evaluationRadioContainer = document.createElement("div");
  
    if (answerType === "1") {
      evaluationRadioContainer.classList.add("form-check");
      ["Có", "Không"].forEach((option) =>
        evaluationRadioContainer.appendChild(createRadioOption(option, "1"))
      );
    } else if (answerType === "2") {
      evaluationRadioContainer.classList.add("form-check");
      ["Tốt", "Trung bình", "Kém"].forEach((option) =>
        evaluationRadioContainer.appendChild(
          createRadioOption(option, option.length)
        )
      );
    } else if (answerType === "3") {
      const textarea = document.createElement("textarea");
      textarea.classList.add("form-control");
      textarea.rows = 3;
      textarea.placeholder = "Nhập ý kiến của bạn...";
      evaluationRadioContainer.appendChild(textarea);
    }
  
    return evaluationRadioContainer;
  }
  
  function createRadioOption(labelText, value) {
    const div = document.createElement("div");
    const radioInput = document.createElement("input");
    const radioLabel = document.createElement("label");
    radioInput.classList.add("form-check-input");
    radioInput.type = "radio";
    radioInput.name = "evaluationRadio_" + questionCount;
    radioInput.value = value;
    radioLabel.classList.add("form-check-label");
    radioLabel.textContent = labelText;
    div.append(radioInput, radioLabel);
    return div;
  }
  
  function addQuestion() {
    const evaluationQuestion = evaluationQuestionInput.value;
    const answerType = answerTypeSelect.value;
  
    if (evaluationQuestion !== "") {
      questions.push({ question: evaluationQuestion, answerType });
      const questionDiv = document.createElement("div");
      questionDiv.classList.add("col-md-6");
      const formGroupDiv = document.createElement("div");
      formGroupDiv.classList.add("form-group");
      const questionLabel = document.createElement("label");
      questionLabel.textContent = evaluationQuestion;
      const answerContainer = generateEvaluationRadio(answerType);
      formGroupDiv.append(questionLabel, answerContainer);
      questionDiv.appendChild(formGroupDiv);
      document.getElementById("resultContainer").appendChild(questionDiv);
      showResultContainer();
      evaluationQuestionInput.value = "";
      answerTypeSelect.selectedIndex = 0;
      evaluationQuestionInput.focus();
    }
  }
  
  function submitForm(event) {
    event.preventDefault();
  
    const form = document.createElement("form");
    form.action = "/admin/feedback/new";
    form.method = "POST";
  
    const titleInput = document.createElement("input");
    titleInput.type = "text";
    titleInput.name = "title";
    titleInput.value = titleValue;
    form.appendChild(titleInput);
  
    const classesInput = document.createElement("input");
    classesInput.type = "hidden";
    classesInput.name = "classes";
    classesInput.value = JSON.stringify(classes);
    form.appendChild(classesInput);
  
    const subjectsInput = document.createElement("input");
    subjectsInput.type = "hidden";
    subjectsInput.name = "subjects";
    subjectsInput.value = JSON.stringify(subjects);
    form.appendChild(subjectsInput);
  
    const semestersInput = document.createElement("input");
    semestersInput.type = "hidden";
    semestersInput.name = "semesters";
    semestersInput.value = JSON.stringify(semesters);
    form.appendChild(semestersInput);
  
    const questionsInput = document.createElement("input");
    questionsInput.type = "hidden";
    questionsInput.name = "questions";
    questionsInput.value = JSON.stringify(questions);
    form.appendChild(questionsInput);
  
    document.body.appendChild(form);
    form.submit();
  }
  
  function showResultContainer() {
    const resultContainer = document.getElementById("resultContainer");
  }
  
}