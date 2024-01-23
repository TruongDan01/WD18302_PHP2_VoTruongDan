# Hướng dẫn cấu hình cơ sở dữ liệu

Để thiết lập cơ sở dữ liệu từ tệp `.env`, hãy làm theo các bước sau:

1. Mở tệp `.env` trong dự án của bạn.
2. Đặt giá trị cho các biến môi trường như tên người dùng (`DB_USER`), mật khẩu (`DB_PASSWORD`),...
3. Lưu tệp `.env`.

Ví dụ cấu hình `.env`:

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=tutor
DB_USERNAME=root
DB_PASSWORD=123

Sau khi đã cấu hình tệp `.env`, ứng dụng sẽ tự động sử dụng các giá trị này khi kết nối với cơ sở dữ liệu trong ứng dụng của bạn.

# Sử dụng Artisan

Đối với việc sử dụng Artisan, có một số lệnh quan trọng mà bạn có thể sử dụng:

- Tạo controller: `php artisan make:controller NameController` (thay "Name" bằng tên mong muốn).
- Tạo model: `php artisan make:model Name` (thay "Name" bằng tên mong muốn).
- Tạo migration: `php artisan make:migration create_name_table` hoặc `php artisan make:migration update_name_table` (thay "name" bằng tên bảng mong muốn).
- Chạy migration: `php artisan migrate` - lệnh này sẽ tạo bảng trong cơ sở dữ liệu dựa trên các file migration đã được tạo.

# Sử dụng routes

Để sử dụng routes, có một số điểm quan trọng cần lưu ý:

- Đối với API routes, bạn có thể cấu hình chúng trong file `routes/api.php`. Đây là nơi bạn xác định các tuyến dẫn tương ứng với các hành động API của bạn.
- Đối với web routes, bạn có thể cấu hình chúng trong file `routes/web.php`. Đây là nơi bạn xác định các tuyến dẫn tương ứng với các hành động của trang web của bạn.

Ví dụ cấu hình một web route:

use App\Controllers\Admin\ApiController;

Route::get('/api/product', [AdminController::class, 'index']);

Trong ví dụ trên, `/api/product` là đường dẫn mà người dùng nhập vào. `AdminController::class` trỏ tới class `AdminController` và `index` là phương thức mà bạn muốn chạy. Hãy đảm bảo đã sử dụng `use` để có thể sử dụng các controller như `use App\Controllers\Admin\ApiController`.

# Layout Master trong Laravel

Layout Master trong Laravel được xử lý bằng cách sử dụng phần `{{ content }}` trong file `main.php`. Để hiển thị các trang con trong master page, bạn sẽ cần truyền chúng vào phần `{{ content }}`.

Ví dụ:

Trong file `main.php`:

<html>
<head>
    <title>Website của tôi</title>
</head>
<body>
    <div class="container">
        {{ content }}
    </div>
</body>
</html>

Chẳng hạn, nếu bạn muốn tạo một layout mới, bạn có thể làm như sau:

1. Tạo một file layout mới (ví dụ: `auth.php`) trong thư mục `layout` của bạn.
2. Trong các phương thức xử lý của controllers, sử dụng phương thức `setLayout()` để đặt layout mới:

$this->setLayout('auth');

3. Trả về view và chuyển vào layout mới:

return $this->render('pages/register', []);

# Debug

Để thực hiệndebug trong Laravel, bạn có thể sử dụng `dd()` hoặc `var_dump()`. Ví dụ:

- Sử dụng `dd()` để chỉ hiển thị một giá trị:

dd($var);

- Sử dụng `var_dump()` để hiển thị nhiều giá trị:

var_dump([$var, $string]);
