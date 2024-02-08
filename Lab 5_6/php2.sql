-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 08, 2024 lúc 02:11 PM
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
(8, 8, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`id`, `course_id`, `name`, `slug`, `created_at`, `deleted_at`) VALUES
(2, NULL, 'WD18302', 'wd18302', '2024-01-31 13:30:19', NULL),
(3, NULL, 'WD18301', 'wd18301', '2024-01-31 13:32:58', NULL);

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
  `form_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `class_options`
--

INSERT INTO `class_options` (`id`, `form_id`, `class_id`) VALUES
(13, 37, 3),
(14, 37, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(37, 'Đánh giá học kỳ Summer 2024');

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
(8, 37, 'Chất lượng giảng viên có tốt không');

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
-- Cấu trúc bảng cho bảng `review_options`
--

CREATE TABLE `review_options` (
  `option_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review_questions`
--

CREATE TABLE `review_questions` (
  `question_id` int(11) NOT NULL,
  `review_id` int(11) DEFAULT NULL
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
(1, '18', '18', '2024-01-31 14:36:13', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `semester_options`
--

CREATE TABLE `semester_options` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `semester_options`
--

INSERT INTO `semester_options` (`id`, `form_id`, `semester_id`) VALUES
(6, 37, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject_options`
--

CREATE TABLE `subject_options` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
(22, 'Trần Văn A', 'vana2292@gmail.com', 'Đẹp trai', 'https://lh3.googleusercontent.com/pw/ABLVV86Uxi-Y1pC-IWcSBC0IGJ2ZBPP5aTq8XNtYP8hHkrWaaK1L2UfevGxrjlDWlTgKL7-A7mPLIJAJ5070O4-jHIV12mQ766dQZMcxuQS_cxEcnZVUELAGqKhHHAmkVYQDOtiid0oqtjsWaqmMDQD_H9Rn1lUW1SCXIkABk_eQYYL2aGagHuezwcJILMmJ-r71u75ZRSHjUsJLhWM_XSTMtwyWTNIUG_RmaWocDwcNZJr3pv4XLjH_OCC-QOk8nz-gYgJkz9KwWSaEmqwF29cWTEDKb44Pz6Io0-bO5Q9EuicsKKvgP-7uwHrWYUpDSZQb9Hb3FOEVjvgeLuGUG0ZDFhAohw1EiQfYbosbc6lJZKX6oggC6sTcxZSeDJ_ALNWIgZ-chVygd3QXHOGPJ92GQtQmsjKREnoLbVNFc67UqXQPB66NkKHoc55WaiKM7zUtUb_Y2Q08H_NVjL2bTLu8qWvh0dfS58xhyq0ItWmno-dJG8AGGqtXIQEdrz41foy_ACrx0cecuBXSQEwr21JI2rQkD8aUZYq0OE8zE869I2u7ATSefUqhmNgDGgC77u71zAwOjYvDF50fKC8rEBOVFxlRBlboKc9Dgy4uXW0cthzO1M8EYtPgCEv6NBJ62Vp_dEfRvO0cI9r0zNYEOBfcL-_dVu-qYXLrfF0Le-ke3cdv5g3jnjz2QJeukPlz92s5jbIjvvrM2y5U88sNZYT6YXC6bDn_irp0ALZqET6ExrB2VjulO90a3Tn69hu_3G0Ok-QIce8-VeRrOIBTANF6vMTdvERmKDWfdUPJSz7zT2NHP3Ez_oYW1fH8QEwRpU4kTBw9xLCTN857M5RvCwonTkC_BWr7F91iTHhgpK2NMRV943QMVe8PgEwmhdb7CoDES7Z7wpzk80HO7rn6fzkpCTD8Xc591YFAZSj6WUPIMUMy3-vskrsTevBnyqxFLSpfYosphD2sPECf4Mpzdmu_wA2ksmDSi0Yr=w890-h890-s-no-gm?authuser=0', 'tran-van-a', NULL, NULL),
(23, 'Trần Lệ C', 'c123@gmail.com', 'Đẹp gái', 'https://lh3.googleusercontent.com/pw/ABLVV86Uxi-Y1pC-IWcSBC0IGJ2ZBPP5aTq8XNtYP8hHkrWaaK1L2UfevGxrjlDWlTgKL7-A7mPLIJAJ5070O4-jHIV12mQ766dQZMcxuQS_cxEcnZVUELAGqKhHHAmkVYQDOtiid0oqtjsWaqmMDQD_H9Rn1lUW1SCXIkABk_eQYYL2aGagHuezwcJILMmJ-r71u75ZRSHjUsJLhWM_XSTMtwyWTNIUG_RmaWocDwcNZJr3pv4XLjH_OCC-QOk8nz-gYgJkz9KwWSaEmqwF29cWTEDKb44Pz6Io0-bO5Q9EuicsKKvgP-7uwHrWYUpDSZQb9Hb3FOEVjvgeLuGUG0ZDFhAohw1EiQfYbosbc6lJZKX6oggC6sTcxZSeDJ_ALNWIgZ-chVygd3QXHOGPJ92GQtQmsjKREnoLbVNFc67UqXQPB66NkKHoc55WaiKM7zUtUb_Y2Q08H_NVjL2bTLu8qWvh0dfS58xhyq0ItWmno-dJG8AGGqtXIQEdrz41foy_ACrx0cecuBXSQEwr21JI2rQkD8aUZYq0OE8zE869I2u7ATSefUqhmNgDGgC77u71zAwOjYvDF50fKC8rEBOVFxlRBlboKc9Dgy4uXW0cthzO1M8EYtPgCEv6NBJ62Vp_dEfRvO0cI9r0zNYEOBfcL-_dVu-qYXLrfF0Le-ke3cdv5g3jnjz2QJeukPlz92s5jbIjvvrM2y5U88sNZYT6YXC6bDn_irp0ALZqET6ExrB2VjulO90a3Tn69hu_3G0Ok-QIce8-VeRrOIBTANF6vMTdvERmKDWfdUPJSz7zT2NHP3Ez_oYW1fH8QEwRpU4kTBw9xLCTN857M5RvCwonTkC_BWr7F91iTHhgpK2NMRV943QMVe8PgEwmhdb7CoDES7Z7wpzk80HO7rn6fzkpCTD8Xc591YFAZSj6WUPIMUMy3-vskrsTevBnyqxFLSpfYosphD2sPECf4Mpzdmu_wA2ksmDSi0Yr=w890-h890-s-no-gm?authuser=0', 'tran-le-c', NULL, NULL);

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
  `role` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `slug`, `role`, `created_at`, `updated_at`) VALUES
(8, 'Võ Trường Đann', 'danvtpc06576@fpt.edu.vn', NULL, '$2y$10$HoMq2F7JMhHM8ThupGvUTeMb57m.afunI81hDFHOz8llED8p6Wn/S', NULL, 'vo-truong-dann', 1, '2024-02-02 07:55:22', '2024-02-02 07:55:22'),
(9, 'Võ Trường Đan', 'vodan1395@gmail.com', NULL, '$2y$10$walS8DjuOdKB3UC1X522qurWHJkFtJNQPUrYHiWMzZ3nvUffLM.F.', NULL, 'vo-truong-dan', 1, '2024-02-07 12:29:43', '2024-02-07 12:29:43'),
(10, 'Nguyễn Văn Hùng', 'admin@gmail.com', NULL, '$2y$10$ulHQCrs3xSM.2kIrCWJu1.IrpTv0nOiCEWR1PRX0jBLnywofmVcOO', NULL, 'nguyen-van-hung', 1, '2024-02-07 12:34:40', '2024-02-07 12:34:40'),
(11, 'Overlord IV', 'admin2@gmail.com', NULL, '$2y$10$JdNybpF9fgwl2gGJ/GcIEOGQiJ0QcUO/mJHIcJkOATDyxRXI7CzBS', NULL, 'overlord-iv', 1, '2024-02-08 13:03:39', '2024-02-08 13:03:39'),
(12, 'Overlord IV', 'linh123@gmail.com', NULL, '$2y$10$tOjh2vwDon1Jgxp.bQGKpeZXtshty.FjN1N5nHknUpgJHBwSIZGpe', NULL, 'overlord-iv', 1, '2024-02-08 13:05:33', '2024-02-08 13:05:33');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

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
  ADD KEY `class_optionsfk2` (`class_id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `semester_id` (`semester_id`);

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
-- Chỉ mục cho bảng `review_options`
--
ALTER TABLE `review_options`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Chỉ mục cho bảng `review_questions`
--
ALTER TABLE `review_questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `review_id` (`review_id`);

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
  ADD KEY `semester_optionsfk2` (`semester_id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `form_id` (`form_id`);

--
-- Chỉ mục cho bảng `subject_options`
--
ALTER TABLE `subject_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_optionsfk1` (`form_id`),
  ADD KEY `subject_optionsfk2` (`subject_id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `class_options`
--
ALTER TABLE `class_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `evaluation_forms`
--
ALTER TABLE `evaluation_forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `semester_options`
--
ALTER TABLE `semester_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `subject_options`
--
ALTER TABLE `subject_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`);

--
-- Các ràng buộc cho bảng `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

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
  ADD CONSTRAINT `class_optionsfk2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Các ràng buộc cho bảng `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_fk1` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`);

--
-- Các ràng buộc cho bảng `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `evaluation_forms` (`form_id`);

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Các ràng buộc cho bảng `review_options`
--
ALTER TABLE `review_options`
  ADD CONSTRAINT `review_options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `review_questions` (`question_id`);

--
-- Các ràng buộc cho bảng `review_questions`
--
ALTER TABLE `review_questions`
  ADD CONSTRAINT `review_questions_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`review_id`);

--
-- Các ràng buộc cho bảng `semester_options`
--
ALTER TABLE `semester_options`
  ADD CONSTRAINT `semester_optionsfk1` FOREIGN KEY (`form_id`) REFERENCES `evaluation_forms` (`form_id`),
  ADD CONSTRAINT `semester_optionsfk2` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`);

--
-- Các ràng buộc cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `evaluation_forms` (`form_id`);

--
-- Các ràng buộc cho bảng `subject_options`
--
ALTER TABLE `subject_options`
  ADD CONSTRAINT `subject_optionsfk1` FOREIGN KEY (`form_id`) REFERENCES `evaluation_forms` (`form_id`),
  ADD CONSTRAINT `subject_optionsfk2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
