<link rel="stylesheet" type="text/css" href="../resources/assets/client/styles/course.css">
<link rel="stylesheet" type="text/css" href="../resources/assets/client/styles/course_responsive.css">
<!-- Header -->
<header class="header">
	<?php

	use Illuminate\framework\Session;

	$class = Session::flash('error-class');
	$error_class = !empty($class) ? '<div class="pt-2 text-danger font-weight-bold">* ' . $class . '</div>' : '';

	$semester = Session::flash('error-semester');
	$error_semester = !empty($semester) ? '<div class="pt-2 text-danger font-weight-bold">* ' . $semester . '</div>' : '';
	?>
	<!-- Header Content -->
	<div class="header_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo_container mr-auto">
							<a href="#">
								<div class="logo"><img src="../resources/assets/client/images/logo-fpt-polytechnic.png"
										alt=""></div>
							</a>
						</div>
						<nav class="main_nav_contaner">
						<ul class="main_nav">
                                <li class="active"><a href="/trang-chu">Trang chủ</a></li>
                                <li><a href="/danh-sach-mon-hoc">Môn học</a></li>
                                <li><a href="instructors.html">Giảng viên</a></li>
                                <li><a href="#">Sự kiện</a></li>
                                <li><a href="blog.html">Blog</a></li>
                            </ul>
						</nav>
						<div class="header_content_right ml-auto text-right">
							<div class="header_search">
								<div class="search_form_container">
									<form action="#" id="search_form" class="search_form trans_400">
										<input type="search" class="header_search_input trans_400"
											placeholder="Type for Search" required="required">
										<div class="search_button">
											<i class="fa fa-search" aria-hidden="true"></i>
										</div>
									</form>
								</div>
							</div>

							<!-- Hamburger -->
	
							<div class="user"><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

</header>

<!-- Home -->

<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<ul class="breadcrumbs_list d-flex flex-row align-items-center justify-content-start">
						<li><a href="index.html">home</a></li>
						<li><a href="courses.html">courses</a></li>
						<li><a href="courses.html">Tiếng anh</a></li>
						<li>vocabulary</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Intro -->

<div class="intro">
	<div class="intro_background parallax-window" data-parallax="scroll"
		data-image-src="../resources\assets\client\images\intro.jpg" data-speed="0.8"></div>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="intro_container d-flex flex-column align-items-start justify-content-end">
					<div class="intro_content">
						<div class="intro_price">Đánh giá</div>
						<div class="rating_r rating_r_4 intro_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="intro_title">
							<?= $course[0]['courseName'] ?>
						</div>
						<div class="intro_meta">
							<div class="intro_image"><img src="../resources/assets/client/images/intro_user.jpg" alt="">
							</div>
							<div class="intro_instructors"><a href="instructors.html">
									<?= $teachers[0]['name'] ?>
								</a> và
								<span><a href="instructors.html">
										<?= $teachers[0]['qtyTeacher'] ?> giảng viên khác
									</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Course -->

<div class="course">
	<div class="course_top"></div>
	<div class="container">
		<div class="row row-lg-eq-height">

			<!-- Panels -->
			<div class="col-lg-9">
				<div class="tab_panels">

					<!-- Tabs -->
					<div class="course_tabs_container">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="tabs d-flex flex-row align-items-center justify-content-start">
										<div class="tab active">thông tin</div>
										<div class="tab">chương trình</div>
										<div class="tab">đánh giá</div>
										<div class="tab">thành viên</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Description -->
					<div class="tab_panel description active">
						<div class="panel_title">Về khóa học này</div>
						<div class="panel_text">
							<?= htmlspecialchars_decode($course[0]['descriptionCourse']) ?>
						</div>

						<!-- Instructors -->
						<div class="instructors">
							<div class="panel_title">Tất cả giảng viên</div>
							<div class="row instructors_row">
								<?php foreach ($teachers as $teacher) { ?>
									<!-- Instructor -->
									<div class="mt-3 col-lg-4 col-md-6">
										<div class="instructor d-flex flex-row align-items-center justify-content-start">
											<div class="instructor_image">
												<div><img src="../resources/assets/client/images/member_0.jpg" alt="">
												</div>
											</div>
											<div class="instructor_content">
												<div class="instructor_name"><a href="instructors.html">
														<?= $teacher['name'] ?>
													</a></div>
												<div class="instructor_title">Giảng Viên</div>
											</div>
										</div>
									</div>
								<?php } ?>

							</div>
						</div>

						<!-- FAQs -->
						<div class="faqs">
							<div class="panel_title">FAQs</div>
							<div class="accordions">

								<div class="elements_accordions">

									<div class="accordion_container">
										<div class="accordion d-flex flex-row align-items-center active">
											<div>CTôi có thể chỉ đăng ký một khóa học duy nhất không? Tôi không
												quan tâm đến toàn bộ Chuyên ngành</div>
										</div>
										<div class="accordion_panel">
											<p>Khóa học PHP2 là một khóa học tiên tiến trong lập trình PHP và
												phát triển ứng dụng web. Trong khóa học này, bạn sẽ học về xử lý
												dữ liệu phức tạp, làm việc với cơ sở dữ liệu, xử lý lỗi và gỡ
												lỗi, cũng như các khái niệm bảo mật ứng dụng web. Bạn cần có
												kiến thức cơ bản về PHP trước khi tham gia khóa học này. Mục
												tiêu của khóa học là giúp bạn nắm vững các kỹ thuật và công cụ
												để phát triển ứng dụng web phức tạp hơn và bảo mật hơn.</p>
										</div>
									</div>

									<div class="accordion_container">
										<div class="accordion d-flex flex-row align-items-center">
											<div>Tôi cần chuẩn bị những gì cho khóa học?</div>
										</div>
										<div class="accordion_panel">
											<p>Khóa học PHP2 là một khóa học tiên tiến trong lập trình PHP và
												phát triển ứng dụng web. Trong khóa học này, bạn sẽ học về xử lý
												dữ liệu phức tạp, làm việc với cơ sở dữ liệu, xử lý lỗi và gỡ
												lỗi, cũng như các khái niệm bảo mật ứng dụng web. Bạn cần có
												kiến thức cơ bản về PHP trước khi tham gia khóa học này. Mục
												tiêu của khóa học là giúp bạn nắm vững các kỹ thuật và công cụ
												để phát triển ứng dụng web phức tạp hơn và bảo mật hơn.</p>
										</div>
									</div>

									<div class="accordion_container">
										<div class="accordion d-flex flex-row align-items-center">
											<div>Kiến thức nền tảng nào là cần thiết</div>
										</div>
										<div class="accordion_panel">
											<p>Khóa học PHP2 là một khóa học tiên tiến trong lập trình PHP và
												phát triển ứng dụng web. Trong khóa học này, bạn sẽ học về xử lý
												dữ liệu phức tạp, làm việc với cơ sở dữ liệu, xử lý lỗi và gỡ
												lỗi, cũng như các khái niệm bảo mật ứng dụng web. Bạn cần có
												kiến thức cơ bản về PHP trước khi tham gia khóa học này. Mục
												tiêu của khóa học là giúp bạn nắm vững các kỹ thuật và công cụ
												để phát triển ứng dụng web phức tạp hơn và bảo mật hơn.</p>
										</div>
									</div>

									<div class="accordion_container">
										<div class="accordion d-flex flex-row align-items-center">
											<div>Tôi có cần tham gia các khóa học theo thứ tự cụ thể không</div>
										</div>
										<div class="accordion_panel">
											<p>Khóa học PHP2 là một khóa học tiên tiến trong lập trình PHP và
												phát triển ứng dụng web. Trong khóa học này, bạn sẽ học về xử lý
												dữ liệu phức tạp, làm việc với cơ sở dữ liệu, xử lý lỗi và gỡ
												lỗi, cũng như các khái niệm bảo mật ứng dụng web. Bạn cần có
												kiến thức cơ bản về PHP trước khi tham gia khóa học này. Mục
												tiêu của khóa học là giúp bạn nắm vững các kỹ thuật và công cụ
												để phát triển ứng dụng web phức tạp hơn và bảo mật hơn.</p>
										</div>
									</div>

								</div>

							</div>
						</div>
					</div>

					<!-- Curriculum -->
					<div class="tab_panel curriculum">
						<div class="panel_title">Giáo trình</div>
						<div class="panel_text">
							<p>Khóa học PHP2 là một khóa học tiên tiến trong lập trình PHP và phát triển ứng
								dụng web. Trong khóa học này, bạn sẽ học về xử lý dữ liệu phức tạp, làm việc với
								cơ sở dữ liệu, xử lý lỗi và gỡ lỗi, cũng như các khái niệm bảo mật ứng dụng web.
								Bạn cần có kiến thức cơ bản về PHP trước khi tham gia khóa học này. Mục tiêu của
								khóa học là giúp bạn nắm vững các kỹ thuật và công cụ để phát triển ứng dụng web
								phức tạp hơn và bảo mật hơn. Suspendisse potenti. In rutrum justo et diam
								egestas luctus. Mauris eu neque eget odio suscipit eleifend. Sed imperdiet ante
								quis felis tempor hendrerit. Curabitur eget fermentum ipsum. Sed efficitur eget
								velit eu vulputate. Duis tincidunt quam in erat dignissim consequat. Praesent
								tempus leo eu nisl fringilla interdum. Maecenas rutrum libero eget lacus
								bibendum tristique. Curabitur at felis lobortis, mollis ante ut, tempus elit.
								Morbi justo nisi, posuere sed augue id, iaculis tincidunt mi. Pellentesque sed
								dolor sed dui congue tempus a et felis.</p>
						</div>
						<div class="curriculum_items">
							<div class="cur_item">
								<div
									class="cur_title_container d-flex flex-row align-items-start justify-content-start">
									<div class="cur_title">Tuần 1</div>
									<div class="cur_num ml-auto">0/4</div>
								</div>
								<div class="cur_item_content">
									<div class="cur_item_title">Cấp độ mới bắt đầul</div>
									<div class="cur_item_text">
										<p>Nam egestas lorem ex, sit amet commodo tortor faucibus a. Suspendisse
											commodo, turpis a dapibus fermentum, turpis ipsum rhoncus massa, sed
											commodo nisi lectus id ipsum.</p>
									</div>
									<div class="cur_contents">
										<ul>
											<li>
												<i class="fa fa-folder" aria-hidden="true"></i><span>1 video, 1
													audio, 1 reading</span>
												<ul>
													<li
														class="d-flex flex-row align-items-center justify-content-start">
														<i class="fa fa-video-camera"
															aria-hidden="true"></i><span>Video: <a href="#">Greetings
																and Introductions</a></span>
														<div class="cur_time ml-auto"><i class="fa fa-clock-o"
																aria-hidden="true"></i><span>15 minutes</span>
														</div>
													</li>
													<li
														class="d-flex flex-row align-items-center justify-content-start">
														<i class="fa fa-file" aria-hidden="true"></i><span>Reading: <a
																href="#">Word Types</a></span>
														<div class="cur_time ml-auto"><i class="fa fa-clock-o"
																aria-hidden="true"></i><span>15 minutes</span>
														</div>
													</li>
													<li
														class="d-flex flex-row align-items-center justify-content-start">
														<i class="fa fa-volume-up" aria-hidden="true"></i><span>Audio:
															<a href="#">Listening Exercise</a></span>
														<div class="cur_time ml-auto"><i class="fa fa-clock-o"
																aria-hidden="true"></i><span>15 minutes</span>
														</div>
													</li>
												</ul>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Graded:
													Cumulative Language
													Quiz</span>
												<div class="cur_time ml-auto"><span>3 Questions</span></div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="cur_item">
								<div
									class="cur_title_container d-flex flex-row align-items-start justify-content-start">
									<div class="cur_title">Tuần 2 2</div>
									<div class="cur_num ml-auto">0/5</div>
								</div>
								<div class="cur_item_content">
									<div class="cur_item_title">Trình độ trung cấp</div>
									<div class="cur_item_text">
										<p>Nam egestas lorem ex, sit amet commodo tortor faucibus a. Suspendisse
											commodo, turpis a dapibus fermentum, turpis ipsum rhoncus massa, sed
											commodo nisi lectus id ipsum.</p>
									</div>
									<div class="cur_contents">
										<ul>
											<li>
												<i class="fa fa-folder" aria-hidden="true"></i><span>1 video, 1
													audio, 1 reading</span>
												<ul>
													<li
														class="d-flex flex-row align-items-center justify-content-start">
														<i class="fa fa-video-camera"
															aria-hidden="true"></i><span>Video: <a href="#">Greetings
																and Introductions</a></span>
														<div class="cur_time ml-auto"><i class="fa fa-clock-o"
																aria-hidden="true"></i><span>15 minutes</span>
														</div>
													</li>
													<li
														class="d-flex flex-row align-items-center justify-content-start">
														<i class="fa fa-file" aria-hidden="true"></i><span>Reading: <a
																href="#">Word Types</a></span>
														<div class="cur_time ml-auto"><i class="fa fa-clock-o"
																aria-hidden="true"></i><span>15 minutes</span>
														</div>
													</li>
													<li
														class="d-flex flex-row align-items-center justify-content-start">
														<i class="fa fa-volume-up" aria-hidden="true"></i><span>Audio:
															<a href="#">Listening Exercise</a></span>
														<div class="cur_time ml-auto"><i class="fa fa-clock-o"
																aria-hidden="true"></i><span>15 minutes</span>
														</div>
													</li>
												</ul>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Graded:
													Cumulative Language
													Quiz</span>
												<div class="cur_time ml-auto"><span>3 Questions</span></div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Reviews -->
					<div class="tab_panel reviews">
						<div class="panel_title">Đánh giá</div>
						<div class="panel_text">
							<p>Lorem ipsum dolor sit amet, te eros consulatu pro, quem labores petentium no sea,
								atqui posidonium interpretaris pri eu. At soleat maiorum platonem vix, no mei
								case fierent. Primis quidam ancillae te mei.</p>
						</div>

						<div class="cur_reviews mt-5">
							<div class="review">
								<?php if (!empty($form)): ?>
									<form action="/client/review/new" method="post">
										<div class="card">
											<div class="pt-4 pb-3 card-header">
												<div class="d-flex justify-content-between align-items-center flex-nowrap">
													<h3 class="font-weight-bold" id="valueTitle">
														<?= $form['title'] ?>
													</h3>
												</div>
											</div>
											<div class="pt-0 card-body text-start">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Lớp học</label>
															<select class="form-control" name="class" id="choices-class"
																multiple>
																<option value="" selected></option>
																<?php
																if (!empty($classes)) {
																	foreach ($classes as $class) {
																		?>
																		<option value="<?= $class['id'] ?>">
																			<?= $class['name'] ?>
																		</option>
																		<?php
																	}
																}
																?>
															</select>
															<?= $error_class ?>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Khóa học</label>
															<select class="form-control" name="semester"
																id="choices-semester" multiple>
																<option value="" selected></option>
																<?php
																if (!empty($semesters)) {
																	foreach ($semesters as $semester) {
																		?>
																		<option value="<?= $semester['id'] ?>">
																			<?= $semester['name'] ?>
																		</option>
																		<?php
																	}
																}
																?>
															</select>
															<?= $error_semester ?>
															<input type="hidden" name="course"
																value="<?= $course[0]['idCourse'] ?>">
														</div>
													</div>
												</div>
												<div class="row" id="resultContainer">

												</div>
											</div>
											<div class="card-footer text-center">
												<button type="submit" class="mb-0 btn btn-icon btn-dark d-lg-block">
													Gửi đánh giá
												</button>
											</div>
										</div>
									</form>
								<?php else: ?>
									<div class="alert alert-dark text-white text-sm" role="alert">
										Môn học chưa có đánh giá!
									</div>
								<?php endif; ?>
							</div>


						</div>
					</div>

					<!-- Members -->
					<div class="tab_panel members">
						<div class="panel_title">Thành viên</div>
						<div class="panel_text">
							<p>Lorem ipsum dolor sit amet, te eros consulatu pro, quem labores petentium no sea,
								atqui posidonium interpretaris pri eu. At soleat maiorum platonem vix, no mei
								case fierent. Primis quidam ancillae te mei.</p>
						</div>
						<div class="members_list d-flex flex-row flex-wrap align-items-start justify-content-start">
							<?php foreach ($teachers as $teacher) { ?>
								<!-- Member -->
								<div class="member">
									<div class="member_image"><img src="../resources/assets/client/images/member_0.jpg"
											alt=""></div>
									<div class="member_title"><a href="#">
											<?= $teacher['name'] ?>
										</a></div>
								</div>

							<?php } ?>
						</div>
					</div>
				</div>
			</div>

			<!-- Sidebar -->
			<div class="col-lg-3">
				<div class="sidebar">
					<div class="sidebar_background"></div>
					<div class="sidebar_top"><a href="#">thông tin khác</a></div>
					<div class="sidebar_content">

						<!-- Features -->
						<div class="sidebar_section features">
							<div class="sidebar_title">Tính năng khóa học</div>
							<div class="features_content">
								<ul class="features_list">

									<!-- Feature -->
									<li class="d-flex flex-row align-items-start justify-content-start">
										<div class="feature_title"><i class="fa fa-clock-o"
												aria-hidden="true"></i><span>Thời gian</span></div>
										<div class="feature_text ml-auto">
											<?= $course[0]['time'] ?> giờ
										</div>
									</li>

									<!-- Feature -->
									<li class="d-flex flex-row align-items-start justify-content-start">
										<div class="feature_title"><i class="fa fa-bell"
												aria-hidden="true"></i><span>Bài giảng</span></div>
										<div class="feature_text ml-auto">
											<?= $course[0]['sermon'] ?>
										</div>
									</li>

									<!-- Feature -->
									<li class="d-flex flex-row align-items-start justify-content-start">
										<div class="feature_title"><i class="fa fa-id-badge"
												aria-hidden="true"></i><span>Câu đố</span></div>
										<div class="feature_text ml-auto">
											<?= $course[0]['quizz'] ?>
										</div>
									</li>


									<!-- Feature -->
									<li class="d-flex flex-row align-items-start justify-content-start">
										<div class="feature_title"><i class="fa fa-thumbs-down"
												aria-hidden="true"></i><span>Số lần thi lại tối đa</span></div>
										<div class="feature_text ml-auto">
											<?= $course[0]['retake'] ?>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<!-- Cert -->
						<div class="sidebar_section cert">
							<div class="sidebar_title">Chứng nhận</div>
							<div class="cert_image"><img src="../resources/assets/client/images/cert.jpg" alt=""></div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<script src="../resources/assets/admin/js/plugins/choices.min.js"></script>
<script>
	if (document.getElementById('choices-semester')) {
		var element = document.getElementById('choices-semester');
		const bath = new Choices(element, {
			removeItemButton: true
		});
	}

	if (document.getElementById('choices-class')) {
		var element = document.getElementById('choices-class');
		const example = new Choices(element, {
			removeItemButton: true
		});

	}


	const resultContainer = document.getElementById('resultContainer');
	const questions = <?php echo json_encode($questions); ?>;

	questions.forEach((question, index) => {
		const div = document.createElement('div');
		div.classList.add('col-md-6');
		const formGroup = document.createElement('div');
		const label = document.createElement('label');
		label.innerText = question['question_text'];
		formGroup.appendChild(label);

		if (question['answer_type'] === '1') {
			const formCheck = document.createElement('div');
			formCheck.classList.add('form-check');
			const radio1 = createRadioButton('Có', 'Có', 'evaluationRadio_' + question['question_id'], 'form-check-input');
			const radio2 = createRadioButton('Không', 'Không', 'evaluationRadio_' + question['question_id'], 'form-check-input');
			formCheck.appendChild(radio1);
			formCheck.appendChild(radio2);
			formGroup.appendChild(formCheck);
		} else if (question['answer_type'] === '2') {
			const formCheck = document.createElement('div');
			formCheck.classList.add('form-check');
			const radio1 = createRadioButton('Tốt', 'Tốt', 'evaluationRadio_' + question['question_id'], 'form-check-input');
			const radio2 = createRadioButton('Khá', 'Khá', 'evaluationRadio_' + question['question_id'], 'form-check-input');
			const radio3 = createRadioButton('Trung bình', 'Trung Bình', 'evaluationRadio_' + question['question_id'], 'form-check-input');
			const radio4 = createRadioButton('Kém', 'Kém', 'evaluationRadio_' + question['question_id'], 'form-check-input');
			formCheck.appendChild(radio1);
			formCheck.appendChild(radio2);
			formCheck.appendChild(radio3);
			formCheck.appendChild(radio4);
			formGroup.appendChild(formCheck);
		} else {
			const textarea = document.createElement('textarea');
			textarea.classList.add('form-control');
			textarea.rows = '3';
			textarea.placeholder = 'Nhập ý kiến của bạn...';
			formGroup.appendChild(textarea);
		}

		div.appendChild(formGroup);
		resultContainer.appendChild(div);
	});

	function createRadioButton(labelText, value, name, inputClass) {
		const input = document.createElement('input');
		input.classList.add(inputClass);
		input.type = 'radio';
		input.name = name;
		input.value = value;
		const label = document.createElement('label');
		label.classList.add('form-check-label');
		label.innerText = labelText;
		const div = document.createElement('div');
		div.appendChild(input);
		div.appendChild(label);
		return div;
	}
</script>