<?php
    session_start();
    $user = $_SESSION['user'];
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $sql = "SELECT * FROM users WHERE id = '$user'";
    $result = $con->query($sql);
    $pro_pic = "";
    $d_name = "";
    $b_io = "";
    while($rows = mysqli_fetch_array($result)){
        extract($rows);
        $pro_pic.= $profile_pic;
        $d_name.= $name;
        $b_io.= $bio;
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Home</title>
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

<body data-new-gr-c-s-check-loaded="14.1073.0" data-gr-ext-installed="">
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
                                <a href="#" title="">
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
        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                                <div class="main-left-sidebar no-margin">
                                    <div class="user-data full-width">
                                        <div class="user-profile">
                                            <div class="username-dt">
                                                <div class="usr-pic">
                                                    <img src="./images/pro_pic/<?php echo $pro_pic?>" alt="">
                                                </div>
                                            </div>
                                            <div class="user-specs">
                                                <h3><?php echo $d_name?></h3>
                                                <span><?php echo $b_io ?></span>
                                            </div>
                                        </div>
                                        <ul class="user-fw-status">
                                            <li>
                                                <h4>Following</h4>
                                                <span>34</span>
                                            </li>
                                            <li>
                                                <h4>Followers</h4>
                                                <span>155</span>
                                            </li>
                                            <li>
                                                <a href="profile.php"
                                                    title="">View Profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 no-pd">
                                <div class="main-ws-sec">
                                    <div class="post-topbar">
                                        <div class="user-picy">
                                            <img src="./images/pro_pic/<?php echo $pro_pic?>" alt="" style="border-radius:50%;">
                                        </div>
                                        <div class="post-st">
                                            <ul>
                                                <li><a class="post-jb active"
                                                        href="#"
                                                        title="">What's on your mind?</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="posts-section">
                                        <div class="posty">
                                            <div class="post-bar no-margin">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="./homepage_files/us-pc2.png" alt="">
                                                        <div class="usy-name">
                                                            <h3>John Doe</h3>
                                                            <span><img src="./homepage_files/clock.png" alt="">3 min
                                                                ago</span>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="job_descp mt-2">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                                                        luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id
                                                        magna sit amet... 
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div class="post-popup job_post">
            <div class="post-project">
                <h3>What's on your mind?</h3>
                <div class="post-project-fields">
                    <form method="POST">
                        <div class="row">
                            <!-- <div class="col-lg-12">
                                <input type="text" name="title" placeholder="Title">
                            </div> -->
                            <!-- <div class="col-lg-12">
                                <div class="inp-field">
                                    <select>
                                        <option>Category</option>
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                        <option>Category 3</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="col-lg-12">
                                <input type="text" name="skills" placeholder="Skills">
                            </div> -->
                            <!-- <div class="col-lg-6">
                                <div class="price-br">
                                    <input type="text" name="price1" placeholder="Price">
                                    <i class="la la-dollar"></i>
                                </div>
                            </div> -->
                            <!-- <div class="col-lg-6">
                                <div class="inp-field">
                                    <select>
                                        <option>Full Time</option>
                                        <option>Half time</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-lg-12">
                                <textarea name="description" placeholder="Write something"></textarea>
                            </div>
                            <div class="col-lg-6">
                            <select class="custom-select custom-select-sm">
                                <option selected disabled>Privacy Option</option>
                                <option value="1">Public</option>
                                <option value="2">Followers</option>
                                <option value="3">Only me</option>
                            </select>
                            </div>
                            <div class="col-lg-12">
                                <ul>
                                    <li><button class="active" type="submit" value="post" name="post_btn">Post</button></li>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['post_btn'])){
                            $post_text = $_POST['description'];
                            $post_insertion = "INSERT INTO `post`(`user`, `post_text`) VALUES ('$user','$post_text')";
                            $con->query($post_insertion);
                            header("location: home.php");

                        }
                    ?>
                </div>
                <a href="#" title=""><i class="fa fa-times" aria-hidden="true"></i></a>
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