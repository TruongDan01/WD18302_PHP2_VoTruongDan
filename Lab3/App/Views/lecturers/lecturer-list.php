<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm Người Dùng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card border shadow-xs mb-4">
            <div class="card-body px-0 py-0">
                <div class="table-responsive p-0">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Tên</th>
                                <th>Thông tin</th>
                                <th>SDT</th>
                                <th>Địa chỉ</th>
                                <th>Lựa chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lecturers as $lecturer) { ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= $lecturer['avatar'] ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1"><?= $lecturer['name'] ?></p>
                                                <p class="text-muted mb-0"><?= $lecturer['email'] ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1"><?= $lecturer['specialty_name'] ?></p>
                                        <p class="text-muted mb-0"><?= $lecturer['narrowspecialty_name'] ?></p>
                                    </td>
                                    <td><?= $lecturer['phone'] ?></td>
                                    <td><?= $lecturer['address'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-link btn-sm btn-rounded">
                                            Sửa
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>