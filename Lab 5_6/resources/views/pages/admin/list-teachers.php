<div class="px-5 py-4 container-fluid">

    <!-- Add modal group -->
    <div class="add-modal-group">
        <!-- Form add teacher -->
        <div class="modal fade" id="form-modal-add-teacher" tabindex="-1" role="dialog"
            aria-labelledby="form-modal-add-teacher" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <!-- Form here -->
                    <form action="/admin/teacher/new" method="post" id="form-add-lecturer">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-add-lecturer-title">
                                Thêm giảng viên</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for class="form-label">Họ và tên</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Nhập họ và tên giảng viên">
                                </div>
                                <div class="form-message"></div>
                            </div>
                            <div class="form-group">
                                <label for>Email</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <span><i class="far fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Nhập địa chỉ email">
                                </div>
                                <div class="form-message"></div>
                            </div>
                            <div class="form-group">
                                <label for>Mô tả</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <span><i class="fa-solid fa-audio-description"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="description"
                                        placeholder="Nhập địa chỉ mô tả">
                                </div>
                                <div class="form-message"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Thêm giảng viên</button>
                            <button type="button" class="btn btn-link text-dark ml-auto"
                                data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- form add author -->
        <div class="modal fade" id="form-modal-add-author" tabindex="-1" role="dialog"
            aria-labelledby="form-modal-add-author" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <form action="classify/add_author" method="post" id="form-add-author">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-add-author-title">
                                Thêm tác giả</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for class="form-label">Tên
                                    tác giả</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-table"></i>
                                    </span>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên tác giả">
                                </div>
                                <div class="form-message"></div>
                            </div>
                            <div class="form-group">
                                <label for class="form-label">Tiểu
                                    sử tác giả</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-image-portrait"></i>
                                    </span>
                                    <input type="text" class="form-control" name="bio" placeholder="Nhập tên tiểu sử">
                                </div>
                                <div class="form-message"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Thêm tác
                                giả</button>
                            <button type="button" class="btn btn-link text-dark ml-auto"
                                data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Form add publisher -->
        <div class="modal fade" id="form-modal-add-publisher" tabindex="-1" role="dialog"
            aria-labelledby="form-modal-add-publisher" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <form action="classify/add_publisher" method="post" id="form-add-publisher">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-add-author-title">
                                Nhà xuất bản</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for class="form-label">Tên
                                    nhà xuất bản</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-table"></i>
                                    </span>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Nhập tên nhà xuất bản">
                                </div>
                                <div class="form-message"></div>
                            </div>

                            <div class="form-group">
                                <label for class="form-label">Địa
                                    chỉ nhà xuất bản</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-table"></i>
                                    </span>
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Nhập địa chỉ nhà xuất bản">
                                </div>
                                <div class="form-message"></div>
                            </div>

                            <div class="form-group">
                                <label for class="form-label">Thông
                                    tin nhà xuất bản</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-table"></i>
                                    </span>
                                    <input type="text" class="form-control" name="contact"
                                        placeholder="Nhập thông tin nhà xuất bản">
                                </div>
                                <div class="form-message"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Thêm nhà xuất
                                bản</button>
                            <button type="button" class="btn btn-link text-dark ml-auto"
                                data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Delete modal group -->
    <div class="delete-modal-group" id="modal-container">
    </div>

    <div class="mt-4 row">
        <div class="col-12">
            <div class="card">
                <img src="<?= _WEB_ROOT ?>../resources/assets/admin/img/header-orange-purple.jpeg" alt="pattern-lines"
                    class="top-0 rounded-2 position-absolute start-0 w-100 h-100">
                <div class="px-4 bg-cover card-body z-index-1">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <h3 class="text-white">Phân loại</h3>
                            <p class="mb-4 text-white">Xem tất cả
                                danh sách giảng viên</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    List categories-->
    <div class="mt-4 row">
        <div class="col-12">
            <div class="card">

                <div class="pb-0 card-header">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Danh sách giảng
                                viên</h5>
                            <p class="mb-0 text-sm">
                                Liệt kê giảng viên...
                            </p>
                        </div>
                        <div class="my-auto mt-4 ms-auto mt-lg-0">
                            <div class="my-auto ms-auto">
                                <button type="button" class="btn-input-group btn btn-block btn-dark m-0"
                                    data-bs-toggle="modal" data-bs-target="#form-modal-add-teacher">+
                                    Thêm
                                    giảng viên</button>
                                <button type="button" class="me-2 mb-0 btn btn-white" data-bs-toggle="modal"
                                    data-bs-target="#import">
                                    <svg width="14" height="15" viewBox="0 0 20 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3 17.5C3 16.9477 3.44772 16.5 4 16.5H16C16.5523 16.5 17 16.9477 17 17.5C17 18.0523 16.5523 18.5 16 18.5H4C3.44772 18.5 3 18.0523 3 17.5ZM6.29289 9.79289C6.68342 9.40237 7.31658 9.40237 7.70711 9.79289L9 11.0858V3.5C9 2.94772 9.44771 2.5 10 2.5C10.5523 2.5 11 2.94771 11 3.5V11.0858L12.2929 9.79289C12.6834 9.40237 13.3166 9.40237 13.7071 9.79289C14.0976 10.1834 14.0976 10.8166 13.7071 11.2071L10.7071 14.2071C10.5196 14.3946 10.2652 14.5 10 14.5C9.73478 14.5 9.48043 14.3946 9.29289 14.2071L6.29289 11.2071C5.90237 10.8166 5.90237 10.1834 6.29289 9.79289Z"
                                            fill="#111827" />
                                    </svg>Nhập
                                </button>
                                <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog mt-lg-10">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Import
                                                    CSV</h5>
                                                <i class="fas fa-upload ms-3"></i>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>You can browse
                                                    your computer
                                                    for a file.</p>
                                                <input type="text" placeholder="Browse file..."
                                                    class="mb-3 form-control">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value
                                                        id="importCheck" checked>
                                                    <label class="custom-control-label" for="importCheck">I
                                                        accept the
                                                        terms and
                                                        conditions</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white btn-sm"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-dark btn-sm">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="mt-1 mb-0 btn btn-white export mt-sm-0" data-type="csv" type="button"
                                    name="button">
                                    <svg width="14" height="15" viewBox="0 0 20 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3 17.5C3 16.9477 3.44772 16.5 4 16.5H16C16.5523 16.5 17 16.9477 17 17.5C17 18.0523 16.5523 18.5 16 18.5H4C3.44772 18.5 3 18.0523 3 17.5ZM6.29289 7.20711C5.90237 6.81658 5.90237 6.18342 6.29289 5.79289L9.29289 2.79289C9.48043 2.60536 9.73478 2.5 10 2.5C10.2652 2.5 10.5196 2.60536 10.7071 2.79289L13.7071 5.79289C14.0976 6.18342 14.0976 6.81658 13.7071 7.20711C13.3166 7.59763 12.6834 7.59763 12.2929 7.20711L11 5.91421V13.5C11 14.0523 10.5523 14.5 10 14.5C9.44771 14.5 9 14.0523 9 13.5V5.91421L7.70711 7.20711C7.31658 7.59763 6.68342 7.59763 6.29289 7.20711Z"
                                            fill="#111827" />
                                    </svg>Xuất
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-0 pb-0 card-body">
                    <div class="table-responsive">
                        <table class="table table-flush" id="teacher-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-xs">Giảng viên</th>
                                    <th class="text-xs">Email</th>
                                    <th class="text-xs">Mô tả</th>
                                    <th class="text-xs">Ngày tạo</th>
                                    <th class="text-xs">Lựa Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($teachers as $teacher) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="my-auto form-check">
                                                    <input class="form-check-input" type="checkbox" id="customCheck1"
                                                        checked>
                                                </div>
                                                <img class="avatar avatar-md ms-3" src="<?= $teacher['avatar'] ?>"
                                                    alt="sofa">
                                                <h6 class="my-auto ms-3">
                                                    <?= $teacher['name'] ?>
                                                </h6>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-success badge-sm">
                                                <?= $teacher['email'] ?>
                                            </span>
                                        </td>
                                        <td class="text-sm">
                                            <?= $teacher['description'] ?>
                                        </td>
                                        <td class="text-sm">
                                            <?= $teacher['created_at'] ?>
                                        </td>
                                        <td class="text-sm">
                                            <a href class="me-3" data-bs-toggle="modal"
                                                data-bs-target="#teacher-edit_<?= $teacher['id'] ?>">
                                                <i class="fas fa-user-edit text-dark"></i>
                                            </a>
                                            <a href class="delete-teacher-btn" data-bs-toggle="modal"
                                                data-teacher-id="<?= $teacher['id'] ?>"
                                                data-teacher-name="<?= $teacher['name'] ?>"
                                                data-teacher-email="<?= $teacher['email'] ?>"
                                                data-teacher-description="<?= $teacher['description'] ?>"
                                                data-teacher-last-updated="<?= $teacher['created_at'] ?>">
                                                <i class="fas fa-trash text-dark"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Giảng viên</th>
                                    <th>Email</th>
                                    <th>Mô tả</th>
                                    <th>Ngày tạo</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>