<?php
$courses = [
    's1' => [
        'name' => 'Khóa học 1',
        'description' => 'Khóa học ReactJs.',
        'semester' => 'Mùa xuân 2024',
        'instructor' => 'Nguyễn Văn A',
        'credits' => 3
    ],
    's2' => [
        'name' => 'Khóa học 2',
        'description' => 'Khóa học NodeJs.',
        'semester' => 'Mùa thu 2024',
        'instructor' => 'Trần Văn B',
        'credits' => 4
    ],
    's3' => [
        'name' => 'Khóa học 3',
        'description' => 'Khóa học Angular.',
        'semester' => 'Mùa xuân 2025',
        'instructor' => 'Lê Hoàng C',
        'credits' => 3
    ]
];

function get_courses()
{
    global $courses;
    return array_values($courses);
}

function find_by_semester($conversion_array, $semester)
{
    if ($semester === '') {
        return null;
    } else {
        return ($conversion_array[$semester] ? $conversion_array[$semester] : null);
    }
}

$list_of_courses = get_courses();
$semester = (isset($_GET['semester']) ? $_GET['semester'] : '');
$selected_course = find_by_semester($list_of_courses, $semester);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Chọn khóa học</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Chọn khóa học</h1>
        <form action="" method="get">
            <div class="mb-3">
                <label for="semester" class="form-label">Chọn kỳ học:</label>
                <select name="semester" id="semester" class="form-select">
                    <option value="">-- Chọn --</option>
                    <?php foreach ($list_of_courses as $index => $course) : ?>
                        <option value="<?= strval($index) ?>" <?= ($semester == $index) ? 'selected' : '' ?>>
                            <?= $course['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Xem chi tiết</button>
        </form>

        <?php if ($selected_course) : ?>
            <div class="mt-4">
                <h2><?= $selected_course['name'] ?></h2>
                <p><?= $selected_course['description'] ?></p>
                <p><strong>Kỳ học:</strong> <?= $selected_course['semester'] ?></p>
                <p><strong>Giảng viên:</strong> <?= $selected_course['instructor'] ?></p>
                <p><strong>Số tín chỉ:</strong> <?= $selected_course['credits'] ?></p>
            </div>
        <?php elseif ($selected_course === null) : ?>
            <div class="mt-4">
                <p>Không tìm thấy khóa học cho kỳ học đã chọn.</p>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>