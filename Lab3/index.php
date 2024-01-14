<?php

use App\Model\UsersModel;
use App\Core\Form;
use App\Core\Field;

require 'vendor/autoload.php';

$form = new Form('#', 'post');

$form->addField(new Field('firstname'));
$form->addField(new Field('lastname'));
$form->addField((new Field('email'))->emailField());
$form->addField((new Field('phone')));
$form->addField((new Field('password'))->passwordField());
$form->addField((new Field('confirmPassword'))->passwordField());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submittedData = $_POST;
    $dataUser = [
        'email' => $submittedData['email'],
        'name' => $submittedData['firstname'] . ' ' . $submittedData['lastname'],
        'phone' => $submittedData['phone'],
        'password' => $submittedData['password']
    ];
    $usersModel = new UsersModel();
    $user = $usersModel->insertUser($dataUser);
    if (!$user) {
        $info = $usersModel->getUserById();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 800px;
        }
    </style>
</head>

<body>
    <?php if (isset($info)) : ?>
        <div class="container mt-5 d-flex justify-content-center">
            <div class="card text-center" style="width: 400px;">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Thông tin người dùng đã chèn:</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="formatted-key">Tên:</span>
                            <span class="badge bg-primary rounded-pill formatted-value"><?php echo $info['name']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="formatted-key">Email:</span>
                            <span class="badge bg-primary rounded-pill formatted-value"><?php echo $info['email']; ?></span>
                        </li>
                        <!-- Hiển thị các thông tin người dùng khác -->
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="container">
        <h1>Đăng Ký</h1>
        <form action="<?php echo $form->getAction(); ?>" method="<?php echo $form->getMethod(); ?>">
            <div class="row">
                <?php echo $form->toString(); ?>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>