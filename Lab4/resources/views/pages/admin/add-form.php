<div class="px-5 py-4 container-fluid">
    <div class="mt-4 row">
        <div class="col-12">
            <div class="card">
                <img src="<?= _WEB_ROOT ?>./resources/assets/admin/img/header-blue-white.png" alt="pattern-lines" class="top-0 rounded-2 position-absolute start-0 w-100 h-100">
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
                        <h3 class="font-weight-bold">
                            Feedback về tình hình học tập-Block 1-SPRING 2024
                        </h3>
                    </div>
                </div>
                <div class="pt-0 card-body text-start">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="course-select">Chọn môn học:</label>
                                <select class="form-control" id="course-select">
                                    <option value="">-- Chọn môn học --</option>
                                    <option value="monhoc1">Môn học 1</option>
                                    <option value="monhoc2">Môn học 2</option>
                                    <option value="monhoc3">Môn học 3</option>
                                    <!-- Thêm các môn học cần thiết ở đây -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="batch-select">Chọn khóa:</label>
                                <select class="form-control" id="batch-select">
                                    <option value="">-- Chọn khóa --</option>
                                    <option value="khoa1">Khóa 1</option>
                                    <option value="khoa2">Khóa 2</option>
                                    <option value="khoa3">Khóa 3</option>
                                    <!-- Thêm các khóa cần thiết ở đây -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phương pháp giảng dạy:</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-good" value="Tốt">
                                    <label class="form-check-label" for="evaluation-good">Tốt</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-fair" value="Khá">
                                    <label class="form-check-label" for="evaluation-fair">Khá</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-poor" value="Yếu">
                                    <label class="form-check-label" for="evaluation-poor">Yếu</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tài liệu học tập đáng tin cậy:</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-good" value="Tốt">
                                    <label class="form-check-label" for="evaluation-good">Tốt</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-fair" value="Khá">
                                    <label class="form-check-label" for="evaluation-fair">Khá</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-poor" value="Yếu">
                                    <label class="form-check-label" for="evaluation-poor">Yếu</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thời lượng học phù hợp và phân bố công việc hợp
                                    lý:</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-good" value="Tốt">
                                    <label class="form-check-label" for="evaluation-good">Tốt</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-fair" value="Khá">
                                    <label class="form-check-label" for="evaluation-fair">Khá</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-poor" value="Yếu">
                                    <label class="form-check-label" for="evaluation-poor">Yếu</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Đánh giá và phản hồi của giáo viên hữu ích:</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-good" value="Tốt">
                                    <label class="form-check-label" for="evaluation-good">Tốt</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-fair" value="Khá">
                                    <label class="form-check-label" for="evaluation-fair">Khá</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-poor" value="Yếu">
                                    <label class="form-check-label" for="evaluation-poor">Yếu</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hỗ trợ của giảng viên trong và ngoài giờ học
                                    :</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-good" value="Tốt">
                                    <label class="form-check-label" for="evaluation-good">Tốt</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-fair" value="Khá">
                                    <label class="form-check-label" for="evaluation-fair">Khá</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-poor" value="Yếu">
                                    <label class="form-check-label" for="evaluation-poor">Yếu</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Đáp ứng của giảng viên về những thắc mắc của sinh viên trong giờ
                                    học:</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-good" value="Tốt">
                                    <label class="form-check-label" for="evaluation-good">Tốt</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-fair" value="Khá">
                                    <label class="form-check-label" for="evaluation-fair">Khá</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="evaluation" id="evaluation-poor" value="Yếu">
                                    <label class="form-check-label" for="evaluation-poor">Yếu</label>
                                </div>
                            </div>
                        </div>
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
                        GỬi đánh giá
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="col-md-12 mb-3">
                <div class="card card-frame">
                    <div class="card-body shadow-sm border border-radius-sm d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="fw-bold">Sử dụng biểu thức chính quy ở đây</span>
                        </div>
                        <div>
                            <i class="fas fa-hand-point-down fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
            <form class="mb-8 multisteps-form__form" action="/admin/feedback/new" method="post">
                <div class="p-4 bg-white card multisteps-form__panel js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Thêm form đánh giá</h5>
                    <p class="text-sm">Đây là form đánh giá giảng viên và môn học.</p>
                    <section class="mt-4">
                        <?php if (isset($_SESSION['create-form'])) : ?>
                            <div class="alert bg-gradient-warning alert-dismissible text-sm text-white fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text"><strong>Chú ý!</strong> <?= $_SESSION['create-form'] ?? '' ?>!</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif ?>
                    </section>
                    <div class="multisteps-form__content">
                        <div class="mt-3 row">
                            <div class="col-12 col-sm-6">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" placeholder="Feedback về tình hình học tập-Block 1-SPRING 2024" name="title">
                            </div>
                            <div class="col-12 col-sm-6">
                                <label>Lớp học</label>
                                <select class="form-control" name="class" id="choices-class" multiple>
                                    <option value=""></option>
                                    <option value="class 1">WD18301</option>
                                    <option value="class 2">WD18302</option>
                                    <option value="class 3">WD18303</option>
                                    <option value="class 4">WD18303</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-12 col-sm-6">
                                <label>Tên môn học</label>
                                <select class="form-control" name="subject" id="choices-multiple-remove-button" multiple>
                                    <option value=""></option>
                                    <option value="subject 1">HTML5 & CSS3</option>
                                    <option value="subject 2">Lập trình Web</option>
                                    <option value="subject 3">Javascript nâng cao</option>
                                    <option value="subject 4">Java cơ bản</option>
                                </select>
                            </div>
                            <div class="mt-3 col-12 col-sm-6 mt-sm-0">
                                <label>Khóa học</label>
                                <select class="form-control" name="course" id="choices-course" multiple>
                                    <option value=""></option>
                                    <option value="course 1">18</option>
                                    <option value="course 2">17</option>
                                    <option value="course 3">16</option>
                                    <option value="course 4">15</option>
                                </select>
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
                                <input class="multisteps-form__input form-control" type="text" name="evaluationQuestion" placeholder="Ví dụ: Chất lượng giảng dạy của giảng viên..." />
                            </div>
                        </div>
                        <div class="mt-4 button-row d-flex">
                            <button class="mb-0 text-white btn bg-dark ms-auto js-btn-next" type="submit" title="Next">Xong</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>