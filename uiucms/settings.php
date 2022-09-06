<?php
    session_start();
    $user = $_SESSION['user'];
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $sql = "SELECT * FROM users WHERE id = '$user'";
    $result = $con->query($sql);
    $pro_pic = "";
    $d_name = "";
    $b_io = "";
    $pa_ss = "";
    while($rows = mysqli_fetch_array($result)){
        extract($rows);
        $pro_pic.= $profile_pic;
        $d_name.= $name;
        $b_io.= $bio;
        $pa_ss.= $pass;
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

<body>
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
        <section class="profile-account-setting">
            <div class="container">
                <div class="account-tabs-setting">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="acc-leftbar">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-acc-tab" data-toggle="tab"
                                        href="#nav-acc" role="tab" aria-controls="nav-acc" aria-selected="true"><i class="fas fa-cogs"></i>Profile </a>


                                    <a class="nav-item nav-link" id="nav-status-tab" data-toggle="tab"
                                        href="#nav-status" role="tab" aria-controls="nav-status"
                                        aria-selected="false"><i class="fas fa-image"></i>Update profile picute</a>


                                    <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab"
                                        href="#nav-password" role="tab" aria-controls="nav-password"
                                        aria-selected="false"><i class="fas fa-lock"></i>Change Password</a>


                                    <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab"
                                        href="#nav-notification" role="tab" aria-controls="nav-notification"
                                        aria-selected="false"><i class="fas fa-bell"></i>Notifications</a>


                                    <a class="nav-item nav-link" id="nav-privcy-tab" data-toggle="tab" href="#privcy"
                                        role="tab" aria-controls="privacy" aria-selected="false"><i class="fas fa-book-open"></i>Terms & conditions</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-acc" role="tabpanel"
                                    aria-labelledby="nav-acc-tab">
                                    <div class="acc-setting">
                                        <h3>Your profile information</h3>
                                        <?php
                                            $sql2 = "SELECT * FROM users WHERE id = '$user'";
                                            $result2 = $con->query($sql2);
                                        ?>
                                        <form action="update_profile.php" method="POST">
                                            <?php
                                                while($rows2 = mysqli_fetch_array($result2)){
                                                    extract($rows2);
                                                    ?>
                                                    <div class="cp-field">
                                                <h5>Name</h5>
                                                <div class="cpp-fiel">
                                                    <input type="text" name="name" placeholder="Your full name" value="<?php echo $name ?>" disabled>
                                                    <i class="fas fa-file-signature"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Email</h5>
                                                <div class="cpp-fiel">
                                                    <input type="text" name="email" placeholder="Your Email" value="<?php echo $email ?>">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Bio</h5>
                                                <div class="cpp-fiel">
                                                    <input type="text" name="bio"
                                                        placeholder="Your bio" value="<?php echo $bio ?>">
                                                        <i class="fas fa-info-circle"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>URLs</h5>
                                                <div class="cpp-fiel">
                                                    <input type="text" name="fb"
                                                        placeholder="Facebook" value="<?php echo $fb ?>">
                                                        <i class="fab fa-facebook"></i>
                                                </div>
                                                <div class="cpp-fiel mt-2">
                                                    <input type="text" name="lnk"
                                                        placeholder="Linked In" value="<?php echo $linked_in ?>">
                                                        <i class="fab fa-linkedin"></i>
                                                </div>
                                                <div class="cpp-fiel mt-2">
                                                    <input type="text" name="git"
                                                        placeholder="Github" value="<?php echo $git ?>">
                                                        <i class="fab fa-github"></i>
                                                </div>
                                                <div class="cpp-fiel mt-2">
                                                    <input type="text" name="pweb"
                                                        placeholder="Personal Website" value="<?php echo $personal_web ?>">
                                                        <i class="fas fa-globe"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <p>
                                                *All of fields of this page are optional and can be deleted at any time, and by filling them out, you are giving us consent to share this data wherever your user profile appears.
                                                </p>
                                            </div>
                                            <div class="save-stngs pd2">
                                                <ul>
                                                    <li><button type="submit" name="update_profile">Save Setting</button></li>
                                                </ul>
                                            </div>
                                                    
                                                    <?php
                                                }
                                            ?>
                                            
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-status" role="tabpanel"
                                    aria-labelledby="nav-status-tab">
                                    <div class="acc-setting">
                                        <h3>Update your pictures</h3>
                                        <form>
                                            <div class="cp-field">
                                                <h5>Profile Picture</h5>
                                                <div class="cpp-fiel">
                                                    <input type="file" name="pp">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Cover Picture</h5>
                                                <div class="cpp-fiel">
                                                    <input type="file" name="cp">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            </div>
                                            <div class="save-stngs pd2">
                                                <ul>
                                                    <li><button type="submit">Save Setting</button></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-password" role="tabpanel"
                                    aria-labelledby="nav-password-tab">
                                    <div class="acc-setting">
                                        <h3>Change Password</h3>
                                        <form method="POST">
                                            <div class="cp-field">
                                                <h5>Old Password</h5>
                                                <div class="cpp-fiel">
                                                    <input type="password" name="old_password" placeholder="Old Password">
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>New Password</h5>
                                                <div class="cpp-fiel">
                                                    <input type="password" name="new_password" placeholder="New Password">
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Repeat Password</h5>
                                                <div class="cpp-fiel">
                                                    <input type="password" name="repeat_password"
                                                        placeholder="Repeat Password">
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field text-center">
                                                <h4 id="error_msg" style="color: red;"></h4>
                                            </div>
                                            <div class="save-stngs pd2">
                                                <ul>
                                                    <li><button type="submit" name="change_pass">Save Setting</button></li>
                                                </ul>
                                            </div>
                                        </form>

                                        <?php
                                            if(isset($_POST['change_pass'])){
                                                $old_pass = $_POST['old_password'];
                                                $new_pass = $_POST['new_password'];
                                                $repeat_pass = $_POST['repeat_password'];
                                                if($old_pass != $pa_ss){
                                                    ?>
                                                        <script>
                                                            const error_note = document.getElementById("error_msg");
                                                            error_note.innerHTML = "Current password and old password didn't match";
                                                            error_note.style.color = "red"; 
                                                        </script>
                                                    <?php
                                                }
                                                else{
                                                    if($new_pass != $repeat_pass){
                                                        ?>
                                                            <script>
                                                                const error_note = document.getElementById("error_msg");
                                                                error_note.innerHTML = "New password and repeat new password didn't match";
                                                                error_note.style.color = "red";
                                                            </script>
                                                        <?php
                                                    }
                                                    else{
                                                        $sqlpass = "UPDATE `users` SET `pass` = '$new_pass'";
                                                        $con->query($sqlpass);
                                                        ?>
                                                            <script>
                                                                const error_note = document.getElementById("error_msg");
                                                                error_note.innerHTML = "Password changed successfully";
                                                                error_note.style.color = "green";
                                                            </script>
                                                        <?php
                                                    }
                                                }
                                            }
                                        ?>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-notification" role="tabpanel"
                                    aria-labelledby="nav-notification-tab">
                                    <div class="acc-setting">
                                        <h3>Notifications</h3>
                                        <div class="notifications-list">
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/ny-img1.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your
                                                        project.</h3>
                                                    <span>2 min ago</span>
                                                </div>
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/ny-img2.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Poonam Verma</a> Bid on your Latest
                                                        project.</h3>
                                                    <span>2 min ago</span>
                                                </div>
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/ny-img3.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Tonney Dhman</a> Comment on your project.
                                                    </h3>
                                                    <span>2 min ago</span>
                                                </div>
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/ny-img1.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your
                                                        project.</h3>
                                                    <span>2 min ago</span>
                                                </div>
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/ny-img1.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your
                                                        project.</h3>
                                                    <span>2 min ago</span>
                                                </div>
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/ny-img2.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Poonam Verma </a> Bid on your Latest
                                                        project.</h3>
                                                    <span>2 min ago</span>
                                                </div>
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/ny-img3.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Tonney Dhman</a> Comment on your project
                                                    </h3>
                                                    <span>2 min ago</span>
                                                </div>
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/ny-img1.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your
                                                        project.</h3>
                                                    <span>2 min ago</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="privcy" role="tabpanel" aria-labelledby="nav-privcy-tab">
                                    <div class="acc-setting">
                                        <h3>Terms & Conditions</h3>
                                        <div class="requests-list">
                                            <div class="request-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/r-img1.png" alt="">
                                                </div>
                                                <div class="request-info">
                                                    <h3>Jessica William</h3>
                                                    <span>Graphic Designer</span>
                                                </div>
                                                <div class="accept-feat">
                                                    <ul>
                                                        <li><button type="submit" class="accept-req">Accept</button>
                                                        </li>
                                                        <li><button type="submit" class="close-req"><i
                                                                    class="la la-close"></i></button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="request-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/r-img2.png" alt="">
                                                </div>
                                                <div class="request-info">
                                                    <h3>John Doe</h3>
                                                    <span>PHP Developer</span>
                                                </div>
                                                <div class="accept-feat">
                                                    <ul>
                                                        <li><button type="submit" class="accept-req">Accept</button>
                                                        </li>
                                                        <li><button type="submit" class="close-req"><i
                                                                    class="la la-close"></i></button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="request-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/r-img3.png" alt="">
                                                </div>
                                                <div class="request-info">
                                                    <h3>Poonam</h3>
                                                    <span>Wordpress Developer</span>
                                                </div>
                                                <div class="accept-feat">
                                                    <ul>
                                                        <li><button type="submit" class="accept-req">Accept</button>
                                                        </li>
                                                        <li><button type="submit" class="close-req"><i
                                                                    class="la la-close"></i></button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="request-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/r-img4.png" alt="">
                                                </div>
                                                <div class="request-info">
                                                    <h3>Bill Gates</h3>
                                                    <span>C &amp; C++ Developer</span>
                                                </div>
                                                <div class="accept-feat">
                                                    <ul>
                                                        <li><button type="submit" class="accept-req">Accept</button>
                                                        </li>
                                                        <li><button type="submit" class="close-req"><i
                                                                    class="la la-close"></i></button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="request-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/r-img5.png" alt="">
                                                </div>
                                                <div class="request-info">
                                                    <h3>Jessica William</h3>
                                                    <span>Graphic Designer</span>
                                                </div>
                                                <div class="accept-feat">
                                                    <ul>
                                                        <li><button type="submit" class="accept-req">Accept</button>
                                                        </li>
                                                        <li><button type="submit" class="close-req"><i
                                                                    class="la la-close"></i></button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="request-details">
                                                <div class="noty-user-img">
                                                    <img src="settings_files/r-img6.png" alt="">
                                                </div>
                                                <div class="request-info">
                                                    <h3>John Doe</h3>
                                                    <span>PHP Developer</span>
                                                </div>
                                                <div class="accept-feat">
                                                    <ul>
                                                        <li><button type="submit" class="accept-req">Accept</button>
                                                        </li>
                                                        <li><button type="submit" class="close-req"><i
                                                                    class="la la-close"></i></button></li>
                                                    </ul>
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
        </section>
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