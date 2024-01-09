<?php
class UserView
{
    public function showSearchForm()
    {
        echo <<<HTML
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
                <div class="row">
                    <div class="col-6 mx-auto">
                    <h1 class="font-sans text-primary mb-4">Tìm Kiếm Người Dùng</h1>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
        </body>
    
        </html>
    HTML;
    }

    public function showUserInfo($user) {
        echo <<<HTML
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <h2 class="card-title text-primary mb-4" style="font-size: 28px;">Thông tin người dùng</h2>
    HTML;
    
        if ($user) {
            echo <<<HTML
                <p class="card-text">Tên: {$user['name']}</p>
                <p class="card-text">Email: {$user['email']}</p>
                <p class="card-text">Địa chỉ: {$user['address']}</p>
    HTML;
        } else {
            echo <<<HTML
                <div class="alert alert-danger" role="alert">
                    Người dùng không tồn tại.
                </div>
    HTML;
        }
    
        echo <<<HTML
                        </div>
                    </div>
                </div>
            </div>
        </div>
    HTML;
    }
}
