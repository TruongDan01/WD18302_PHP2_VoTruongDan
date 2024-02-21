const deleteBtns = document.getElementsByClassName("delete-teacher-btn");
Array.from(deleteBtns).forEach(function (deleteBtn) {
  deleteBtn.addEventListener("click", function (event) {
    event.preventDefault();
    var teacherId = this.getAttribute("data-teacher-id");
    var teacherName = this.getAttribute("data-teacher-name");
    var teacherEmail = this.getAttribute("data-teacher-email");
    var teacherDescription = this.getAttribute("data-teacher-description");
    var teacherLastUpdated = this.getAttribute("data-teacher-last-updated");
    var modalId = "teacher-delete-modal-" + teacherId;

    // Xóa modal cũ trước khi tạo modal mới
    var existingModal = document.getElementById(modalId);
    if (existingModal) {
      existingModal.remove();
    }

    // Tạo modal mới cho giáo viên được chọn
    var modalHtml = `
            <div class="modal fade" id="${modalId}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-add-teacher-title">
                                Xóa giảng viên</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger">* Bạn có chắc muốn xóa giảng viên này?</p>
                            <ul class="list-group">
                                <li class="list-group-item"><span class="fw-bold">Tên giảng viên:</span> ${teacherName}</li>
                                <li class="list-group-item"><span class="fw-bold">Email:</span> ${teacherEmail}</li>
                                <li class="list-group-item"><span class="fw-bold">Mô tả:</span> ${teacherDescription}</li>
                                <li class="list-group-item"><span class="fw-bold">Cập nhật lần cuối:</span> ${teacherLastUpdated}</li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <form method="post" class="m-0 p-0" action="/admin/teacher/destroy/${teacherId}">
                                <input type="hidden" name="id" value="${teacherId}">
                                <button type="submit" class="btn btn-link bg-warning text-dark ml-auto">Xóa</button>
                            </form>
                            <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

    var modalContainer = document.getElementById("modal-container");
    modalContainer.innerHTML = modalHtml;

    // Hiển thị modal
    var modal = new bootstrap.Modal(document.getElementById(modalId));
    modal.show();
  });
});

const editBtns = document.getElementsByClassName("edit-teacher-btn");
Array.from(editBtns).forEach(function (editBtn) {
  editBtn.addEventListener("click", function (event) {
    event.preventDefault();
    var teacherId = this.getAttribute("data-teacher-id");
    var teacherName = this.getAttribute("data-teacher-name");
    var teacherEmail = this.getAttribute("data-teacher-email");
    var teacherDescription = this.getAttribute("data-teacher-description");
    var modalId = "teacher-edit-modal-" + teacherId;

    // Xóa modal cũ trước khi tạo modal mới
    var existingModal = document.getElementById(modalId);
    if (existingModal) {
      existingModal.remove();
    }

    // Tạo modal mới cho giảng viên được chọn
    var modalHtml = `
    <form method="post" class="m-0 p-0" action="/admin/teacher/update?id=${teacherId}">
            <div class="modal fade" id="${modalId}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="form-modal-edit-teacher-title">
                                Sửa thông tin giảng viên</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="teacher-name">Tên giảng viên</label>
                                    <input type="text" class="form-control" id="name" name="name" value="${teacherName}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="${teacherEmail}">
                                </div>
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <input type="text" class="form-control" id="description" name="description" value="${teacherDescription}">
                                </div>
                        </div>
                        <div class="modal-footer">
                                <button type="submit" class="btn btn-link bg-primary text-white ml-auto">Cập nhật</button>
                            <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        `;

    var modalContainer = document.getElementById("modal-container");
    modalContainer.innerHTML = modalHtml;

    // Hiển thị modal
    var modal = new bootstrap.Modal(document.getElementById(modalId));
    modal.show();
  });
});
