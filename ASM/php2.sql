-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 21, 2024 lúc 01:51 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`answer_id`, `question_id`, `answer_type`) VALUES
(14, 14, '2'),
(15, 15, '1'),
(16, 16, '1'),
(17, 17, '2'),
(18, 18, '1'),
(19, 19, '2'),
(20, 20, '3'),
(21, 21, '1'),
(22, 22, '2'),
(23, 23, '1'),
(24, 24, '2'),
(25, 25, '3'),
(26, 26, '1'),
(27, 27, '2'),
(28, 28, '1'),
(29, 29, '2'),
(30, 30, '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `number_students` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`id`, `name`, `slug`, `number_students`, `created_at`, `deleted_at`) VALUES
(2, 'WD18302', 'wd18302', 40, '2024-01-31 13:30:19', NULL),
(3, 'WD18301', 'wd18301', 30, '2024-01-31 13:32:58', NULL),
(4, 'WD18303', 'wd18303', 45, '2024-02-20 06:59:19', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_assignments`
--

CREATE TABLE `class_assignments` (
  `assignment_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class_options`
--

CREATE TABLE `class_options` (
  `id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `class_options`
--

INSERT INTO `class_options` (`id`, `form_id`, `class_id`, `course_id`) VALUES
(48, NULL, 3, 15),
(49, NULL, 2, 15),
(58, 49, 3, NULL),
(59, 49, 2, NULL),
(60, 49, 4, NULL),
(61, NULL, 3, 16),
(62, NULL, 2, 16),
(63, 50, 3, NULL),
(64, 50, 2, NULL),
(65, 51, 3, NULL),
(66, 51, 2, NULL),
(67, NULL, 3, 17),
(68, NULL, 2, 17),
(69, NULL, 4, 17),
(70, 52, 3, NULL),
(71, 52, 2, NULL),
(72, NULL, 3, 18),
(73, NULL, 2, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `time` double DEFAULT NULL,
  `quizz` int(11) DEFAULT NULL,
  `sermon` int(11) DEFAULT NULL,
  `retake` int(11) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `name`, `course_id`, `description`, `time`, `quizz`, `sermon`, `retake`, `image`, `slug`, `deleted_at`, `created_at`) VALUES
(15, 'Lập trình PHP 2', NULL, '&#60;p&#62;Lập trình hướng đối tượng theo mô hình &#60;strong&#62;MVC&#60;/strong&#62;&#60;/p&#62;', 88, 11, 11, 1, 'public/uploads/courses/2024_02/1708410672_65d447309993a.png', 'lap-trinh-php-2', NULL, NULL),
(16, 'HTML5 &#38; CSS3', NULL, '&#60;p&#62;Khóa học nâng cao của môn thiết kế Website...&#60;/p&#62;', 50, 19, 12, 1, 'public/uploads/courses/2024_02/1708443842_65d4c8c2bd187.png', 'html5-38-css3', NULL, NULL),
(17, 'Javascript nâng cao', NULL, '&#60;p&#62;Hihih&#60;/p&#62;', 50, 11, 11, 1, 'public/uploads/courses/2024_02/1708518030_65d5ea8e62b97.png', 'javascript-nang-cao', NULL, NULL),
(18, 'Kiểm thử', NULL, '&#60;p&#62;HAhaa&#60;/p&#62;', 88, 11, 11, 2, 'public/uploads/courses/2024_02/1708519167_65d5eeffd921f.png', 'kiem-thu', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_options`
--

CREATE TABLE `course_options` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `course_options`
--

INSERT INTO `course_options` (`id`, `form_id`, `course_id`) VALUES
(4, 49, 15),
(5, 50, 16),
(6, 50, 15),
(7, 51, 16),
(8, 51, 15),
(9, 52, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `evaluations`
--

INSERT INTO `evaluations` (`id`, `semester_id`, `class_id`, `user_id`, `course_id`, `status`) VALUES
(9, 1, 3, 10, 15, 1),
(10, 1, 3, 13, 16, 1),
(11, 1, 3, 13, 17, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `evaluation_forms`
--

CREATE TABLE `evaluation_forms` (
  `form_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `evaluation_forms`
--

INSERT INTO `evaluation_forms` (`form_id`, `title`) VALUES
(49, 'Đánh giá chất lượng sinh viên học kỳ Summer 2023'),
(50, 'Đánh giá sinh viên học kỳ Spring 2023'),
(51, 'Đánh giá giảng viên học kỳ Spring 2023'),
(52, 'Đánh giá giảng viên kỳ Spring 2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `question_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`question_id`, `form_id`, `question_text`) VALUES
(14, 49, 'Chất lượng giảng dạy của giảng viên như thế nào?'),
(15, 49, 'Bạn có hiểu chương trình giảng dạy không?'),
(16, 50, 'Bạn hài lòng với chất lượng sinh viên?'),
(17, 50, 'Chất lượng giảng dạy của giảng viên?'),
(18, 50, 'Giảng viên có trả lời bạn thường xuyên?'),
(19, 50, 'Chương trình giảng dạy của chúng tôi như thế nào?'),
(20, 50, 'Bạn có ý kiến nòa khác không?'),
(21, 51, 'Bạn hài lòng với chất lượng giảng dạy của giảng viên chứ ?'),
(22, 51, 'Chất lượng giảng dạy của giảng viên?'),
(23, 51, 'Giảng viên thường xuyên trả lời bạn chứ?'),
(24, 51, 'Chất lượng giảng dạy như thế nào?'),
(25, 51, 'Ý kiển khác của bạn?'),
(26, 52, 'Bạn có hài lòng với chất lượng giảng dạy?'),
(27, 52, 'Chương trình giảng dạy của chúng tôi như tế nào ?'),
(28, 52, 'Bạn có thác mác về lộ trình của chúng tôi?'),
(29, 52, 'Thời giang trả lời của giảng viên?'),
(30, 52, 'Bạn có ý kiến nào khác không?');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `name` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `slug` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `slug`, `created_at`, `deleted_at`) VALUES
(1, '18', '18', '2024-01-31 14:36:13', NULL),
(2, '19', '19', '2024-02-20 15:42:34', NULL),
(3, 'WD', 'wd', '2024-02-21 12:21:03', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `semester_options`
--

CREATE TABLE `semester_options` (
  `id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `semester_options`
--

INSERT INTO `semester_options` (`id`, `form_id`, `course_id`, `semester_id`) VALUES
(29, NULL, 16, 2),
(30, 50, NULL, 1),
(31, 50, NULL, 2),
(32, 51, NULL, 1),
(33, 51, NULL, 2),
(34, NULL, 17, 1),
(35, 52, NULL, 1),
(36, NULL, 18, 2),
(37, NULL, 18, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_evaluations`
--

CREATE TABLE `sub_evaluations` (
  `id` int(11) NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `evaluation_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `sub_evaluations`
--

INSERT INTO `sub_evaluations` (`id`, `evaluation_id`, `question_id`, `evaluation_text`) VALUES
(3, 9, 14, 'Tốt'),
(4, 9, 15, 'Có'),
(5, 10, 16, 'Có'),
(6, 10, 17, 'Tốt'),
(7, 10, 18, 'Không'),
(8, 10, 19, 'Kém'),
(9, 11, 26, 'Có'),
(10, 11, 27, 'Tốt'),
(11, 11, 28, 'Không'),
(12, 11, 29, 'Kém');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `avatar` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'https://lh3.googleusercontent.com/pw/ABLVV86Uxi-Y1pC-IWcSBC0IGJ2ZBPP5aTq8XNtYP8hHkrWaaK1L2UfevGxrjlDWlTgKL7-A7mPLIJAJ5070O4-jHIV12mQ766dQZMcxuQS_cxEcnZVUELAGqKhHHAmkVYQDOtiid0oqtjsWaqmMDQD_H9Rn1lUW1SCXIkABk_eQYYL2aGagHuezwcJILMmJ-r71u75ZRSHjUsJLhWM_XSTMtwyWTNIUG_RmaWocDwcNZJr3pv4XLjH_OCC-QOk8nz-gYgJkz9KwWSaEmqwF29cWTEDKb44Pz6Io0-bO5Q9EuicsKKvgP-7uwHrWYUpDSZQb9Hb3FOEVjvgeLuGUG0ZDFhAohw1EiQfYbosbc6lJZKX6oggC6sTcxZSeDJ_ALNWIgZ-chVygd3QXHOGPJ92GQtQmsjKREnoLbVNFc67UqXQPB66NkKHoc55WaiKM7zUtUb_Y2Q08H_NVjL2bTLu8qWvh0dfS58xhyq0ItWmno-dJG8AGGqtXIQEdrz41foy_ACrx0cecuBXSQEwr21JI2rQkD8aUZYq0OE8zE869I2u7ATSefUqhmNgDGgC77u71zAwOjYvDF50fKC8rEBOVFxlRBlboKc9Dgy4uXW0cthzO1M8EYtPgCEv6NBJ62Vp_dEfRvO0cI9r0zNYEOBfcL-_dVu-qYXLrfF0Le-ke3cdv5g3jnjz2QJeukPlz92s5jbIjvvrM2y5U88sNZYT6YXC6bDn_irp0ALZqET6ExrB2VjulO90a3Tn69hu_3G0Ok-QIce8-VeRrOIBTANF6vMTdvERmKDWfdUPJSz7zT2NHP3Ez_oYW1fH8QEwRpU4kTBw9xLCTN857M5RvCwonTkC_BWr7F91iTHhgpK2NMRV943QMVe8PgEwmhdb7CoDES7Z7wpzk80HO7rn6fzkpCTD8Xc591YFAZSj6WUPIMUMy3-vskrsTevBnyqxFLSpfYosphD2sPECf4Mpzdmu_wA2ksmDSi0Yr=w890-h890-s-no-gm?authuser=0',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `description`, `avatar`, `slug`, `created_at`, `deleted_at`) VALUES
(22, 'Trần Văn A', 'vana2292@gmail.com', 'Đẹp trai', 'https://lh3.googleusercontent.com/pw/ABLVV86Uxi-Y1pC-IWcSBC0IGJ2ZBPP5aTq8XNtYP8hHkrWaaK1L2UfevGxrjlDWlTgKL7-A7mPLIJAJ5070O4-jHIV12mQ766dQZMcxuQS_cxEcnZVUELAGqKhHHAmkVYQDOtiid0oqtjsWaqmMDQD_H9Rn1lUW1SCXIkABk_eQYYL2aGagHuezwcJILMmJ-r71u75ZRSHjUsJLhWM_XSTMtwyWTNIUG_RmaWocDwcNZJr3pv4XLjH_OCC-QOk8nz-gYgJkz9KwWSaEmqwF29cWTEDKb44Pz6Io0-bO5Q9EuicsKKvgP-7uwHrWYUpDSZQb9Hb3FOEVjvgeLuGUG0ZDFhAohw1EiQfYbosbc6lJZKX6oggC6sTcxZSeDJ_ALNWIgZ-chVygd3QXHOGPJ92GQtQmsjKREnoLbVNFc67UqXQPB66NkKHoc55WaiKM7zUtUb_Y2Q08H_NVjL2bTLu8qWvh0dfS58xhyq0ItWmno-dJG8AGGqtXIQEdrz41foy_ACrx0cecuBXSQEwr21JI2rQkD8aUZYq0OE8zE869I2u7ATSefUqhmNgDGgC77u71zAwOjYvDF50fKC8rEBOVFxlRBlboKc9Dgy4uXW0cthzO1M8EYtPgCEv6NBJ62Vp_dEfRvO0cI9r0zNYEOBfcL-_dVu-qYXLrfF0Le-ke3cdv5g3jnjz2QJeukPlz92s5jbIjvvrM2y5U88sNZYT6YXC6bDn_irp0ALZqET6ExrB2VjulO90a3Tn69hu_3G0Ok-QIce8-VeRrOIBTANF6vMTdvERmKDWfdUPJSz7zT2NHP3Ez_oYW1fH8QEwRpU4kTBw9xLCTN857M5RvCwonTkC_BWr7F91iTHhgpK2NMRV943QMVe8PgEwmhdb7CoDES7Z7wpzk80HO7rn6fzkpCTD8Xc591YFAZSj6WUPIMUMy3-vskrsTevBnyqxFLSpfYosphD2sPECf4Mpzdmu_wA2ksmDSi0Yr=w890-h890-s-no-gm?authuser=0', 'tran-van-a', '2024-02-19 01:12:01', '2024-02-19 01:12:01'),
(23, 'Trần Lệ C', 'c123@gmail.comn', 'Đẹp gáii', 'https://lh3.googleusercontent.com/pw/ABLVV86Uxi-Y1pC-IWcSBC0IGJ2ZBPP5aTq8XNtYP8hHkrWaaK1L2UfevGxrjlDWlTgKL7-A7mPLIJAJ5070O4-jHIV12mQ766dQZMcxuQS_cxEcnZVUELAGqKhHHAmkVYQDOtiid0oqtjsWaqmMDQD_H9Rn1lUW1SCXIkABk_eQYYL2aGagHuezwcJILMmJ-r71u75ZRSHjUsJLhWM_XSTMtwyWTNIUG_RmaWocDwcNZJr3pv4XLjH_OCC-QOk8nz-gYgJkz9KwWSaEmqwF29cWTEDKb44Pz6Io0-bO5Q9EuicsKKvgP-7uwHrWYUpDSZQb9Hb3FOEVjvgeLuGUG0ZDFhAohw1EiQfYbosbc6lJZKX6oggC6sTcxZSeDJ_ALNWIgZ-chVygd3QXHOGPJ92GQtQmsjKREnoLbVNFc67UqXQPB66NkKHoc55WaiKM7zUtUb_Y2Q08H_NVjL2bTLu8qWvh0dfS58xhyq0ItWmno-dJG8AGGqtXIQEdrz41foy_ACrx0cecuBXSQEwr21JI2rQkD8aUZYq0OE8zE869I2u7ATSefUqhmNgDGgC77u71zAwOjYvDF50fKC8rEBOVFxlRBlboKc9Dgy4uXW0cthzO1M8EYtPgCEv6NBJ62Vp_dEfRvO0cI9r0zNYEOBfcL-_dVu-qYXLrfF0Le-ke3cdv5g3jnjz2QJeukPlz92s5jbIjvvrM2y5U88sNZYT6YXC6bDn_irp0ALZqET6ExrB2VjulO90a3Tn69hu_3G0Ok-QIce8-VeRrOIBTANF6vMTdvERmKDWfdUPJSz7zT2NHP3Ez_oYW1fH8QEwRpU4kTBw9xLCTN857M5RvCwonTkC_BWr7F91iTHhgpK2NMRV943QMVe8PgEwmhdb7CoDES7Z7wpzk80HO7rn6fzkpCTD8Xc591YFAZSj6WUPIMUMy3-vskrsTevBnyqxFLSpfYosphD2sPECf4Mpzdmu_wA2ksmDSi0Yr=w890-h890-s-no-gm?authuser=0', 'tran-le-c', '2024-02-21 11:36:33', '2024-02-21 11:36:33'),
(24, 'Trần Văn T', 'vant1395@gmail.com', 'Đẹp trai', 'https://lh3.googleusercontent.com/pw/ABLVV86Uxi-Y1pC-IWcSBC0IGJ2ZBPP5aTq8XNtYP8hHkrWaaK1L2UfevGxrjlDWlTgKL7-A7mPLIJAJ5070O4-jHIV12mQ766dQZMcxuQS_cxEcnZVUELAGqKhHHAmkVYQDOtiid0oqtjsWaqmMDQD_H9Rn1lUW1SCXIkABk_eQYYL2aGagHuezwcJILMmJ-r71u75ZRSHjUsJLhWM_XSTMtwyWTNIUG_RmaWocDwcNZJr3pv4XLjH_OCC-QOk8nz-gYgJkz9KwWSaEmqwF29cWTEDKb44Pz6Io0-bO5Q9EuicsKKvgP-7uwHrWYUpDSZQb9Hb3FOEVjvgeLuGUG0ZDFhAohw1EiQfYbosbc6lJZKX6oggC6sTcxZSeDJ_ALNWIgZ-chVygd3QXHOGPJ92GQtQmsjKREnoLbVNFc67UqXQPB66NkKHoc55WaiKM7zUtUb_Y2Q08H_NVjL2bTLu8qWvh0dfS58xhyq0ItWmno-dJG8AGGqtXIQEdrz41foy_ACrx0cecuBXSQEwr21JI2rQkD8aUZYq0OE8zE869I2u7ATSefUqhmNgDGgC77u71zAwOjYvDF50fKC8rEBOVFxlRBlboKc9Dgy4uXW0cthzO1M8EYtPgCEv6NBJ62Vp_dEfRvO0cI9r0zNYEOBfcL-_dVu-qYXLrfF0Le-ke3cdv5g3jnjz2QJeukPlz92s5jbIjvvrM2y5U88sNZYT6YXC6bDn_irp0ALZqET6ExrB2VjulO90a3Tn69hu_3G0Ok-QIce8-VeRrOIBTANF6vMTdvERmKDWfdUPJSz7zT2NHP3Ez_oYW1fH8QEwRpU4kTBw9xLCTN857M5RvCwonTkC_BWr7F91iTHhgpK2NMRV943QMVe8PgEwmhdb7CoDES7Z7wpzk80HO7rn6fzkpCTD8Xc591YFAZSj6WUPIMUMy3-vskrsTevBnyqxFLSpfYosphD2sPECf4Mpzdmu_wA2ksmDSi0Yr=w890-h890-s-no-gm?authuser=0', 'tran-van-t', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher_options`
--

CREATE TABLE `teacher_options` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher_options`
--

INSERT INTO `teacher_options` (`id`, `course_id`, `teacher_id`) VALUES
(13, 15, 23),
(14, 16, 23),
(15, 17, 24),
(16, 18, 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `role` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `slug`, `role`, `created_at`, `updated_at`) VALUES
(10, 'Nguyễn Văn Hùng', 'admin@gmail.com', NULL, '$2y$10$ulHQCrs3xSM.2kIrCWJu1.IrpTv0nOiCEWR1PRX0jBLnywofmVcOO', NULL, 'nguyen-van-hung', 2, '2024-02-07 12:34:40', '2024-02-21 11:48:25'),
(13, 'Võ Trường Đann', 'vodan1395@gmail.com', NULL, '$2y$10$jXCamHXH32z6c12Hu4fL6.VQ2RZYKpEiDPFXu1LS0J6xnd/B9W5tC', NULL, 'vo-truong-dann', 0, '2024-02-21 11:40:19', '2024-02-21 11:40:19');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `class_assignments`
--
ALTER TABLE `class_assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Chỉ mục cho bảng `class_options`
--
ALTER TABLE `class_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_optionsfk1` (`form_id`),
  ADD KEY `class_optionsfk2` (`class_id`),
  ADD KEY `class_optionsfk3` (`course_id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `course_options`
--
ALTER TABLE `course_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_optionsfk1` (`form_id`),
  ADD KEY `subject_optionsfk2` (`course_id`);

--
-- Chỉ mục cho bảng `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_fk1` (`class_id`),
  ADD KEY `evaluation_fk2` (`semester_id`),
  ADD KEY `evaluation_fk3` (`user_id`),
  ADD KEY `evaluation_fk4` (`course_id`);

--
-- Chỉ mục cho bảng `evaluation_forms`
--
ALTER TABLE `evaluation_forms`
  ADD PRIMARY KEY (`form_id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `form_id` (`form_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Chỉ mục cho bảng `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `semester_options`
--
ALTER TABLE `semester_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semester_optionsfk1` (`form_id`),
  ADD KEY `semester_optionsfk2` (`semester_id`),
  ADD KEY `semester_optionsfk3` (`course_id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sub_evaluations`
--
ALTER TABLE `sub_evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_evaluation_fk1` (`evaluation_id`),
  ADD KEY `sub_evaluation_fk2` (`question_id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teacher_options`
--
ALTER TABLE `teacher_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_optionsfk1` (`course_id`),
  ADD KEY `teacher_optionsfk2` (`teacher_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `class_options`
--
ALTER TABLE `class_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `course_options`
--
ALTER TABLE `course_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `evaluation_forms`
--
ALTER TABLE `evaluation_forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `semester_options`
--
ALTER TABLE `semester_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sub_evaluations`
--
ALTER TABLE `sub_evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `teacher_options`
--
ALTER TABLE `teacher_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`);

--
-- Các ràng buộc cho bảng `class_assignments`
--
ALTER TABLE `class_assignments`
  ADD CONSTRAINT `class_assignments_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `class_assignments_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Các ràng buộc cho bảng `class_options`
--
ALTER TABLE `class_options`
  ADD CONSTRAINT `class_optionsfk1` FOREIGN KEY (`form_id`) REFERENCES `evaluation_forms` (`form_id`),
  ADD CONSTRAINT `class_optionsfk2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `class_optionsfk3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Các ràng buộc cho bảng `course_options`
--
ALTER TABLE `course_options`
  ADD CONSTRAINT `subject_optionsfk1` FOREIGN KEY (`form_id`) REFERENCES `evaluation_forms` (`form_id`),
  ADD CONSTRAINT `subject_optionsfk2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Các ràng buộc cho bảng `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluation_fk1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `evaluation_fk2` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  ADD CONSTRAINT `evaluation_fk3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `evaluation_fk4` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Các ràng buộc cho bảng `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `evaluation_forms` (`form_id`);

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Các ràng buộc cho bảng `semester_options`
--
ALTER TABLE `semester_options`
  ADD CONSTRAINT `semester_optionsfk1` FOREIGN KEY (`form_id`) REFERENCES `evaluation_forms` (`form_id`),
  ADD CONSTRAINT `semester_optionsfk2` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  ADD CONSTRAINT `semester_optionsfk3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Các ràng buộc cho bảng `sub_evaluations`
--
ALTER TABLE `sub_evaluations`
  ADD CONSTRAINT `sub_evaluation_fk1` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`),
  ADD CONSTRAINT `sub_evaluation_fk2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`);

--
-- Các ràng buộc cho bảng `teacher_options`
--
ALTER TABLE `teacher_options`
  ADD CONSTRAINT `teacher_optionsfk1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `teacher_optionsfk2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
