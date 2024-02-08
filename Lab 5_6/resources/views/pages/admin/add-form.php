<div class="px-5 py-4 container-fluid">
    <div class="mt-4 row">
        <div class="col-12">
            <div class="card">
                <img src="<?= _WEB_ROOT ?>./resources/assets/admin/img/header-blue-white.png" alt="pattern-lines"
                    class="top-0 rounded-2 position-absolute start-0 w-100 h-100">
                <div class="px-4 bg-cover card-body z-index-1">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <h3 class="text-white">Thêm đánh giá</h3>
                            <p class="mb-4 text-white">Hãy thêm các đánh giá tùy thích.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 row">
        <div class="col-md-4">
            <div class="card">
                <div class="pt-4 pb-3 card-header ">
                    <div class="d-flex justify-content-between align-items-center flex-nowrap">
                        <h3 class="font-weight-bold" id="valueTitle">

                        </h3>
                    </div>
                </div>
                <div class="pt-0 card-body text-start">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="classes-select">Chọn môn học:</label>
                                <select class="form-control" id="classes-select">
                                    <option value="">-- Chọn môn học --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="semester-select">Chọn khóa:</label>
                                <select class="form-control" id="semester-select">
                                    <option value="">-- Chọn khóa --</option>
                                    <!-- Thêm các khóa cần thiết ở đây -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="resultContainer">

                    </div>
                    <div class="form-group">
                        <label>Bạn cần ôn tập lại kiến thức của bài học nào? Ghi tên bài: :</label>
                        <input class="form-control" type="text" name="feedback" placeholder="Câu trả lời của bạn">
                    </div>
                    <div class="form-group">
                        <label>Nhận xét về giảng viên:</label>
                        <input class="form-control" type="text" name="feedback" placeholder="Câu trả lời của bạn">
                    </div>
                    <div class="form-group">
                        <label>Ý kiến phản hồi:</label>
                        <textarea class="form-control" name="feedback" rows="3"></textarea>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="javascript:;" class="mb-0 btn btn-icon btn-dark d-lg-block">
                        Gửi đánh giá
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <form class="mb-8 multisteps-form__form" action="/admin/feedback/new" method="post">
                <div class="p-4 bg-white card multisteps-form__panel js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Thêm form đánh giá</h5>
                    <p class="text-sm">Đây là form đánh giá giảng viên và môn học.</p>
                    <div class="multisteps-form__content">
                        <div class="mt-3 row">
                            <div class="col-12 col-sm-6">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" id="titleInput"
                                    placeholder="Feedback về tình hình học tập-Block 1-SPRING 2024" name="title">
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>Tên môn học</label>
                                <select class="form-control" name="subject" id="choices-subject" multiple>
                                    <option value=""></option>
                                    <option value="subject 1">HTML5 & CSS3</option>
                                    <option value="subject 2">Lập trình Web</option>
                                    <option value="subject 3">Javascript nâng cao</option>
                                    <option value="subject 4">Java cơ bản</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-12 col-sm-6">
                                <label>Lớp học</label>
                                <select class="form-control" name="class" id="choices-class" multiple>
                                    <option value=""></option>
                                    <?php
                                    if (!empty($classes)) {
                                        foreach ($classes as $class) {
                                            ?>
                                            <option value="<?= $class['id'] ?>">
                                                <?= $class['name'] ?>
                                            </option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="button" class="btn btn-white" data-bs-toggle="modal"
                                    data-bs-target="#ModalClasses"> + Thêm mới</button>
                            </div>
                            <div class="mt-3 col-12 col-sm-6 mt-sm-0">
                                <label>Khóa học</label>
                                <select class="form-control" name="course" id="choices-semester" multiple>
                                    <option value=""></option>
                                    <?php
                                    if (!empty($semesters)) {
                                        foreach ($semesters as $semester) {
                                            ?>
                                            <option value="<?= $semester['id'] ?>">
                                                <?= $semester['name'] ?>
                                            </option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <button type="button" class="btn btn-white" data-bs-toggle="modal"
                                    data-bs-target="#ModalSemesters"> + Thêm mới</button>
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-12 col-sm-6">
                                <label>Kiểu câu trả lời</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="answerType">
                                    <option value=""></option>
                                    <option value="1">Có hoặc không</option>
                                    <option value="2">Từ giỏi đến kém</option>
                                    <option value="3">Ý kiến của sinh viên</option>
                                </select>
                            </div>
                            <div class="mt-3 col-12 col-sm-6 mt-sm-0">
                                <label>Câu hỏi đánh giá</label>
                                <input class="multisteps-form__input form-control" type="text" name="evaluationQuestion"
                                    id="evaluationQuestion"
                                    placeholder="Ví dụ: Chất lượng giảng dạy của giảng viên..." />
                            </div>
                        </div>
                        <div class="mt-4 button-row d-flex justify-content-between">
                            <button id="addQuestionButton" type="button" class="mb-0 text-white btn bg-secondary">Thêm
                                câu đánh giá</button>
                            <button class="mb-0 text-white btn bg-dark" type="submit" title="Next">Xong</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<form action="/admin/classes/new" method="post">
<div class="modal fade" id="ModalClasses" tabindex="-1" role="dialog" aria-labelledby="ModalClassesTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Thêm lớp học mới</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="class-name" class="col-form-label">Tên lớp:</label>
                        <input type="text" name="name" class="form-control" placeholder="WD18302" id="class-name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-dark">Thêm mới</button>
                </div>
            </div>
    </div>
</div>
</div>
</form>

<form action="/admin/semesters/new" method="post">
<div class="modal fade" id="ModalSemesters" tabindex="-1" role="dialog" aria-labelledby="ModalSemestersTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Thêm khóa học mới</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="semester-name" class="col-form-label">Tên khóa:</label>
                        <input type="text" name="name" class="form-control" placeholder="WD18302" id="semester-name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-dark">Thêm mới</button>
                </div>
            </div>
    </div>
</div>
</div>
</form>