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

    <title>Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" type="image/x-icon" href="./images/cms_logo.png">
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
    <link rel="stylesheet" type="text/css" href="./css/cropper.min.css">
    <script src="./js/jquery.mousewheel.min.js.download"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" />
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script> 
</head>

<body>
    <div class="wrapper">
    <header>
            <div class="container">
                <div class="header-data">
                    <div class="logo">
                        <a href="home.php" title=""><img
                                src="./images/cms_logo.png" alt="" width= 32></a>
                    </div>
                    <div class="search-bar">
                        
                        <form action="search.php" method="POST">
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

                                        <?php 
                                            $message_thread_fetch = "SELECT DISTINCT person, person_to FROM message WHERE person_to = '$user' OR person = '$user' ORDER BY TIME DESC";
                                            $message_thread_fetch_result = mysqli_query($con, $message_thread_fetch);
                                            $user_list = array();
                                            while($row111 = mysqli_fetch_array($message_thread_fetch_result)){
                                                extract($row111);
                                                if($person_to != $user){
                                                    if(!in_array($person_to, $user_list)){
                                                        array_push($user_list, $person_to);
                                                    }
                                                }
                                                if($person != $user){
                                                    if(!in_array($person, $user_list)){
                                                        array_push($user_list, $person);
                                                    }
                                                }
                                            }
                                            foreach($user_list as $value){
                                                $small_msg = "SELECT * FROM message WHERE (person = '$user' AND person_to = '$value') OR (person = '$value' AND person_to = '$user') ORDER BY `time` DESC LIMIT 1";
                                                $run_query222 = mysqli_query($con, $small_msg);
                                                while($row222 = mysqli_fetch_array($run_query222)){
                                                    $user_id_details_fetch = "SELECT * FROM `users` WHERE id = '$value'";
                                                    $user_id_details_fetch_result = mysqli_query($con, $user_id_details_fetch);
                                                    while($row223 = mysqli_fetch_array($user_id_details_fetch_result)){
                                                        ?>
                                                        <div class="notfication-details">
                                                            <div class="noty-user-img">
                                                                <img src="./images/pro_pic/<?php echo $row223['profile_pic'] ?>" alt="" style="border-radius:50%;">
                                                            </div>
                                                            <div class="notification-info">
                                                                <h3 class="text-truncate" style="max-width: 140px;"><a href="./messages.php?conversation_user=<?php echo $value ?>" title=""><?php echo $row223['name'] ?></a> </h3>

                                                                <?php
                                                                    if($row222['person'] == $user){
                                                                        ?>
                                                                            <p>You: <?php echo $row222['message'] ?></p>
                                                                            <span><?php echo time_elapsed_string($row222['time']); ?></span>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                            <p><?php echo $row222['message'] ?></p>
                                                                            <span><?php echo time_elapsed_string($row222['time']); ?></span>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }  
                                                }
                                            }

                                            function time_elapsed_string($datetime, $full = false) {
                                                date_default_timezone_set('Asia/Dhaka');
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
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" title=""
                                    class="not-box-open">
                                    <span><i class="fa fa-bell" aria-hidden="true"></i></span>
                                    Notification
                                </a>
                                
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
                                <li><a href="settings.php"
                                        title="">Account Setting</a></li>
                                
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


                                    <!-- <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab"
                                        href="#nav-notification" role="tab" aria-controls="nav-notification"
                                        aria-selected="false"><i class="fas fa-bell"></i>Notifications</a> -->


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
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="cp-field">
                                                <h5>Profile Picture</h5>
                                                <div class="cpp-fiel">
                                                    <input type="file" name="pp" id="pp">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Cover Picture</h5>
                                                <div class="cpp-fiel">
                                                    <input type="file" name="cp" id="cp">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            </div>
                                            <div class="save-stngs pd2">
                                                <p id="image_error_msg" class="text-center" style="color: red;"></p>
                                                <ul>
                                                    <li><button type="button" name="image_upload" id="image_upload">Update picture</button></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal fade" id="modal_crop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #FFC000">
                                                <h5 class="modal-title" style="color: white;">Image resizer</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="img-container">
                                                    <div class="row">
                                                        <div class="col-md-8 core-img">
                                                            <img src="" id="sample_image" class="img1 mt-3"/>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="preview mt-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-right">
                                                <button type="button" id="crop_and_upload" class="btn btn-primary" style="background-color: #FFC000; color: white;">Crop</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: grey;">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <style>
                                    .img1 {
                                        display: block;
                                        max-width: 100%;
                                        /* max-height: 80%; */
                                        
                                    }
                                    .core-img{
                                        display: flex;
                                        /* align-items: center; */
                                        justify-content: center;
                                        margin-top: 15px;
                                    }
                                    .preview {
                                        overflow: hidden;
                                        width: 250px; 
                                        height: 250px;
                                        margin: 10px;
                                        border: 1px solid red;
                                    }
                                    .modal-lg{
                                        max-width: 1000px !important;
                                    }
                                </style>

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
                                                        $sqlpass = "UPDATE `users` SET `pass` = '$new_pass' WHERE id = '$user'";
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
                                <style>
                                    .jor ul li{
                                        list-style: default;
                                    }
                                </style>
                                <div class="tab-pane fade" id="privcy" role="tabpanel" aria-labelledby="nav-privcy-tab">
                                    <div class="acc-setting">
                                        <h3>Terms & Conditions</h3>
                                        <div class="jor mx-5">

                                                <p><b>The use of this website is subject to the following terms of use:</b>  </p>
                                                <ul>
                                                    <li>
                                                        <p>The content of the pages of this website is for your general information and use only. 
                                                        It is subject to change without notice.</p>
                                                    </li>
                                                    <li>
                                                        <p>This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, the following personal information may be stored by us for use by third parties: [insert list of information].</p>
                                                    </li>
                                                    <li>
                                                        <p>Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.</p>
                                                    </li>
                                                    <li>
                                                        <p>Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.</p>
                                                    </li>
                                                    <li>
                                                        <p>This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions</p>
                                                    </li>
                                                    <li>
                                                        <p>All trademarks reproduced in this website, which are not the property of, or licensed to the operator, are acknowledged on the website.</p>
                                                    </li>
                                                </ul>
                                                <div class="mt-2 mb-2">
                                                <!-- <button type="submit" class="btn btn-primary">I agree</button> -->
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
    <script type="text/javascript" src="./js/cropper.min.js"></script>

    <script>
        var $modal = $('#modal_crop');
        var crop_image = document.getElementById('sample_image');
        var cropper;
        var finalpp = "";
        var finalcp = "";
        $('#pp').change(function(event){
            var files = event.target.files;
            var done = function(url){
                crop_image.src = url;
                $modal.modal('show');
            };
            if(files && files.length > 0){
                reader = new FileReader();
                reader.onload = function(event){
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
            $modal.on('shown.bs.modal', function(){
                cropper = new Cropper(crop_image, {
                    aspectRatio: 1,
                    viewMode: 3,
                    preview : '.preview'
                });
            }).on('hidden.bs.modal', function(){
                cropper.destroy();
                cropper = null;
            });

            $('#crop_and_upload').click(function(){
                canvas = cropper.getCroppedCanvas({
                    width: 400,
                    height: 400
                });
                canvas.toBlob(function(blob){
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function(){
                        finalpp = reader.result;
                        $modal.modal('hide');
                    };
                });
            });
        });


        $('#cp').change(function(event){
            var files = event.target.files;
            var done = function(url){
                crop_image.src = url;
                $modal.modal('show');
            };
            if(files && files.length > 0){
                reader = new FileReader();
                reader.onload = function(event){
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
            $modal.on('shown.bs.modal', function(){
                cropper = new Cropper(crop_image, {
                    aspectRatio: 24.3 / 10,
                    viewMode: 3,
                    preview : '.preview'
                });
            }).on('hidden.bs.modal', function(){
                cropper.destroy();
                cropper = null;
            });

            $('#crop_and_upload').click(function(){
                canvas = cropper.getCroppedCanvas({
                    width: 1603,
                    height: 660
                });
                canvas.toBlob(function(blob){
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function(){
                        finalcp = reader.result;
                        $modal.modal('hide');
                    };
                });
            });
        });
        $('#image_upload').click(function(){
            if(finalpp == "" && finalcp == ""){
                $('#image_error_msg').html("Please Select Image");
            }
            else{
                $.ajax({
                    url:'upload_files.php',
                    method:'POST',
                    data:{
                        profilep : finalpp,
                        coverp : finalcp
                    },
                    success:function(data)
                    {
                        location.reload(); 
                    }
                });
            }

        });


    </script>

</body>

</html>