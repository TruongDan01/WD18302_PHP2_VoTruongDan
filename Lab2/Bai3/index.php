<?php
use Core\Database as DB;
function autoload($className)
{
    $className = str_replace('\\', '/', $className);
    $fileName = __DIR__ . "/src/$className.php";
    if (file_exists($fileName)) {
        require_once $fileName;
    }
}

spl_autoload_register('autoload');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kết nối database</title>
    <!-- Import Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 2rem;
        }

        .container {
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Kết nối database</h1>
        <?php

        $db = new DB();
        ?>
    </div>

    <!-- Import Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>