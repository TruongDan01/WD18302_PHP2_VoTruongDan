<div class="px-5 py-4 container-fluid">
    <div class="mt-4 row">
        <div class="col-12">
            <div class="card">
                <img src="<?= _WEB_ROOT ?>./resources/assets/admin/img/header-orange-purple.jpg" alt="pattern-lines"
                    class="top-0 rounded-2 position-absolute start-0 w-100 h-100">
                <div class="px-4 bg-cover card-body z-index-1">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <h3 class="text-white">Danh sách đánh giá</h3>
                            <p class="mb-4 text-white">Toàn bộ đánh giá của khó học.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4 row">
        <?php foreach ($classes as $class) { ?>
            <div class="col-12 mt-3">
                <button class="mt-4 btn btn-primary">
                    Lớp
                    <?= $class['name'] ?>
                </button>
            </div>
            <div class="my-2 col-12">
                <div class="py-4 border-0 card">
                    <div class="table-responsive">
                        <table class="table mb-0 align-items-center">
                            <thead>

                                <tr>
                                    <th
                                        class="text-uppercase text-secondary border-top-0 text-xxs font-weight-bolder opacity-7">
                                        Tên sinh viên</th>
                                    <th
                                        class="text-uppercase text-secondary border-top-0 text-xxs font-weight-bolder opacity-7 ps-2">
                                        Mã sinh viên</th>
                                    <th
                                        class="text-uppercase text-secondary border-top-0 text-xxs font-weight-bolder opacity-7 ps-2">
                                        Môn đang học</th>
                                    <th
                                        class="text-uppercase text-secondary border-top-0 text-xxs font-weight-bolder opacity-7">
                                        Email</th>
                                    <th
                                        class="text-uppercase text-secondary border-top-0 text-xxs font-weight-bolder opacity-7">
                                        Trạng thái</a></th>
                                    <th
                                        class="text-uppercase text-secondary border-top-0 text-xxs font-weight-bolder opacity-7">
                                        Đánh giá</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                $groupedEvaluations = array(); // Mảng lưu các câu hỏi đánh giá theo ID người dùng
                                $users = array(); // Mảng lưu thông tin người dùng
                                foreach ($evaluations[$class['id']] as $evaluation) {
                                    $userId = $evaluation['userId'];

                                    if (isset($groupedEvaluations[$userId])) {
                                        // Nếu ID người dùng đã tồn tại trong mảng $groupedEvaluations, thêm câu hỏi đánh giá vào mảng con
                                        $groupedEvaluations[$userId][] = array(
                                            'question_text' => $evaluation['question_text'],
                                            'evaluation_text' => $evaluation['evaluation_text']
                                        );
                                    } else {
                                        // Nếu ID người dùng chưa tồn tại, tạo một mảng mới và thêm câu hỏi đánh giá vào
                                        $groupedEvaluations[$userId] = array(
                                            array(
                                                'question_text' => $evaluation['question_text'],
                                                'evaluation_text' => $evaluation['evaluation_text']
                                            )
                                        );

                                        // Lưu thông tin người dùng vào mảng $users
                                        $users[$userId] = array(
                                            'id' => $evaluation['idFeedBack'],
                                            'userId' => $evaluation['userId'],
                                            'userName' => $evaluation['userName'],
                                            'courseName' => $evaluation['courseName'],
                                            'email' => $evaluation['email'],
                                            'status' => $evaluation['status']
                                        );
                                    }
                                } ?>
                                <?php foreach ($groupedEvaluations as $userId => $questions) { ?>
                                    <tr>
                                        <td>
                                            <div class="px-2 py-1 d-flex">
                                                <div>
                                                    <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-Clipart.png"
                                                        class="avatar avatar-sm me-3" alt="avatar image">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <?= $users[$userId]['userName'] ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-sm text-secondary">PC06220</p>
                                        </td>
                                        <td>
                                            <span class="badge badge-dot me-4">
                                                <i class="bg-info"></i>
                                                <span class="text-xs text-dark">
                                                    <?= $users[$userId]['courseName'] ?>
                                                </span>
                                            </span>
                                        </td>
                                        <td class="px-3 align-middle">
                                            <span class="text-xs text-secondary font-weight-bold">
                                                <?= $users[$userId]['email'] ?>
                                            </span>
                                        </td>
                                        <?php if ($users[$userId]['status'] == 0) { ?>
                                            <td>
                                                <span class="badge badge-danger badge-sm">
                                                    Chưa duyệt
                                                </span>
                                            </td>
                                        <?php } else { ?>
                                            <td>
                                                <span class="badge badge-success badge-sm">
                                                    Đã duyệt
                                                </span>
                                            <?php } ?>
                                        <td class="align-middle">

                                            <a data-bs-toggle="modal" data-bs-target="#exampleModalMessage">
                                                <i class="fas fa-eye text-dark" aria-hidden="true"></i>
                                            </a>
                                            <div class="modal fade" id="exampleModalMessage" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Nội dung đánh
                                                                giá</h5>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table mb-0 align-items-center">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th class="text-xs" data-sortable=""
                                                                            style="width: 10.94472%;">
                                                                            <a href="#" class="dataTable-sorter">Câu hỏi đánh
                                                                                giá</a>
                                                                        </th>
                                                                        <th class="text-xs" data-sortable=""
                                                                            style="width: 8.94472%;">
                                                                            <a href="#" class="dataTable-sorter">Nội dung</a>
                                                                        </th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <?php foreach ($questions as $question) { ?>
                                                                        <tr>
                                                                            <td class="px-3 align-middle">
                                                                                <span
                                                                                    class="text-xs text-secondary font-weight-bold">
                                                                                    <?= $question['question_text'] ?>
                                                                                </span>
                                                                            </td>
                                                                            <td class="px-3 align-middle">
                                                                                <span
                                                                                    class="text-xs text-secondary font-weight-bold">
                                                                                    <?= $question['evaluation_text'] ?>
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white"
                                                                data-bs-dismiss="modal">Xóa</button>
                                                            <a href="/admin/feedback/update?id=<?= $users[$userId]['id'] ?>"><button type="button" class="btn btn-dark">Duyệt</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        </div>

                        </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>


        <?php } ?>
    </div>
</div>