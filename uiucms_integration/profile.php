<?php
    session_start();
    $user = $_SESSION['user'];
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $sql = "SELECT * FROM users WHERE id = '$user'";
    $result = $con->query($sql);
    $pro_pic = "";
    $d_name = "";
    $b_io = "";
	$c_p = "";
	$f_b = "";
	$li_in = "";
	$gi_t = "";
	$p_w = "";
    while($rows = mysqli_fetch_array($result)){
        extract($rows);
        $pro_pic.= $profile_pic;
		$c_p.= $cover_pic;
        $d_name.= $name;
        $b_io.= $bio;
		$f_b.=$fb;
		$li_in.=$linked_in;
		$gi_t.=$git;
		$p_w = $personal_web;
    }

	$fol_in = 0;
	$fol_er = 0;
	$sql2 = "SELECT COUNT(follower) as total_followers FROM `followship` WHERE person =  '$user'";
	$sql3 = "SELECT COUNT(person) as total_following FROM `followship` WHERE follower =  '$user'";
	$result2 = $con->query($sql2);
	$result3 = $con->query($sql3);
	while($rows = mysqli_fetch_array($result2)){
        extract($rows);
		$fol_er = $total_followers;
    }
	while($rows = mysqli_fetch_array($result3)){
        extract($rows);
		$fol_in = $total_following;
    }
?>

<!DOCTYPE html>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="./css/animate.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/line-awesome.css">
	<link rel="stylesheet" type="text/css" href="./css/line-awesome-font-awesome.min.css">
	<link href="./css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="./css/slick.css">
	<link rel="stylesheet" type="text/css" href="./css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/responsive.css">
	<script src="./js/jquery.mousewheel.min.js.download"></script>
</head>

<body data-new-gr-c-s-check-loaded="14.1074.0" data-gr-ext-installed="">
	<div class="wrapper">
	<header>
            <div class="container">
                <div class="header-data">
                    <div class="logo">
                        <a href="#" title=""><img
                                src="./images/cms_logo.png" alt="" width= 32></a>
                    </div>
                    <div class="search-bar">
                        <form>
                            <input type="text" name="search" placeholder="Search...">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    <nav>
                        <ul>
                            <li>
                                <a href="home.php" title="">
                                    <span><i class="fa fa-home" aria-hidden="true"></i></span>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#" title=""
                                    class="not-box-openm">
                                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    Messages
                                </a>
                                <div class="notification-box msg" id="message">
                                    <div class="nott-list">
                                        <div class="notfication-details">
                                            <div class="noty-user-img">
                                                <img src="./homepage_files/ny-img1.png" alt="">
                                            </div>
                                            <div class="notification-info">
                                                <h3><a href="https://gambolthemes.net/workwise-new/messages.html"
                                                        title="">Jassica William</a> </h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
                                                <span>2 min ago</span>
                                            </div>
                                        </div>
                                        <div class="view-all-nots">
                                            <a href="https://gambolthemes.net/workwise-new/messages.html" title="">View
                                                All Messsages</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" title=""
                                    class="not-box-open">
                                    <span><i class="fa fa-bell" aria-hidden="true"></i></span>
                                    Notification
                                </a>
                                <div class="notification-box noti" id="notification">
                                    <div class="nott-list">
                                        <div class="notfication-details">
                                            <div class="noty-user-img">
                                                <img src="./homepage_files/ny-img1.png" alt="">
                                            </div>
                                            <div class="notification-info">
                                                <h3><a href="https://gambolthemes.net/workwise-new/index.html#"
                                                        title="">Jassica William</a> Comment on your project.</h3>
                                                <span>2 min ago</span>
                                            </div>
                                        </div>
                                        <div class="view-all-nots">
                                            <a href="https://gambolthemes.net/workwise-new/index.html#" title="">View
                                                All Notification</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <div class="menu-btn">
                        <a href="#" title=""><i
                                class="fa fa-bars"></i></a>
                    </div>
                    <div class="user-account">
                        <div class="user-info">
                            <img src="./images/pro_pic/<?php echo $pro_pic?>" alt="" width = 30 height = 30>
                            <i class="fa fa-sort" aria-hidden="true"></i>
                        </div>
                        <div class="user-account-settingss" id="users">
                            <h3>Custom Status</h3>
                            <div class="search_form">
                                <form>
                                    <input type="text" name="search">
                                    <button type="submit">Ok</button>
                                </form>
                            </div>
                            <h3>Setting</h3>
                            <ul class="us-links">
                                <li><a href="#"
                                        title="">Account Setting</a></li>
                                <li><a href="#" title="">Faqs</a></li>
                                <li><a href="#" title="">Terms &amp;
                                        Conditions</a></li>
                            </ul>
                            <h3 class="tc"><a href="logout.php"
                                    title="">Logout</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </header>
		<section class="cover-sec">
			<img src="./images/cover_pic/<?php echo $c_p ?>" alt="">
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
											<img src="./images/pro_pic/<?php echo $pro_pic ?>" alt="" stylle="border-radius: 50%;">
										</div>
										<div class="user_pro_status">
											<ul class="flw-status">
												<li>
													<span>Following</span>
													<b><?php echo $fol_in ?></b>
												</li>
												<li>
													<span>Followers</span>
													<b><?php echo $fol_er ?></b>
												</li>
											</ul>
										</div>
										<ul class="social_links">
											<?php
												if($f_b != null){
													?>
													<li><a href="<?php echo $f_b ?>"
													title="" class="pb-1"><i class="fab fa-facebook" style="color: 	#4267B2;"></i> Facebook</a></li>
													<?php
												}
											?>
											<?php
												if($li_in != null){
													?>
													<li><a href="<?php echo $li_in ?>"
													title="" class="pb-1"><i class="fab fa-linkedin" style="color: #0072b1;"></i>Linked In</a></li>
													<?php
												}
											?>
											<?php
												if($gi_t != null){
													?>
													<li><a href="<?php echo $gi_t ?>"
													title="" class="pb-1"><i class="fab fa-github" style="color: black;"></i> Github</a></li>
													<?php
												}
											?>
											<?php
												if($p_w != null){
													?>
													<li><a href="<?php echo $p_w ?>"
													title="" class="pb-1"><i class="fas fa-globe" style="color: orange;"></i>Personal Website</a></li>
													<?php
												}
											?>
										</ul>
									</div>
								</div>
								<!-- <div class="right-sidebar">
									<div class="message-btn">
										<a href="#"
											title=""><i class="fas fa-cog"></i> Setting</a>
									</div>
								</div> -->
							</div>
							<div class="col-lg-9 col-md-8 no-pd">
								<div class="main-ws-sec">
									<div class="user-tab-sec rewivew">
										<h3><?php echo $d_name ?> <a href="settings.php"><i class="fas fa-edit"></i></a></h3> 
										<div class="star-descp">
											<span><?php echo $b_io ?></span>
										</div>
										<div class="tab-feed st2 settingjb">
											<ul>
												<li data-tab="feed-dd" class="active">
													<a href="#"
														title="" style="color:#b2b2b2;">
														<i class="fa fa-rss mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>Feed</span>
													</a>
												</li>
												<li data-tab="info-dd">
													<a href="#"
														title="" style="color:#b2b2b2;">
														<i class="fa fa-cubes mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>Clubs</span>
													</a>
												</li>
												<li data-tab="saved-jobs">
													<a href="#"
														title="" style="color:#b2b2b2;">
														<i class="fa fa-calendar mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>Events</span>
													</a>
												</li>
												<li data-tab="my-bids">
													<a href="#"
														title="" style="color:#b2b2b2;">
														<i class="fa fa-users mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>Followers</span>
													</a>
												</li>
												<li data-tab="portfolio-dd">
													<a href="#"
														title="" style="color:#b2b2b2;">
														<i class="fa fa-user-plus mb-2" aria-hidden="true" style="font-size:23px;"></i>
														<span>Following</span>
													</a>
												</li>


												<!-- <li data-tab="rewivewdata">
													<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">
														<img src="./profile_files/review.png" alt="">
														<span>Reviews</span>
													</a>
												</li>
												<li data-tab="payment-dd">
													<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">
														<img src="./profile_files/ic6.png" alt="">
														<span>Payment</span>
													</a>
												</li> -->
											</ul>
										</div>
									</div>
									<div class="product-feed-tab" id="saved-jobs">
										<ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="mange-tab" data-toggle="tab"
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#mange"
													role="tab" aria-controls="home" aria-selected="true">Manage Jobs</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="saved-tab" data-toggle="tab"
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#saved"
													role="tab" aria-controls="profile" aria-selected="false">Saved
													Jobs</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="contact-tab" data-toggle="tab"
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#applied"
													role="tab" aria-controls="applied" aria-selected="false">Applied
													Jobs</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="cadidates-tab" data-toggle="tab"
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#cadidates"
													role="tab" aria-controls="contact" aria-selected="false">Applied
													cadidates</a>
											</li>
										</ul>
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="mange" role="tabpanel"
												aria-labelledby="mange-tab">
												<div class="posts-bar">
													<div class="post-bar bgclr">
														<div class="wordpressdevlp">
															<h2>Senior Wordpress Developer</h2>
															<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
														</div>
														<br>
														<div class="row no-gutters">
															<div class="col-md-6 col-sm-12">
																<div class="cadidatesbtn">
																	<button type="button" class="btn btn-primary">
																		<span
																			class="badge badge-light">3</span>Candidates
																	</button>
																	<a
																		href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																		<i class="far fa-edit"></i>
																	</a>
																	<a
																		href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																		<i class="far fa-trash-alt"></i>
																	</a>
																</div>
															</div>
															<div class="col-md-6 col-sm-12">
																<ul class="bk-links bklink">
																	<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																			title=""><i class="la la-bookmark"></i></a>
																	</li>
																	<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																			title=""><i class="la la-envelope"></i></a>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="posts-bar">
													<div class="post-bar bgclr">
														<div class="wordpressdevlp">
															<h2>Senior Php Developer</h2>
															<p><i class="la la-clock-o"></i> Posted on 29 August 2018
															</p>
														</div>
														<br>
														<div class="row no-gutters">
															<div class="col-md-6 col-sm-12">
																<div class="cadidatesbtn">
																	<button type="button" class="btn btn-primary">
																		<span
																			class="badge badge-light">3</span>Candidates
																	</button>
																	<a
																		href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																		<i class="far fa-edit"></i>
																	</a>
																	<a
																		href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																		<i class="far fa-trash-alt"></i>
																	</a>
																</div>
															</div>
															<div class="col-md-6 col-sm-12">
																<ul class="bk-links bklink">
																	<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																			title=""><i class="la la-bookmark"></i></a>
																	</li>
																	<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																			title=""><i class="la la-envelope"></i></a>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="posts-bar">
													<div class="post-bar bgclr">
														<div class="wordpressdevlp">
															<h2>Senior UI UX Designer</h2>
															<div class="row no-gutters">
																<div class="col-md-6 col-sm-12">
																	<p class="posttext"><i
																			class="la la-clock-o"></i>Posted on 5 June
																		2018</p>
																</div>
																<div class="col-md-6 col-sm-12">
																	<p><i class="la la-clock-o"></i>Expiried on 5
																		October 2018</p>
																</div>
															</div>
														</div>
														<br>
														<div class="row no-gutters">
															<div class="col-md-6 col-sm-12">
																<div class="cadidatesbtn">
																	<button type="button" class="btn btn-primary">
																		<span
																			class="badge badge-light">3</span>Candidates
																	</button>
																	<a
																		href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																		<i class="far fa-trash-alt"></i>
																	</a>
																</div>
															</div>
															<div class="col-md-6 col-sm-12">
																<ul class="bk-links bklink">
																	<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																			title=""><i class="la la-bookmark"></i></a>
																	</li>
																	<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																			title=""><i class="la la-envelope"></i></a>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="saved" role="tabpanel"
												aria-labelledby="saved-tab">
												<div class="post-bar">
													<div class="p-all saved-post">
														<div class="usy-dt">
															<div class="wordpressdevlp">
																<h2>Senior Wordpress Developer</h2>
																<p><i class="la la-clock-o"></i>Posted on 30 August 2018
																</p>
															</div>
														</div>
														<div class="ed-opts">
															<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																title="" class="ed-opts-open"><i
																	class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Edit Post</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unsaved</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unbid</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Close</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Hide</a></li>
															</ul>
														</div>
													</div>
													<ul class="savedjob-info saved-info">
														<li>
															<h3>Applicants</h3>
															<p>10</p>
														</li>
														<li>
															<h3>Job Type</h3>
															<p>Full Time</p>
														</li>
														<li>
															<h3>Salary</h3>
															<p>$600 - Mannual</p>
														</li>
														<li>
															<h3>Posted : 5 Days Ago</h3>
															<p>Open</p>
														</li>
														<div class="devepbtn saved-btn">
															<a class="clrbtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Unsaved</a>
															<a class="clrbtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Message</a>
														</div>
													</ul>
												</div>
												<div class="post-bar">
													<div class="p-all saved-post">
														<div class="usy-dt">
															<div class="wordpressdevlp">
																<h2>Senior PHP Developer</h2>
																<p><i class="la la-clock-o"></i>Posted on 30 August 2018
																</p>
															</div>
														</div>
														<div class="ed-opts">
															<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																title="" class="ed-opts-open"><i
																	class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Edit Post</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unsaved</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unbid</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Close</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Hide</a></li>
															</ul>
														</div>
													</div>
													<ul class="savedjob-info saved-info">
														<li>
															<h3>Applicants</h3>
															<p>10</p>
														</li>
														<li>
															<h3>Job Type</h3>
															<p>Full Time</p>
														</li>
														<li>
															<h3>Salary</h3>
															<p>$600 - Mannual</p>
														</li>
														<li>
															<h3>Posted : 5 Days Ago</h3>
															<p>Open</p>
														</li>
														<div class="devepbtn saved-btn">
															<a class="clrbtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Unsaved</a>
															<a class="clrbtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Message</a>
														</div>
													</ul>
												</div>
												<div class="post-bar">
													<div class="p-all saved-post">
														<div class="usy-dt">
															<div class="wordpressdevlp">
																<h2>UI UX Designer</h2>
																<p><i class="la la-clock-o"></i>Posted on 30 August 2018
																</p>
															</div>
														</div>
														<div class="ed-opts">
															<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																title="" class="ed-opts-open"><i
																	class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Edit Post</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unsaved</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unbid</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Close</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Hide</a></li>
															</ul>
														</div>
													</div>
													<ul class="savedjob-info saved-info">
														<li>
															<h3>Applicants</h3>
															<p>10</p>
														</li>
														<li>
															<h3>Job Type</h3>
															<p>Full Time</p>
														</li>
														<li>
															<h3>Salary</h3>
															<p>$600 - Mannual</p>
														</li>
														<li>
															<h3>Posted : 5 Days Ago</h3>
															<p>Open</p>
														</li>
														<div class="devepbtn saved-btn">
															<a class="clrbtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Unsaved</a>
															<a class="clrbtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Message</a>
														</div>
													</ul>
												</div>
											</div>
											<div class="tab-pane fade" id="applied" role="tabpanel"
												aria-labelledby="applied-tab">
												<div class="post-bar">
													<div class="p-all saved-post">
														<div class="usy-dt">
															<div class="wordpressdevlp">
																<h2>Senior Wordpress Developer</h2>
																<p><i class="la la-clock-o"></i>Posted on 30 August 2018
																</p>
															</div>
														</div>
														<div class="ed-opts">
															<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																title="" class="ed-opts-open"><i
																	class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Edit Post</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unsaved</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unbid</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Close</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Hide</a></li>
															</ul>
														</div>
													</div>
													<ul class="savedjob-info saved-info">
														<li>
															<h3>Applicants</h3>
															<p>10</p>
														</li>
														<li>
															<h3>Job Type</h3>
															<p>Full Time</p>
														</li>
														<li>
															<h3>Salary</h3>
															<p>$600 - Mannual</p>
														</li>
														<li>
															<h3>Posted : 5 Days Ago</h3>
															<p>Open</p>
														</li>
														<div class="devepbtn saved-btn">
															<a class="clrbtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Applied</a>
															<a class="clrbtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Message</a>
															<a
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																<i class="far fa-trash-alt"></i>
															</a>
														</div>
													</ul>
												</div>
												<div class="post-bar">
													<div class="p-all saved-post">
														<div class="usy-dt">
															<div class="wordpressdevlp">
																<h2>Senior PHP Developer</h2>
																<p><i class="la la-clock-o"></i>Posted on 30 August 2018
																</p>
															</div>
														</div>
														<div class="ed-opts">
															<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																title="" class="ed-opts-open"><i
																	class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Edit Post</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unsaved</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unbid</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Close</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Hide</a></li>
															</ul>
														</div>
													</div>
													<ul class="savedjob-info saved-info">
														<li>
															<h3>Applicants</h3>
															<p>10</p>
														</li>
														<li>
															<h3>Job Type</h3>
															<p>Full Time</p>
														</li>
														<li>
															<h3>Salary</h3>
															<p>$600 - Mannual</p>
														</li>
														<li>
															<h3>Posted : 5 Days Ago</h3>
															<p>Open</p>
														</li>
														<div class="devepbtn saved-btn">
															<a class="clrbtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Applied</a>
															<a class="clrbtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Message</a>
															<a
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																<i class="far fa-trash-alt"></i>
															</a>
														</div>
													</ul>
												</div>
												<div class="post-bar">
													<div class="p-all saved-post">
														<div class="usy-dt">
															<div class="wordpressdevlp">
																<h2>UI UX Designer</h2>
																<p><i class="la la-clock-o"></i>Posted on 30 August 2018
																</p>
															</div>
														</div>
														<div class="ed-opts">
															<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																title="" class="ed-opts-open"><i
																	class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Edit Post</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unsaved</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unbid</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Close</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Hide</a></li>
															</ul>
														</div>
													</div>
													<ul class="savedjob-info saved-info">
														<li>
															<h3>Applicants</h3>
															<p>10</p>
														</li>
														<li>
															<h3>Job Type</h3>
															<p>Full Time</p>
														</li>
														<li>
															<h3>Salary</h3>
															<p>$600 - Mannual</p>
														</li>
														<li>
															<h3>Posted : 5 Days Ago</h3>
															<p>Open</p>
														</li>
														<div class="devepbtn saved-btn">
															<a class="clrbtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Applied</a>
															<a class="clrbtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Message</a>
															<a
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																<i class="far fa-trash-alt"></i>
															</a>
														</div>
													</ul>
												</div>
											</div>
											<div class="tab-pane fade" id="cadidates" role="tabpanel"
												aria-labelledby="cadidates-tab">
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="./profile_files/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="./profile_files/icon8.png"
																				alt=""><span>Epic Coder</span></li>
																		<li><img src="./profile_files/icon9.png"
																				alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																title="" class="ed-opts-open"><i
																	class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Edit Post</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Accept</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unbid</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Close</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn"
																	href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Accept</a>
																<a class="clrbtn"
																	href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">View
																	Profile</a>
																<a class="clrbtn"
																	href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Message</a>
																<a
																	href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																	<i class="far fa-trash-alt"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
												<div class="post-bar">
													<div class="post_topbar  applied-post">
														<div class="usy-dt">
															<img src="./profile_files/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="./profile_files/icon8.png"
																				alt=""><span>Epic Coder</span></li>
																		<li><img src="./profile_files/icon9.png"
																				alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																title="" class="ed-opts-open"><i
																	class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Edit Post</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Accept</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unbid</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Close</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															<div class="star-descp review profilecnd">
																<ul class="bklik">
																	<li><i class="fa fa-star"></i></li>
																	<li><i class="fa fa-star"></i></li>
																	<li><i class="fa fa-star"></i></li>
																	<li><i class="fa fa-star"></i></li>
																	<li><i class="fa fa-star-half-o"></i></li>
																	<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">5.0 of 5 Reviews</a>
																</ul>
															</div>
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn"
																	href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Accept</a>
																<a class="clrbtn"
																	href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">View
																	Profile</a>
																<a class="clrbtn"
																	href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Message</a>
																<a
																	href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																	<i class="far fa-trash-alt"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
												<div class="post-bar">
													<div class="post_topbar applied-post">
														<div class="usy-dt">
															<img src="./profile_files/us-pic.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<ul class="descp descptab bklink">
																		<li><img src="./profile_files/icon8.png"
																				alt=""><span>Epic Coder</span></li>
																		<li><img src="./profile_files/icon9.png"
																				alt=""><span>India</span></li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="ed-opts">
															<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																title="" class="ed-opts-open"><i
																	class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Edit Post</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Accept</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Unbid</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Close</a></li>
																<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">Hide</a></li>
															</ul>
														</div>
														<div class="job_descp noborder">
															<div class="star-descp review profilecnd">
																<ul class="bklik">
																	<li><i class="fa fa-star"></i></li>
																	<li><i class="fa fa-star"></i></li>
																	<li><i class="fa fa-star"></i></li>
																	<li><i class="fa fa-star"></i></li>
																	<li><i class="fa fa-star-half-o"></i></li>
																	<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																		title="">5.0 of 5 Reviews</a>
																</ul>
															</div>
															<div class="devepbtn appliedinfo noreply">
																<a class="clrbtn"
																	href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Accept</a>
																<a class="clrbtn"
																	href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">View
																	Profile</a>
																<a class="clrbtn"
																	href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Message</a>
																<a
																	href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">
																	<i class="far fa-trash-alt"></i>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="product-feed-tab current" id="feed-dd">
									
										<?php
											$sql_own_post = "SELECT * from post WHERE user = '$user'";
											$result_own_post = $con->query($sql_own_post);
											while($rows = mysqli_fetch_array($result_own_post)){
												extract($rows);
												?>
												<div class="posts-section mb-4">
												<div class="posty">
													<div class="post-bar no-margin">
														<div class="post_topbar">
															<div class="usy-dt">
																<img src="./images/pro_pic/<?php echo $pro_pic ?>" alt="" width = 45>
																<div class="usy-name">
																	<h3><?php echo $name ?></h3>
																	<span><img src="./homepage_files/clock.png" alt=""><?php echo $time ?></span>
																</div>
															</div>
															<div class="ed-opts">
																<a href="#"
																	title="" class="ed-opts-open"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
																<ul class="ed-options">
																	<li><a href="#"
																			title="">Edit Post</a></li>
																	<li><a href="#"
																			title="">Hide</a></li>
																</ul>
															</div>
															
														</div>
														<div class="job_descp mt-2 mb-3">
															<p?><?php echo $post_text ?></p> 
														</div>
														<div class="job-status-bar">
															<ul class="like-com">
																<li>
																	<a class="com" href="#"><i
																			class="fas fa-heart"></i> Like</a>
																</li>
																<li><a href="#"
																		class="com"><i class="fas fa-comment-alt"></i> Comment
																		15</a></li>
															</ul>
														</div>
													</div>
													<div class="comment-section">
														<div class="comment-sec">
															<ul>
																<li>
																	<div class="comment-list">
																		<div class="bg-img">
																			<img src="./homepage_files/bg-img1.png" alt="">
																		</div>
																		<div class="comment">
																			<h3>John Doe</h3>
																			<span><img src="./homepage_files/clock.png" alt="">
																				3 min ago</span>
																			<p>Lorem ipsum dolor sit amet, </p>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="comment-list">
																		<div class="bg-img">
																			<img src="./homepage_files/bg-img3.png" alt="">
																		</div>
																		<div class="comment">
																			<h3>John Doe</h3>
																			<span><img src="./homepage_files/clock.png" alt="">
																				3 min ago</span>
																			<p>Lorem ipsum dolor sit amet, consectetur
																				adipiscing elit. Aliquam luctus hendrerit metus,
																				ut ullamcorper quam finibus at.</p>
																		</div>
																	</div>
																</li>
															</ul>
														</div>
														<div class="post-comment">
															<div class="cm_img">
																<img src="./homepage_files/bg-img4.png" alt="">
															</div>
															<div class="comment_box">
																<form>
																	<input type="text" placeholder="Post a comment">
																	<button type="submit">Send</button>
																</form>
															</div>
														</div>
													</div>
												</div>
												</div>
												<?php
											} 
										?>
                                    
									</div>
									<div class="product-feed-tab" id="my-bids">
										<div class="row  bg-white">
											<?php
												$sql4 = "SELECT `follower` FROM `followship` WHERE person = '$user'";
												$result4 = $con->query($sql4);
												if(mysqli_num_rows($result4)>0){
													while($rows = mysqli_fetch_array($result4)){
														extract($rows);
														$sql5 = "SELECT `name`,`profile_pic` FROM `users` WHERE id = '$follower'";
														$result5 = $con->query($sql5);
														while($rows2 = mysqli_fetch_array($result5)){
															extract($rows2);
															?>
															<div class="col col-lg-6 my-1">
																<div class="mt-3 mb-3 d-flex align-items-center">
																	<img src="./images/pro_pic/<?php echo $profile_pic ?>" alt="" width =100 style="border-radius: 20%;" class="mr-3">
																	<a href=""> <strong><h3 class="ms-2"><?php echo $name ?></h3></strong> </a>
																</div>
															</div>
															<?php
														}
													}
												}
												
											?>
											
										</div>
									</div>
									<div class="product-feed-tab" id="info-dd">
										<div class="user-profile-ov">
											<h3><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title="" class="overview-open">Overview</a> <a
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
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
											<h3><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title="" class="exp-bx-open">Experience </a><a
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title="" class="exp-bx-open"><i class="fa fa-pencil"></i></a> <a
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title="" class="exp-bx-open"><i class="fa fa-plus-square"></i></a>
											</h3>
											<h4>Web designer <a
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title=""><i class="fa fa-pencil"></i></a></h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor
												aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue
												nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo
												viverra. </p>
											<h4>UI / UX Designer <a
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title=""><i class="fa fa-pencil"></i></a></h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor
												aliquam felis, nec condimentum ipsum commodo id.</p>
											<h4>PHP developer <a
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title=""><i class="fa fa-pencil"></i></a></h4>
											<p class="no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing
												elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id.
												Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur
												aliquam lectus commodo viverra. </p>
										</div>
										<div class="user-profile-ov">
											<h3><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title="" class="ed-box-open">Education</a> <a
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title="" class="ed-box-open"><i class="fa fa-pencil"></i></a> <a
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title=""><i class="fa fa-plus-square"></i></a></h3>
											<h4>Master of Computer Science</h4>
											<span>2015 - 2018</span>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor
												aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue
												nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo
												viverra. </p>
										</div>
										<div class="user-profile-ov">
											<h3><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title="" class="lct-box-open">Location</a> <a
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title="" class="lct-box-open"><i class="fa fa-pencil"></i></a> <a
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title=""><i class="fa fa-plus-square"></i></a></h3>
											<h4>India</h4>
											<p>151/4 BT Chownk, Delhi </p>
										</div>
										<div class="user-profile-ov">
											<h3><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title="" class="skills-open">Skills</a> <a
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title="" class="skills-open"><i class="fa fa-pencil"></i></a> <a
													href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"><i
														class="fa fa-plus-square"></i></a></h3>
											<ul>
												<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">HTML</a></li>
												<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">PHP</a></li>
												<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">CSS</a></li>
												<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">Javascript</a></li>
												<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">Wordpress</a></li>
												<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">Photoshop</a></li>
												<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">Illustrator</a></li>
												<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">Corel Draw</a></li>
											</ul>
										</div>
									</div>
									<div class="product-feed-tab" id="rewivewdata">
										<section></section>
										<div class="posts-section">
											<div class="post-bar reviewtitle">
												<h2>Reviews</h2>
											</div>
											<div class="post-bar ">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="./profile_files/bg-img3.png" alt="">
														<div class="usy-name">
															<h3>Rock William</h3>
															<div class="epi-sec epi2">
																<ul class="descp review-lt">
																	<li><img src="./profile_files/icon8.png"
																			alt=""><span>Epic Coder</span></li>
																	<li><img src="./profile_files/icon9.png"
																			alt=""><span>India</span></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="job_descp mngdetl">
													<div class="star-descp review">
														<ul>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star-half-o"></i></li>
														</ul>
														<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
															title="">5.0 of 5 Reviews</a>
													</div>
													<div class="reviewtext">
														<p>Lorem ipsum dolor sit amet, adipiscing elit. Nulla luctus mi
															et porttitor ultrices</p>
														<hr>
													</div>
													<div class="post_topbar post-reply">
														<div class="usy-dt">
															<img src="./profile_files/bg-img4.png" alt="">
															<div class="usy-name">
																<h3>John Doe</h3>
																<div class="epi-sec epi2">
																	<p><i class="la la-clock-o"></i>3 min ago</p>
																	<p class="tahnks">Thanks :)</p>
																</div>
															</div>
														</div>
													</div>
													<div class="post_topbar rep-post rep-thanks">
														<hr>
														<div class="usy-dt">
															<img src="./profile_files/bg-img4.png" alt="">
															<input class="reply" type="text" placeholder="Reply">
															<a class="replybtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Send</a>
														</div>
													</div>
												</div>
											</div>
											<div class="post-bar post-thanks">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="./profile_files/bg-img1.png" alt="">
														<div class="usy-name">
															<h3>Jassica William</h3>
															<div class="epi-sec epi2">
																<ul class="descp review-lt">
																	<li><img src="./profile_files/icon8.png"
																			alt=""><span>Epic Coder</span></li>
																	<li><img src="./profile_files/icon9.png"
																			alt=""><span>India</span></li>
																</ul>
															</div>
														</div>
													</div>
													<div class="ed-opts">
														<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
															title="" class="ed-opts-open"><i
																class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																	title="">Edit Post</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																	title="">Unsaved</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																	title="">Unbid</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																	title="">Close</a></li>
															<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
																	title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="job_descp mngdetl">
													<div class="star-descp review">
														<ul>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star-half-o"></i></li>
														</ul>
														<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
															title="">5.0 of 5 Reviews</a><br><br>
														<p>Awesome Work, Thanks John!</p>
														<hr>
													</div>
													<div class="post_topbar rep-post">
														<div class="usy-dt">
															<img src="./profile_files/bg-img4.png" alt="">
															<input class="reply" type="text" placeholder="Reply">
															<a class="replybtn"
																href="https://gambolthemes.net/workwise-new/my-profile-feed.html#">Send</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="product-feed-tab" id="my-bids">
										<div class="posts-section">
											
											
											<div class="process-comm">
												<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title=""><img src="./profile_files/process-icon.png" alt=""></a>
											</div>
										</div>
									</div>
									<div class="product-feed-tab" id="portfolio-dd">
									<div class="row  bg-white">
											<?php
												$sql6 = "SELECT `person` FROM `followship` WHERE follower = '$user'";
												$result6 = $con->query($sql6);
												if(mysqli_num_rows($result6)>0){
													while($rows = mysqli_fetch_array($result6)){
														extract($rows);
														$sql7 = "SELECT `name`,`profile_pic` FROM `users` WHERE id = '$person'";
														$result7 = $con->query($sql7);
														while($rows2 = mysqli_fetch_array($result7)){
															extract($rows2);
															?>
															<div class="col col-lg-6 my-1">
																<div class="mt-3 mb-3 d-flex align-items-center">

																	<img src="./images/pro_pic/<?php echo $profile_pic ?>" alt="" width =100 style="border-radius: 20%;" class="mr-3">
																	<a href=""> <strong> <h3 class="ms-2"><?php echo $name ?></h3></strong></a>
																</div>
															</div>
															<?php
														}
													}
												}
												
											?>
											
										</div>
									</div>
									<div class="product-feed-tab" id="payment-dd">
										<div class="billing-method">
											<ul>
												<li>
													<h3>Add Billing Method</h3>
													<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title=""><i class="fa fa-plus-circle"></i></a>
												</li>
												<li>
													<h3>See Activity</h3>
													<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
														title="">View All</a>
												</li>
												<li>
													<h3>Total Money</h3>
													<span>$0.00</span>
												</li>
											</ul>
											<div class="lt-sec">
												<img src="./profile_files/lt-icon.png" alt="">
												<h4>All your transactions are saved here</h4>
												<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#"
													title="">Click Here</a>
											</div>
										</div>
										<div class="add-billing-method">
											<h3>Add Billing Method</h3>
											<h4><img src="./profile_files/dlr-icon.png" alt=""><span>With workwise
													payment protection , only pay for work delivered.</span></h4>
											<div class="payment_methods">
												<h4>Credit or Debit Cards</h4>
												<form>
													<div class="row">
														<div class="col-lg-12">
															<div class="cc-head">
																<h5>Card Number</h5>
																<ul>
																	<li><img src="./profile_files/cc-icon1.png" alt="">
																	</li>
																	<li><img src="./profile_files/cc-icon2.png" alt="">
																	</li>
																	<li><img src="./profile_files/cc-icon3.png" alt="">
																	</li>
																	<li><img src="./profile_files/cc-icon4.png" alt="">
																	</li>
																</ul>
															</div>
															<div class="inpt-field pd-moree">
																<input type="text" name="cc-number" placeholder="">
																<i class="fa fa-credit-card"></i>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="cc-head">
																<h5>First Name</h5>
															</div>
															<div class="inpt-field">
																<input type="text" name="f-name" placeholder="">
															</div>
														</div>
														<div class="col-lg-6">
															<div class="cc-head">
																<h5>Last Name</h5>
															</div>
															<div class="inpt-field">
																<input type="text" name="l-name" placeholder="">
															</div>
														</div>
														<div class="col-lg-6">
															<div class="cc-head">
																<h5>Expiresons</h5>
															</div>
															<div class="rowwy">
																<div class="row">
																	<div class="col-lg-6 pd-left-none no-pd">
																		<div class="inpt-field">
																			<input type="text" name="f-name"
																				placeholder="">
																		</div>
																	</div>
																	<div class="col-lg-6 pd-right-none no-pd">
																		<div class="inpt-field">
																			<input type="text" name="f-name"
																				placeholder="">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="cc-head">
																<h5>Cvv (Security Code) <i
																		class="fa fa-question-circle"></i></h5>
															</div>
															<div class="inpt-field">
																<input type="text" name="l-name" placeholder="">
															</div>
														</div>
														<div class="col-lg-12">
															<button type="submit">Continue</button>
														</div>
													</div>
												</form>
												<h4>Add Paypal Account</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="col-lg-3">
								<div class="right-sidebar">
									<div class="message-btn">
										<a href="https://gambolthemes.net/workwise-new/profile-account-setting.html"
											title=""><i class="fas fa-cog"></i> Setting</a>
									</div>
								</div>
							</div> -->
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
				<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#" title="" class="close-box"><i
						class="la la-close"></i></a>
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
				<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#" title="" class="close-box"><i
						class="la la-close"></i></a>
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
									<input type="text" name="from" placeholder="From" class="datepicker flatpickr-input"
										readonly="readonly">
									<i class="fa fa-calendar"></i>
								</div>
							</div>
							<div class="col-lg-6 no-righ-pd">
								<div class="datefm">
									<input type="text" name="to" placeholder="To" class="datepicker flatpickr-input"
										readonly="readonly">
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
				<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#" title="" class="close-box"><i
						class="la la-close"></i></a>
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
				<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#" title="" class="close-box"><i
						class="la la-close"></i></a>
			</div>
		</div>
		<div class="overview-box" id="skills-box">
			<div class="overview-edit">
				<h3>Skills</h3>
				<ul>
					<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#" title=""
							class="skl-name">HTML</a><a
							href="https://gambolthemes.net/workwise-new/my-profile-feed.html#" title=""
							class="close-skl"><i class="la la-close"></i></a></li>
					<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#" title=""
							class="skl-name">php</a><a
							href="https://gambolthemes.net/workwise-new/my-profile-feed.html#" title=""
							class="close-skl"><i class="la la-close"></i></a></li>
					<li><a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#" title=""
							class="skl-name">css</a><a
							href="https://gambolthemes.net/workwise-new/my-profile-feed.html#" title=""
							class="close-skl"><i class="la la-close"></i></a></li>
				</ul>
				<form>
					<input type="text" name="skills" placeholder="Skills">
					<button type="submit" class="save">Save</button>
					<button type="submit" class="save-add">Save &amp; Add More</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#" title="" class="close-box"><i
						class="la la-close"></i></a>
			</div>
		</div>
		<div class="overview-box" id="create-portfolio">
			<div class="overview-edit">
				<h3>Create Portfolio</h3>
				<form>
					<input type="text" name="pf-name" placeholder="Portfolio Name">
					<div class="file-submit">
						<input type="file" id="file">
						<label for="file">Choose File</label>
					</div>
					<div class="pf-img">
						<img src="./profile_files/np.png" alt="">
					</div>
					<input type="text" name="website-url" placeholder="htp://www.example.com">
					<button type="submit" class="save">Save</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="https://gambolthemes.net/workwise-new/my-profile-feed.html#" title="" class="close-box"><i
						class="la la-close"></i></a>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="./js/jquery.min.js.download"></script>
    <script type="text/javascript" src="./js/popper.js.download"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js.download"></script>
    <script type="text/javascript" src="./js/jquery.mCustomScrollbar.js.download"></script>
    <script type="text/javascript" src="./js/slick.min.js.download"></script>
    <script type="text/javascript" src="./js/scrollbar.js.download"></script>
    <script type="text/javascript" src="./js/script.js.download"></script>

</body>
</html>