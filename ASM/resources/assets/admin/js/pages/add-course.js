// Lưu dữ liệu teachers, semesters và classes
const teachers = [];
const semesters = [];
const classes = [];

// Lấy dữ liệu từ form và lưu vào mảng teachers
const teacherSelect = document.getElementById("choices-teacher");
if (teacherSelect) {
  teacherSelect.addEventListener("change", () => {
    teachers.length = 0;

    Array.from(teacherSelect.selectedOptions).forEach((option) => {
      const teacherValue = option.value;
      teachers.push(teacherValue);
    });
  });

  // Lấy dữ liệu từ form và lưu vào mảng semesters
  const semesterSelect = document.getElementById("choices-semester");
  semesterSelect.addEventListener("change", () => {
    semesters.length = 0;

    Array.from(semesterSelect.selectedOptions).forEach((option) => {
      const semesterValue = option.value;
      semesters.push(semesterValue);
    });
  });

  // Lấy dữ liệu từ form và lưu vào mảng classes
  const classSelect = document.getElementById("choices-class");
  classSelect.addEventListener("change", () => {
    classes.length = 0;

    Array.from(classSelect.selectedOptions).forEach((option) => {
      const classValue = option.value;
      classes.push(classValue);
    });
  });

  if (document.getElementById("edit-deschiption")) {
    var quill = new Quill("#edit-deschiption", {
      theme: "snow",
    });

    var delta = quill.root.innerHTML;
    quill.on("text-change", function () {
      delta = quill.root.innerHTML;
    });
  }

  Dropzone.autoDiscover = false;
  let myDropzone = new Dropzone("#image-course", {
    url: "/admin/upload/image", // URL để gửi tệp đã chọn đến máy chủ
    paramName: "image",
    maxFilesize: 5, // Giới hạn dung lượng tệp (MB)
    addRemoveLinks: true, // Hiển thị nút xóa cho từng tệp
    dictRemoveFile: `<i class="fa-solid fa-circle-xmark"></i>`, // Chữ hoặc biểu tượng để xóa tệp
    dictDefaultMessage: `<i class="fas fa-cloud-upload-alt"></i> Drop files here or click to upload`, // Tin nhắn mặc định
    acceptedFiles: "image/*", // Loại tệp cho phép (trong trường hợp này, chỉ hình ảnh)
    autoProcessQueue: false, // Tắt tự động tải lên
  });

  // Gửi dữ liệu form và xử lý kết quả trước khi tải lên ảnh
  const form = document.querySelector("#form_course");
  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(form);

    if (classes.length === 0) {
      formData.append("classes", JSON.stringify(classes));
    } else {
      formData.append("teachers", JSON.stringify(teachers));
    }

    if (semesters.length === 0) {
      formData.append("semesters", JSON.stringify(semesters));
    } else {
      formData.append("semesters", JSON.stringify(semesters));
    }

    if (classes.length === 0) {
      formData.append("classes", JSON.stringify(classes));
    } else {
      formData.append("classes", JSON.stringify(classes));
    }

    formData.append("description", delta);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", form.action);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          location.reload();
          const dropzonePromise = new Promise((resolve) => {
            myDropzone.on("queuecomplete", () => {
              resolve();
            });
            myDropzone.processQueue();
          });

          return dropzonePromise;
        } else {
          location.reload();
          console.error("Lỗi khi gửi form: " + xhr.status);
        }
      }
    };
    xhr.send(formData);
  });
}
