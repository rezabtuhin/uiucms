<?php
session_start();
$user = $_SESSION['user'];
$con = mysqli_connect("localhost", "root", "", "uiucms");
$sql = "SELECT * FROM users WHERE id = '$user'";
$result = $con->query($sql);
$pro_pic = "";
$d_name = "";
$b_io = "";
while ($rows = mysqli_fetch_array($result)) {
    extract($rows);
    $pro_pic .= $profile_pic;
    $d_name .= $name;
    $b_io .= $bio;
}
function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
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
                        <a href="#" title=""><img src="./images/cms_logo.png" alt="" width=32></a>
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
                                <a href="#" title="" class="not-box-openm">
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
                                                <h3><a href="https://gambolthemes.net/workwise-new/messages.html" title="">Jassica William</a> </h3>
                                                <p>Lorem ipsum dolor sit amet.</p>
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
                                <a href="#" title="" class="not-box-open">
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
                                                <h3><a href="https://gambolthemes.net/workwise-new/index.html#" title="">Jassica William</a> Comment on your project.</h3>
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
                        <a href="#" title=""><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="user-account">
                        <div class="user-info">
                            <img src="./images/pro_pic/<?php echo $pro_pic ?>" alt="" width=30 height=30>
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
                                <li><a href="#" title="">Account Setting</a></li>
                                <li><a href="#" title="">Faqs</a></li>
                                <li><a href="#" title="">Terms &amp;
                                        Conditions</a></li>
                            </ul>
                            <h3 class="tc"><a href="logout.php" title="">Logout</a></h3>
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
                                                    <img src="./images/pro_pic/<?php echo $pro_pic ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="user-specs">
                                                <h3><?php echo $d_name ?></h3>
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
                                                <?php if ($_SESSION['role'] == 'dsa') { ?>
                                                    <a href="dsa_profile.php" title="">View Profile</a>
                                                <?php } ?>
                                                <?php if ($_SESSION['role'] == 'club') { ?>
                                                    <a href="club_profile.php" title="">View Profile</a>
                                                <?php } ?>
                                                <?php if ($_SESSION['role'] == 'user') { ?>
                                                    <a href="user_profile.php" title="">View Profile</a>
                                                <?php } ?>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 no-pd">
                                <div class="main-ws-sec">
                                    <div class="post-topbar">
                                        <div class="user-picy">
                                            <img src="./images/pro_pic/<?php echo $pro_pic ?>" alt="" style="border-radius:50%;">
                                        </div>
                                        <div class="post-st">
                                            <ul>
                                                <li><a class="post-jb active" href="#" title="">What's on your mind?</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="posts-section">
                                        <div class="posty">

                                            <?php $sql = "SELECT * FROM post p JOIN users u ON p.user = u.id ORDER BY time DESC";
                                            $res = mysqli_query($con, $sql);
                                            if (mysqli_num_rows($res) > 0) {
                                                while ($rows = mysqli_fetch_assoc($res)) { ?>

                                                    <div class="post-bar no-margin">
                                                        <div class="post_topbar">
                                                            <div class="usy-dt">
                                                                <img src="./images/pro_pic/<?php echo $rows['profile_pic'] ?>" width="40px" height="40px" alt="">
                                                                <div class="usy-name">
                                                                    <h3><?php echo $rows["name"]; ?></h3>
                                                                    <span><img src="./homepage_files/clock.png" alt="">
                                                                        <?php
                                                                        echo time_elapsed_string("{$rows['time']}", true);
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="job_descp mt-2">
                                                            <p><?php echo $rows["post_text"]; ?>
                                                        </div>
                                                        <div class="job-status-bar">
                                                            <ul class="like-com">
                                                                <li>
                                                                    <a class="com" href="#"><i class="fas fa-heart"></i> Like</a>
                                                                </li>
                                                                <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment
                                                                        15</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="comment-section">

                                                        <?php
                                                        $comment_query = mysqli_query($con, "SELECT * ,UNIX_TIMESTAMP() - date_posted 
																		AS TimeSpent FROM comment LEFT JOIN users on users.id = comment.user_id_login 
																		where post_id = '{$rows['post_id']}'") or die(mysqli_error($con));
                                                        while ($comment_row = mysqli_fetch_array($comment_query)) {
                                                            $comment_id = $comment_row['comment_id'];
                                                            $comment_by = $comment_row['name'];
                                                        ?>
                                                            <div class="comment-sec">
                                                                <ul>
                                                                    <li>
                                                                        <div class="comment-list">
                                                                            <div class="bg-img">
                                                                                <img src="./homepage_files/bg-img1.png" alt="">
                                                                            </div>
                                                                            <div class="comment">
                                                                                <h3><?php echo $comment_by; ?></h3>
                                                                                <span><img src="./homepage_files/clock.png" alt="">
                                                                                    <?php
                                                                                    echo $comment_row['date_posted'];
                                                                                    ?>

                                                                                </span>
                                                                                <p><?php echo $comment_row['content']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="post-comment">
                                                            <div class="comment_box">
                                                                <?php
                                                                if (isset($_POST['comment'])) {
                                                                    $comment_content = $_POST['comment_content'];
                                                                    $user_id = $_POST['id'];
                                                                    //INSERT INTO `comment` (`com_id`, `content`, `user_id_login`, `post_id`, `date_posted`)
                                                                    // VALUES (NULL, 'test c', '011191117', '11', '');
                                                                    // $for_post_id = mysqli_query($con, "SELECT * FROM post;") or die(mysqli_error($con));
                                                                    // $need_post_id = mysqli_fetch_array($for_post_id);
                                                                    // $show_post_id = $need_post_id['post_id'];
                                                                    // INSERT INTO `comment` (`comment_id`, `content`, `user_id_login`, `post_id`, `date_posted`) VALUES (NULL, 'test', '11191117', '13', current_timestamp());
                                                                    //WHERE (SELECT post_id FROM post WHERE post_id = '{$rows['post_id']}')

                                                                    mysqli_query($con, "insert into comment (content,user_id_login,post_id) 
																	values ('$comment_content','$user','{$rows['post_id']}')")
                                                                        or die(mysqli_error($con));
                                                                ?>
                                                                    <script>
                                                                        window.location.href = "home.php";
                                                                    </script>
                                                                <?php
                                                                }
                                                                ?>
                                                                <hr>
                                                                <form method="post">
                                                                    <input type="text" placeholder="Post a comment" name="comment_content">
                                                                    <button type="submit" name="comment">Send</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>


                                            <?php }
                                            } ?>
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
                    <form action="" method="POST">
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
                                <select class="custom-select custom-select-sm" name="privacy">
                                    <option selected disabled>Privacy Option</option>
                                    <option value="Public">Public</option>
                                    <option value="Followers">Followers</option>
                                    <option value="Only me">Only me</option>
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
                    if (isset($_POST['post_btn'])) {
                        $post_text = $_POST['description'];
                        $privacy = $_POST['privacy'];
                        $post_insertion = "INSERT INTO `post`(`user`, `post_text`,`privacy`) VALUES ('$user','$post_text','$privacy')";
                        $con->query($post_insertion);
                        // header("location: home.php");
                    ?>
                        <script>
                            window.location.href = "home.php";
                        </script>
                    <?php

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