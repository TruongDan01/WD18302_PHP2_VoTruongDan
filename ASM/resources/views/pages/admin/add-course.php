<style>
    .choices {
        margin-bottom: 0;
    }
</style>
<?php

use Illuminate\framework\Session;

$name = Session::flash('error-name');
$error_name = !empty($name) ? '<div class="pt-2 text-danger font-weight-bold">* ' . $name . '</div>' : '';

$teacher = Session::flash('error-teacher');
$error_teacher = !empty($teacher) ? '<div class="pt-2 text-danger font-weight-bold">* ' . $teacher . '</div>' : '';

$semester = Session::flash('error-semester');
$error_semester = !empty($semester) ? '<div class="pt-2 text-danger font-weight-bold">* ' . $semester . '</div>' : '';

$class = Session::flash('error-class');
$error_class = !empty($class) ? '<div class="pt-2 text-danger font-weight-bold">* ' . $class . '</div>' : '';

$description = Session::flash('error-description');
$error_description = !empty($description) ? '<div class="pt-2 text-danger font-weight-bold">* ' . $description . '</div>' : '';

$time = Session::flash('error-time');
$error_time = !empty($time) ? '<div class="pt-2 text-danger font-weight-bold">* ' . $time . '</div>' : '';

$sermon = Session::flash('error-sermon');
$error_sermon = !empty($sermon) ? '<div class="pt-2 text-danger font-weight-bold">* ' . $sermon . '</div>' : '';

$quizz = Session::flash('error-quizz');
$error_quizz = !empty($quizz) ? '<div class="pt-2 text-danger font-weight-bold">* ' . $quizz . '</div>' : '';

$retake = Session::flash('error-retake');
$error_retake = !empty($retake) ? '<div class="pt-2 text-danger font-weight-bold">* ' . $retake . '</div>' : '';
?>
<div class="container py-3 my-3">
    <div class="mt-4 row">
        <div class="col-12">
            <div class="card">
                <img src="<?= _WEB_ROOT ?>./resources/assets/admin/img/header-blue-purple.jpg" alt="pattern-lines"
                    class="top-0 rounded-2 position-absolute start-0 w-100 h-100">
                <div class="px-4 bg-cover card-body z-index-1">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <h3 class="text-white">Thêm khóa học</h3>
                            <p class="mb-4 text-white">Toàn bộ đánh giá của khóa học.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row min-vh-80 mt-5">
        <div class="col-12">
            <div class="multisteps-form" action="/admin/course/new" method="post">
                <div class="row">
                    <div class="mx-auto col-4 col-lg-3">
                        <div class="multisteps-form__progress card card-plain">
                            <div class="mb-3">
                                <button id="form-btn-1"
                                    class="p-2 me-2 multisteps-form__progress-btn btn btn-outline-secondary rounded-circle js-active"
                                    type="button" title="User Info">1</button>
                                <label for="form-btn-1">Thông tin khóa học</label>
                            </div>
                            <div class="mb-3">
                                <button id="form-btn-2"
                                    class="p-2 me-2 multisteps-form__progress-btn btn btn-outline-secondary rounded-circle"
                                    type="button" title="Address">2</button>
                                <label for="form-btn-2">Hình ảnh</label>
                            </div>
                            <div class="mb-3">
                                <button id="form-btn-4"
                                    class="p-2 me-2 multisteps-form__progress-btn btn btn-outline-secondary rounded-circle"
                                    type="button" title="Socials">3</button>
                                <label for="form-btn-4">Thông tin khác</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-lg-9">
                        <form class="multisteps-form__form" action="/admin/course/add" method="post" id="form_course"
                            enctype="multipart/form-data">

                            <div class="card-body card multisteps-form__panel js-active" data-animation="FadeIn">
                                <h5 class="font-weight-bolder">Thông tin chi tiết</h5>
                                <div class="multisteps-form__content">
                                    <div class="mt-3 row">
                                        <div class="col-12 col-sm-6">
                                            <label>Tên khóa học</label>
                                            <input class="multisteps-form__input form-control" type="text"
                                                placeholder="Ví dụ: HTML5 & CSS 3" name="name" />
                                            <?= $error_name ?>
                                        </div>
                                        <div class="mt-3 col-12 col-sm-6 mt-sm-0">
                                            <label>Giảng Viên</label>
                                            <select class="form-control" name="teachers" id="choices-teacher" multiple>
                                                <?php
                                                if (!empty($teachers)) {
                                                    foreach ($teachers as $teacher) {
                                                        ?>
                                                        <option value="<?= $teacher['id'] ?>">
                                                            <?= $teacher['name'] ?>
                                                        </option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <?= $error_teacher ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="mt-4">Mô tả</label>
                                            <p class="text-xs form-text text-muted ms-1 d-inline">
                                                (không bắt buộc)
                                            </p>
                                            <div id="edit-deschiption" class="h-50">
                                            </div>
                                            <?= $error_description ?>
                                        </div>
                                        <div class="mt-2 col-sm-6 mt-sm-0">
                                            <div class="mt-2">
                                                <label>Khóa học</label>
                                                <select class="form-control" name="semesters" id="choices-semester"
                                                    multiple>
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
                                                <?= $error_semester ?>
                                                <button type="button" class="mt-3 btn btn-white" data-bs-toggle="modal"
                                                    data-bs-target="#ModalSemesters"> + Thêm mới</button>
                                            </div>
                                            <div class="mt-2"> <label>Lớp học</label>
                                                <select class="form-control" name="classes" id="choices-class" multiple>
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
                                                <?= $error_class ?>
                                                <button type="button" class="mt-3 btn btn-white" data-bs-toggle="modal"
                                                    data-bs-target="#ModalClasses"> + Thêm mới</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 button-row d-flex">
                                        <button class="mb-0 btn btn-dark ms-auto js-btn-next" type="button"
                                            title="Next">Next</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body card multisteps-form__panel" data-animation="FadeIn">
                                <h5 class="font-weight-bolder">Hình ảnh</h5>
                                <div class="multisteps-form__content">
                                    <div class="mt-3 row">
                                        <div class="col-12">
                                            <label>Ảnh khóa học</label>
                                            <div class="form-control dropzone" id="image-course">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 button-row d-flex">
                                        <button class="mb-0 btn btn-white js-btn-prev" type="button" title="Prev">Trở
                                            lại</button>
                                        <button class="mb-0 btn btn-dark ms-auto js-btn-next" type="button"
                                            title="Next">Tiếp</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body card multisteps-form__panel" data-animation="FadeIn">
                                <h5 class="font-weight-bolder">Thông tin khác</h5>
                                <div class="mt-3 multisteps-form__content">
                                    <div class="row">
                                        <div class="col-3">
                                            <label>Thồ gian</label>
                                            <input class="multisteps-form__input form-control" type="text"
                                                placeholder="12 buổi" name="time" />
                                            <?= $error_time ?>
                                        </div>
                                        <div class="col-4">
                                            <label>Bài giảng</label>
                                            <input class="multisteps-form__input form-control" type="text"
                                                placeholder="22" name="sermon" />
                                            <?= $error_sermon ?>
                                        </div>
                                        <div class="col-5">
                                            <label>Câu đố</label>
                                            <input class="multisteps-form__input form-control" type="text"
                                                placeholder="15" name="quizz" />
                                            <?= $error_quizz ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="mt-4 form-label">Số lần thi lại tối đa</label>
                                            <input class="multisteps-form__input form-control" type="text"
                                                placeholder="2" name="retake" />
                                            <?= $error_retake ?>
                                        </div>
                                    </div>
                                    <div class="mt-4 button-row d-flex">
                                        <button class="mb-0 btn btn-white js-btn-prev" type="button" title="Prev">Trở
                                            lại</button>
                                        <button class="mb-0 btn btn-dark ms-auto js-btn-next" type="submit"
                                            title="Next">Xong</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
                            <label for="class-student" class="col-form-label">Số lượng sinh viên</label>
                            <input type="text" name="number_students" class="form-control" placeholder="43"
                                id="class-student">
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