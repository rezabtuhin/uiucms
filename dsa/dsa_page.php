<?php
$conn = mysqli_connect("localhost", "root", "", "uiucms");
$query = "select * from post";
$connect = mysqli_query($conn, $query);
// $data = mysqli_fetch_assoc($connect);
$num = mysqli_num_rows($connect);
?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>DSA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="./WorkWise Html Template_files/animate.css">
	<link rel="stylesheet" type="text/css" href="./WorkWise Html Template_files/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./WorkWise Html Template_files/flatpickr.min.css">
	<link rel="stylesheet" type="text/css" href="./WorkWise Html Template_files/line-awesome.css">
	<link rel="stylesheet" type="text/css" href="./WorkWise Html Template_files/line-awesome-font-awesome.min.css">
	<link href="./WorkWise Html Template_files/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="./WorkWise Html Template_files/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./WorkWise Html Template_files/slick.css">
	<link rel="stylesheet" type="text/css" href="./WorkWise Html Template_files/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="./WorkWise Html Template_files/style.css">
	<link rel="stylesheet" type="text/css" href="./WorkWise Html Template_files/responsive.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />
</head>

<body data-new-gr-c-s-check-loaded="14.1073.0" data-gr-ext-installed="">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap');

		* {
			font-family: 'Source Sans Pro', sans-serif;
		}

		body {
			background-color: #f2f2f2;
		}

		.navbar {
			background-color: #FFC000;
			width: 100%;
		}
	</style>

	<nav class="navbar navbar-expand-lg navbar-light bg-orange bg-opacity-30">
		<div class="container justify-content-between">
			<div class="d-flex">
				<a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="#">
					<img src="../dsa/WorkWise Html Template_files/company-profile.png" height="20" alt="MDB Logo" loading="lazy" style="margin-top: 2px;" />
				</a>

				<form class="input-group w-auto my-auto d-none d-sm-flex">
					<input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" style="min-width: 125px;" />
					<span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
				</form>
			</div>

			<ul class="navbar-nav flex-row">

				<li class="nav-item me-3 me-lg-1 active">
					<a class="nav-link" href="#">
						<span><i class="fas fa-home fa-lg"></i></span>
					</a>
				</li>

				<li class="nav-item dropdown me-3 me-lg-1">
					<a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
						<i class="fas fa-comments fa-lg"></i>

					</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
						<li><a class="dropdown-item" href="#">Some news</a></li>
						<li><a class="dropdown-item" href="#">Another news</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul>
				</li>

				<li class="nav-item me-3 me-lg-1">
					<a class="nav-link d-sm-flex align-items-sm-center" href="#">
						<img src="../dsa/images/profile-default-image/img_avatar1.png" class="rounded-circle" height="22" alt="Black and White Portrait of a Man" loading="lazy" />
						<?php
						if ($num > 0) {
							while ($data = mysqli_fetch_assoc($connect)) {
								echo "
							<strong> " . $data["user"] . "</strong>
							";
							}
						}

						?>


					</a>
				</li>

			</ul>

		</div>
	</nav>

	<div class="wrapper">


		<section class="cover-sec">
			<img src="./WorkWise Html Template_files/company-cover.jpg" alt="">
		</section>
		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3">
								<div class="main-left-sidebar">
									<div class="user_profile">
										<div class="user-pro-img">
											<img src="./WorkWise Html Template_files/company-profile.png" alt="">
										</div>

										<ul class="social_links">
											<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title=""><i class="la la-globe"></i> www.example.com</a></li>
											<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title=""><i class="fa fa-facebook-square"></i>
													Http://www.facebook.com/john...</a></li>
											<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title=""><i class="fa fa-twitter"></i>
													Http://www.Twitter.com/john...</a></li>

										</ul>
									</div>

								</div>
							</div>
							<div class="col-lg-6">
								<div class="main-ws-sec">
									<div class="user-tab-sec">

										<h3>Directorate of Student Affairs</h3>

										<div class="product-feed-tab current" id="feed-dd">
											<div class="posts-section">
												<div class="post-bar">
													<div class="post_topbar">
														<div class="usy-dt">
															<img src="./WorkWise Html Template_files/company-pic.png" alt="">

															<div class="usy-name">
																<?php
																if ($num > 0) {
																	while ($data = mysqli_fetch_assoc($connect)) {
																		echo "
							<strong> " . $data["user"] . "</strong>
							";
																	}
																}

																?>
																<h3>011191156</h3>


																<span><img src="./WorkWise Html Template_files/clock.png" alt="">3 min ago</span>
															</div>
														</div>
														<div class="ed-opts">
															<a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="">Edit Post</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="">Unsaved</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="">Unbid</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="">Close</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="">Hide</a></li>
															</ul>
														</div>
													</div>
													<div class="epi-sec">

														<ul class="bk-links">
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="accept"><i class="la la-bookmark"></i></a></li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title=""><i class="la la-envelope"></i></a></li>
														</ul>
													</div>
													<div class="job_descp">
													<?php
																if ($num > 0) {
																	while ($data = mysqli_fetch_assoc($connect)) {
																		echo "
							<strong> " . $data["user"] . "</strong>
							";
																	}
																}

																?>

														<p>Hello, this is my new post.</p>

													</div>
													<div class="job-status-bar">
														<ul class="like-com">
															<li>
																<a href="https://gambolthemes.net/workwise-new/company-profile.html#" class="active"><i class="fas fa-heart"></i> Like</a>
																<img src="./WorkWise Html Template_files/liked-img.png" alt="">
																<?php
																if ($num > 0) {
																	while ($data = mysqli_fetch_assoc($connect)) {
																		echo "
																		<span>".$data["total_reaction"]."</span>
							";
																	}
																}

																?>
																<span>25</span>
															</li>
															<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" class="com"><i class="fas fa-comment-alt"></i> Comments
																	15</a></li>
														</ul>
														<a href="https://gambolthemes.net/workwise-new/company-profile.html#"><i class="fas fa-eye"></i>Views 50</a>
													</div>
												</div>

												<div class="process-comm">
													<div class="spinner">
														<div class="bounce1"></div>
														<div class="bounce2"></div>
														<div class="bounce3"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="product-feed-tab" id="info-dd">
											<div class="user-profile-ov">
												<h3><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="overview-open">Overview</a> <a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor
													aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue
													nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo
													viverra. Nunc eu augue nec arcu efficitur faucibus. Aliquam accumsan ac
													magna convallis bibendum. Quisque laoreet augue eget augue fermentum
													scelerisque. Vivamus dignissim mollis est dictum blandit. Nam porta
													auctor neque sed congue. Nullam rutrum eget ex at maximus. Lorem ipsum
													dolor sit amet, consectetur adipiscing elit. Donec eget vestibulum
													lorem.</p>
											</div>
											<div class="user-profile-ov st2">
												<h3><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="esp-bx-open">Establish Since </a><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="esp-bx-open"><i class="fa fa-pencil"></i></a> <a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="esp-bx-open"><i class="fa fa-plus-square"></i></a>
												</h3>
												<span>February 2004</span>
											</div>
											<div class="user-profile-ov">
												<h3><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="emp-open">Total Employees</a> <a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="emp-open"><i class="fa fa-pencil"></i></a> <a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="emp-open"><i class="fa fa-plus-square"></i></a></h3>
												<span>17,048</span>
											</div>
											<div class="user-profile-ov">
												<h3><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="lct-box-open">Location</a> <a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a> <a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="lct-box-open"><i class="fa fa-plus-square"></i></a>
												</h3>
												<h4>USA</h4>
												<p> Menlo Park, California, United States</p>
											</div>
										</div>
										
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	</main>

	<div class="overview-box" id="overview-box">
		<div class="overview-edit">
			<h3>Overview</h3>
			<span>5000 character left</span>
			<form>
				<textarea></textarea>
				<button type="submit" class="save">Save</button>
				<button type="submit" class="cancel">Cancel</button>
			</form>
			<a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="close-box"><i class="la la-close"></i></a>
		</div>
	</div>
	<div class="overview-box" id="experience-box">
		<div class="overview-edit">
			<h3>Experience</h3>
			<form>
				<input type="text" name="subject" placeholder="Subject">
				<textarea></textarea>
				<button type="submit" class="save">Save</button>
				<button type="submit" class="save-add">Save &amp; Add More</button>
				<button type="submit" class="cancel">Cancel</button>
			</form>
			<a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="close-box"><i class="la la-close"></i></a>
		</div>
	</div>
	<div class="overview-box" id="education-box">
		<div class="overview-edit">
			<h3>Education</h3>
			<form>
				<input type="text" name="school" placeholder="School / University">
				<div class="datepicky">
					<div class="row">
						<div class="col-lg-6 no-left-pd">
							<div class="datefm">
								<input type="text" name="from" placeholder="From" class="datepicker flatpickr-input" readonly="readonly">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
						<div class="col-lg-6 no-righ-pd">
							<div class="datefm">
								<input type="text" name="to" placeholder="To" class="datepicker flatpickr-input" readonly="readonly">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
					</div>
				</div>
				<input type="text" name="degree" placeholder="Degree">
				<textarea placeholder="Description"></textarea>
				<button type="submit" class="save">Save</button>
				<button type="submit" class="save-add">Save &amp; Add More</button>
				<button type="submit" class="cancel">Cancel</button>
			</form>
			<a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="close-box"><i class="la la-close"></i></a>
		</div>
	</div>
	<div class="overview-box" id="location-box">
		<div class="overview-edit">
			<h3>Location</h3>
			<form>
				<div class="datefm">
					<select>
						<option>Country</option>
						<option value="pakistan">Pakistan</option>
						<option value="england">England</option>
						<option value="india">India</option>
						<option value="usa">United Sates</option>
					</select>
					<i class="fa fa-globe"></i>
				</div>
				<div class="datefm">
					<select>
						<option>City</option>
						<option value="london">London</option>
						<option value="new-york">New York</option>
						<option value="sydney">Sydney</option>
						<option value="chicago">Chicago</option>
					</select>
					<i class="fa fa-map-marker"></i>
				</div>
				<button type="submit" class="save">Save</button>
				<button type="submit" class="cancel">Cancel</button>
			</form>
			<a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="close-box"><i class="la la-close"></i></a>
		</div>
	</div>
	<div class="overview-box" id="skills-box">
		<div class="overview-edit">
			<h3>Skills</h3>
			<ul>
				<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="skl-name">HTML</a><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="close-skl"><i class="la la-close"></i></a></li>
				<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="skl-name">php</a><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="close-skl"><i class="la la-close"></i></a></li>
				<li><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="skl-name">css</a><a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="close-skl"><i class="la la-close"></i></a></li>
			</ul>
			<form>
				<input type="text" name="skills" placeholder="Skills">
				<button type="submit" class="save">Save</button>
				<button type="submit" class="save-add">Save &amp; Add More</button>
				<button type="submit" class="cancel">Cancel</button>
			</form>
			<a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="close-box"><i class="la la-close"></i></a>
		</div>
	</div>
	<div class="overview-box" id="create-portfolio">
		<div class="overview-edit">
			<h3>Create Portfolio</h3>
			<form>
				<input type="text" name="pf-name" placeholder="Portfolio Name">
				<div class="file-submit nomg">
					<input type="file" name="file">
				</div>
				<div class="pf-img">
					<img src="./WorkWise Html Template_files/np.png" alt="">
				</div>
				<input type="text" name="website-url" placeholder="htp://www.example.com">
				<button type="submit" class="save">Save</button>
				<button type="submit" class="cancel">Cancel</button>
			</form>
			<a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="close-box"><i class="la la-close"></i></a>
		</div>
	</div>
	<div class="overview-box" id="establish-box">
		<div class="overview-edit">
			<h3>Establish Since</h3>
			<form>
				<div class="daty">
					<input type="text" name="establish" placeholder="Select Date" class="datepicker flatpickr-input" readonly="readonly">
					<i class="fa fa-calendar"></i>
				</div>
				<button type="submit" class="save">Save</button>
				<button type="submit" class="cancel">Cancel</button>
			</form>
			<a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="close-box"><i class="la la-close"></i></a>
		</div>
	</div>
	<div class="overview-box" id="total-employes">
		<div class="overview-edit">
			<h3>Total Employees</h3>
			<form>
				<input type="text" name="employes" placeholder="Type in numbers">
				<button type="submit" class="save">Save</button>
				<button type="submit" class="cancel">Cancel</button>
			</form>
			<a href="https://gambolthemes.net/workwise-new/company-profile.html#" title="" class="close-box"><i class="la la-close"></i></a>
		</div>
	</div>
	</div>
	<script type="text/javascript" src="./WorkWise Html Template_files/jquery.min.js.download"></script>
	<script type="text/javascript" src="./WorkWise Html Template_files/popper.js.download"></script>
	<script type="text/javascript" src="./WorkWise Html Template_files/bootstrap.min.js.download"></script>
	<script type="text/javascript" src="./WorkWise Html Template_files/flatpickr.min.js.download"></script>
	<div class="flatpickr-calendar hasTime animate arrowTop" tabindex="-1" style="top: 223.5px; left: 409.5px; right: auto;">
		<div class="flatpickr-month"><span class="flatpickr-prev-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
					<g></g>
					<path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z">
					</path>
				</svg></span><span class="flatpickr-current-month"><span class="cur-month" title="Scroll to increment">August </span>
				<div class="numInputWrapper"><input class="numInput cur-year" type="text" pattern="\d*" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div>
			</span><span class="flatpickr-next-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
					<g></g>
					<path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z">
					</path>
				</svg></span></div>
		<div class="flatpickr-innerContainer">
			<div class="flatpickr-rContainer">
				<div class="flatpickr-weekdays">
					<span class="flatpickr-weekday">
						Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
					</span>
				</div>
			</div>
		</div>
		<div class="flatpickr-time" tabindex="-1">
			<div class="numInputWrapper"><input class="numInput flatpickr-hour" type="text" pattern="\d*" tabindex="-1" step="1" min="1" max="12" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-time-separator">:</span>
			<div class="numInputWrapper"><input class="numInput flatpickr-minute" type="text" pattern="\d*" tabindex="-1" step="5" min="0" max="59" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-am-pm" title="Click to toggle" tabindex="-1">PM</span>
		</div>
	</div>
	<div class="flatpickr-calendar hasTime animate arrowTop" tabindex="-1" style="top: 223.5px; left: 689.5px; right: auto;">
		<div class="flatpickr-month"><span class="flatpickr-prev-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
					<g></g>
					<path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z">
					</path>
				</svg></span><span class="flatpickr-current-month"><span class="cur-month" title="Scroll to increment">August </span>
				<div class="numInputWrapper"><input class="numInput cur-year" type="text" pattern="\d*" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div>
			</span><span class="flatpickr-next-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
					<g></g>
					<path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z">
					</path>
				</svg></span></div>
		<div class="flatpickr-innerContainer">
			<div class="flatpickr-rContainer">
				<div class="flatpickr-weekdays">
					<span class="flatpickr-weekday">
						Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
					</span>
				</div>
				
			</div>
		</div>
		<div class="flatpickr-time" tabindex="-1">
			<div class="numInputWrapper"><input class="numInput flatpickr-hour" type="text" pattern="\d*" tabindex="-1" step="1" min="1" max="12" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-time-separator">:</span>
			<div class="numInputWrapper"><input class="numInput flatpickr-minute" type="text" pattern="\d*" tabindex="-1" step="5" min="0" max="59" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-am-pm" title="Click to toggle" tabindex="-1">PM</span>
		</div>
	</div>
	<div class="flatpickr-calendar hasTime animate arrowTop" tabindex="-1" style="top: 320px; left: 409.5px; right: auto;">
		<div class="flatpickr-month"><span class="flatpickr-prev-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
					<g></g>
					<path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z">
					</path>
				</svg></span><span class="flatpickr-current-month"><span class="cur-month" title="Scroll to increment">August </span>
				<div class="numInputWrapper"><input class="numInput cur-year" type="text" pattern="\d*" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div>
			</span><span class="flatpickr-next-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
					<g></g>
					<path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z">
					</path>
				</svg></span></div>
		<div class="flatpickr-innerContainer">
			<div class="flatpickr-rContainer">
				<div class="flatpickr-weekdays">
					<span class="flatpickr-weekday">
						Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
					</span>
				</div>
				<div class="flatpickr-days" tabindex="-1">
					<div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="July 31, 2022" tabindex="-1">31</span><span class="flatpickr-day " aria-label="August 1, 2022" tabindex="-1">1</span><span class="flatpickr-day " aria-label="August 2, 2022" tabindex="-1">2</span><span class="flatpickr-day " aria-label="August 3, 2022" tabindex="-1">3</span><span class="flatpickr-day " aria-label="August 4, 2022" tabindex="-1">4</span><span class="flatpickr-day " aria-label="August 5, 2022" tabindex="-1">5</span><span class="flatpickr-day " aria-label="August 6, 2022" tabindex="-1">6</span><span class="flatpickr-day " aria-label="August 7, 2022" tabindex="-1">7</span><span class="flatpickr-day " aria-label="August 8, 2022" tabindex="-1">8</span><span class="flatpickr-day " aria-label="August 9, 2022" tabindex="-1">9</span><span class="flatpickr-day " aria-label="August 10, 2022" tabindex="-1">10</span><span class="flatpickr-day today" aria-label="August 11, 2022" tabindex="-1">11</span><span class="flatpickr-day " aria-label="August 12, 2022" tabindex="-1">12</span><span class="flatpickr-day " aria-label="August 13, 2022" tabindex="-1">13</span><span class="flatpickr-day " aria-label="August 14, 2022" tabindex="-1">14</span><span class="flatpickr-day " aria-label="August 15, 2022" tabindex="-1">15</span><span class="flatpickr-day " aria-label="August 16, 2022" tabindex="-1">16</span><span class="flatpickr-day " aria-label="August 17, 2022" tabindex="-1">17</span><span class="flatpickr-day " aria-label="August 18, 2022" tabindex="-1">18</span><span class="flatpickr-day " aria-label="August 19, 2022" tabindex="-1">19</span><span class="flatpickr-day " aria-label="August 20, 2022" tabindex="-1">20</span><span class="flatpickr-day " aria-label="August 21, 2022" tabindex="-1">21</span><span class="flatpickr-day " aria-label="August 22, 2022" tabindex="-1">22</span><span class="flatpickr-day " aria-label="August 23, 2022" tabindex="-1">23</span><span class="flatpickr-day " aria-label="August 24, 2022" tabindex="-1">24</span><span class="flatpickr-day " aria-label="August 25, 2022" tabindex="-1">25</span><span class="flatpickr-day " aria-label="August 26, 2022" tabindex="-1">26</span><span class="flatpickr-day " aria-label="August 27, 2022" tabindex="-1">27</span><span class="flatpickr-day " aria-label="August 28, 2022" tabindex="-1">28</span><span class="flatpickr-day " aria-label="August 29, 2022" tabindex="-1">29</span><span class="flatpickr-day " aria-label="August 30, 2022" tabindex="-1">30</span><span class="flatpickr-day " aria-label="August 31, 2022" tabindex="-1">31</span><span class="flatpickr-day nextMonthDay" aria-label="September 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="September 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="September 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="September 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="September 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="September 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="September 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="September 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="September 9, 2022" tabindex="-1">9</span><span class="flatpickr-day nextMonthDay" aria-label="September 10, 2022" tabindex="-1">10</span>
					</div>
				</div>
			</div>
		</div>
		<div class="flatpickr-time" tabindex="-1">
			<div class="numInputWrapper"><input class="numInput flatpickr-hour" type="text" pattern="\d*" tabindex="-1" step="1" min="1" max="12" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-time-separator">:</span>
			<div class="numInputWrapper"><input class="numInput flatpickr-minute" type="text" pattern="\d*" tabindex="-1" step="5" min="0" max="59" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-am-pm" title="Click to toggle" tabindex="-1">PM</span>
		</div>
	</div>
	<script type="text/javascript" src="./WorkWise Html Template_files/slick.min.js.download"></script>
	<script type="text/javascript" src="./WorkWise Html Template_files/script.js.download"></script>

	<gdiv class="ginger-extension-writer" style="display: none;">
		<gdiv class="ginger-extension-writer-frame"><iframe src="./WorkWise Html Template_files/index.html"></iframe>
		</gdiv>
	</gdiv>
	<gdiv id="ginger-floatingG-container" style="position: absolute; top: 0px; left: 0px;">
		<gdiv class="ginger-floatingG ginger-floatingG-closed" style="display: none;">
			<gdiv class="ginger-floatingG-disabled-main">
				<gdiv class="ginger-floatingG-bar-tool-tooltip">Enable Ginger</gdiv>
			</gdiv>
			<gdiv class="ginger-floatingG-offline-main">
				<gdiv class="ginger-floatingG-bar-tool-tooltip"><em>Cannot connect to Ginger</em> Check your internet
					connection<br> or reload the browser</gdiv>
			</gdiv>
			<gdiv class="ginger-floatingG-enabled-main">
				<gdiv class="ginger-floatingG-bar">
					<gdiv class="ginger-floatingG-bar-tool ginger-floatingG-bar-tool-disable">
						<ga></ga>
						<gdiv class="ginger-floatingG-bar-tool-tooltip">Disable in this text field</gdiv>
					</gdiv>
					<gdiv class="ginger-floatingG-bar-tool ginger-floatingG-bar-tool-rephrase ginger-floatingG-bar-tool-rephrase_big-circle">
						<ga class="ginger-floatingG-bar-tool-rephrase__btn" id="ginger__floatingG-bar-tool-rephrase__btn">Rephrase</ga>
						<gdiv class="ginger-floatingG-bar-tool-tooltip ginger-floatingG-bar-tool-tooltip_rephrase">
							Rephrase current sentence</gdiv>
					</gdiv>
					<gdiv class="ginger-floatingG-bar-tool ginger-floatingG-bar-tool-mistakes">
						<ga><span class="ginger-floatingG-bar-tool-mistakes-count"></span></ga>
						<gdiv class="ginger-floatingG-bar-tool-tooltip">Edit in Ginger</gdiv>
					</gdiv>
				</gdiv>
			</gdiv>
			<gdiv class="ginger-floatingG-contentPopup">
				<gdiv class="ginger-floatingG-contentPopup-wrap">
					<ga class="ginger-floatingG-contentPopup-close">×</ga>
					<gdiv class="ginger-floatingG-contentPopup-frame"><iframe scrolling="no" src="./WorkWise Html Template_files/saved_resource.html"></iframe></gdiv>
				</gdiv>
			</gdiv>
		</gdiv>
	</gdiv>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.js"></script>
</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>