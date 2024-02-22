<?php

namespace App\controllers\admin;

use Illuminate\framework\Controller;
use Illuminate\framework\Response;
use Illuminate\framework\Request;
use Illuminate\framework\factory\Model;
use Illuminate\framework\base\Validator;
use Illuminate\framework\Session;

class DropZoneController extends Controller
{

    public function store(Request $request)
    {
        $data = $_FILES;
        $file = $data['image'];
        $current_month_year = date('Y_m');
        $target_directory = 'public/uploads/courses/' . $current_month_year . '/';

        if (!is_dir($target_directory)) {
            try {
                mkdir($target_directory, 0755, true);
            } catch (\Exception $e) {
                $errors[] = $e->getMessage();
                return false;
            }
        }
        $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
        $new_file_path = $target_directory . $new_file_name;

        while (file_exists($new_file_path)) {
            $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
            $new_file_path = $target_directory . $new_file_name;
        }

        if (!move_uploaded_file($file['tmp_name'], $new_file_path)) {
            Session::flash('msg-error', 'Tải lên không thành công');

        }

        $imageInsert = Model::update('CoursesModel', Session::flash('lastInsertId'), ['image' => $new_file_path]);

        if ($imageInsert) {
            Session::flash('mgs-success', 'Tải ảnh lên thành công');
        } else {
            Session::flash('mgs-success', 'Tải ảnh lên không thành công');
        }
    }
}