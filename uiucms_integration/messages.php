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
    $conversation_user = $_REQUEST['conversation_user'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Messages</title>
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
    <script src="./js/jquery.mousewheel.min.js.download"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body data-new-gr-c-s-check-loaded="14.1073.0" data-gr-ext-installed="" >
<style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap');

        * {
            font-family: 'Source Sans Pro', sans-serif;
        }
        body{
            background-color: #f2f2f2;
        }

        .wrapper {
	        float: left;
	        width: 100%;
	        position: relative;
        }

        .messages-page {
	        padding: 30px 0;
        }
        .messages-sec {
	        float: left;
	        width: 100%;
        }

        .main-conversation-box {
	        float: left;
	        width: 100%;
	        background-color: #fff;
	        position: relative;
	        border-right: 1px solid #e4e4e4;
	        border-bottom: 1px solid #cbc2c2;
            padding: 10px;
        }
        .usr-msg-details {
	        float: left;
	        position: relative;
	        width: 100%;
        }       
        .usr-ms-img {
        	float: left;
        	width: 50px;
        	position: relative;
        }


        .usr-ms-img img {
	        width: 100%;
	        -webkit-border-radius: 100px;
	        -moz-border-radius: 100px;
	        -ms-border-radius: 100px;
	        -o-border-radius: 100px;
	        border-radius: 100px;
        }
        .usr-mg-info {
        	float: left;
        	padding-left: 13px;
        	margin-top: 4px;
        }
        .usr-mg-info h3 {
        	color: #000000;
        	font-size: 18px;
        	font-weight: 600;
        }
        .usr-mg-info p {
        	color: #686868;
        	font-size: 16px;
        }
        .usr-mg-info p img {
        	float: right;
        	position: relative;
        	top: 5px;
        	padding-left: 5px;
        }

        .message-bar-head {
        	float: left;
        	width: 100%;
        	background-color: rgba(255,255,255,0.95);
        	padding: 20px;
        	border-bottom: 1px solid #eaeaea;
        	position: absolute;
        	top: 0;
        	left: 0;
        	z-index: 11;
        }
        .message-bar-head .usr-msg-details {
        	float: left;
        	width: auto;
        }
        .message-bar-head > a {
        	float: right;
        	color: #b2b2b2;
        	font-size: 20px;
        	padding-top: 15px;
        }
        .main-message-box {
        	float: left;
        	width: 100%;
        	position: relative;
        	margin-bottom: 15.5px;
        }
        .messg-usr-img {
        	position: absolute;
        	bottom: 25px;
        	left: 20px;
        	width: 50px;
        }
        .messg-usr-img img {
        	width: 100%;
        	-webkit-border-radius: 100px;
        	-moz-border-radius: 100px;
        	-ms-border-radius: 100px;
        	-o-border-radius: 100px;
        	border-radius: 100px;
        }
        .message-dt {
        	float: left;
        	width: auto;
        	padding-left: 85px;
        }


        .main-message-box.ta-right {
        	float: right;
            padding-top: 10px;
            padding-bottom: 5px;
            padding-left: 127.5vh;
        }


        .main-message-box.ta-right .messg-usr-img {
        	left: auto;
        	right: 20px;
        	bottom: 25px;
        }
        .main-message-box.ta-right .message-dt {
            padding-left: auto;
        }
        .main-message-box.ta-right .message-dt > span {
        	float: right;
        	width: auto;
        }
        .messages-list a:hover{
            background-color: #f2f2f2;
        }
        
        .message-inner-dt {
        	/* float: left; */
            /* text-align:right; */
        	-webkit-border-radius: 15px;
        	-moz-border-radius: 15px;
        	-ms-border-radius: 15px;
        	-o-border-radius: 15px;
        	border-radius: 15px;
        	width: 100%;
        }
        .img-bx {
        	background-color: #efefef;
        	padding: 20px;
        }
        .message-inner-dt > img {
        	display: inline-block;
        	width: auto;
        	margin-right: 5px;
        }
        .message-dt > span {
        	color: #b2b2b2;
        	font-size: 14px;
        	float: left;
        	width: 100%;
        	margin-top: -7px;
        }
        .message-inner-dt > p {
        	float: right;
        	width: auto;
        	background-color: #FFC000;
        	font-size: 14px;
        	/* line-height: 22px; */
        	padding: 10px 15px;
        	color: #fff;
        	-webkit-border-radius: 15px;
        	-moz-border-radius: 15px;
        	-ms-border-radius: 15px;
        	-o-border-radius: 15px;
        	border-radius: 15px;
        }
        .message-dt.st3 .message-inner-dt > p {
        	background-color: #efefef;
        	color: #686868;
        	width: auto;
        	padding: 10px 15px;
        	float: left;
        }
        .message-dt.st3 .message-inner-dt > p img {
        	float: right;
        	position: relative;
        	top: 3px;
        	padding-left: 5px;
        }
        .main-message-box.st3 .messg-usr-img {
        	bottom: 13px;
        }
        .messages-line {
        	float: left;
        	width: 100%;
        	height: 480px;
            overflow-y: scroll;
            background-color: white;
        }

        /* ============== message-send-area ============ */

        .message-send-area {
        	float: left;
        	width: 100%;
        	background-color: #f3f5f7;
        	padding: 25px 20px 15px 20px;
        	border: 1px solid #eeeeee;
        }
        .message-send-area form {
        	float: left;
        	width: 100%;
        }
        .mf-field {
        	float: left;
        	width: 100%;
        }
        .mf-field input {
        	float: left;
        	width: 87%;
        	background-color: #fff;
        	color: #b2b2b2;
        	font-size: 16px;
        	padding: 0 15px;
        	border: 1px solid #e6e6e6;
        	height: 40px;
        }
        .mf-field button {
        	float: left;
        	width: 10%;
        	background-color: #FFC000;
        	height: 40px;
        	text-align: center;
        	color: #fff;
        	font-weight: 600;
        	border: 0;
        	margin-left: 15px;
        	cursor: pointer;
        }

        .dropdown-menu{
            border-radius: 0px;
        }
</style>

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
        <input type="hidden" id = "fromUser" name="" value = "<?php echo $user ?>">
        <input type="hidden" id = "toUser" name="" value = "<?php echo $conversation_user ?>">
        <section class="messages-page">
            <div class="container">
                <div class="messages-sec">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 no-pdd">
                            <div class="msgs-list">
                                <div class="msg-title">
                                    <h3>Messages</h3>
                                </div>
                                <div class="messages-list" style="	height: 72vh; overflow: hidden; overflow-y: scroll;">

                                    <ul>
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
                                                        <a href="messages.php?conversation_user=<?php echo $value ?>">
                                                            <?php
                                                                if ($value == $conversation_user){
                                                                    ?>
                                                                    <li class="active">
                                                                        <div class="usr-msg-details">
                                                                            <div class="usr-ms-img">
                                                                                <img src="images\pro_pic\<?php echo $row223['profile_pic'] ?>" alt="">
                                                                            </div>
                                                                            <div class="usr-mg-info">
                                                                                <h3 class="text-truncate" style="max-width: 160px;"><?php echo $row223['name'] ?></h3>

                                                                                <?php
                                                                                    if($row222['person'] == $user){
                                                                                        ?>
                                                                                            <p class="text-truncate" style="max-width: 180px;">You: <?php echo $row222['message'] ?></p>
                                                                                        <?php
                                                                                    }
                                                                                    else{
                                                                                        ?>
                                                                                            <p class="text-truncate" style="max-width: 180px;"><?php echo $row222['message'] ?></p>
                                                                                        <?php
                                                                                    }
                                                                                ?>
                                                                            </div>
                                                                            <span class="posted_time"><?php echo time_elapsed_string($row222['time']); ?></span>
                                                                        </div>
                                                                    </li>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                        <li class="">
                                                                            <div class="usr-msg-details">
                                                                                <div class="usr-ms-img">
                                                                                    <img src="images\pro_pic\<?php echo $row223['profile_pic'] ?>" alt="">
                                                                                </div>
                                                                                <div class="usr-mg-info">
                                                                                    <h3 class="text-truncate" style="max-width: 160px;"><?php echo $row223['name'] ?></h3>

                                                                                    <?php
                                                                                        if($row222['person'] == $user){
                                                                                            ?>
                                                                                                <p class="text-truncate" style="max-width: 180px;">You: <?php echo $row222['message'] ?></p>
                                                                                            <?php
                                                                                        }
                                                                                        else{
                                                                                            ?>
                                                                                                <p class="text-truncate" style="max-width: 180px;"><?php echo $row222['message'] ?></p>
                                                                                            <?php
                                                                                        }
                                                                                    ?>
                                                                                </div>
                                                                                <span class="posted_time"><?php echo time_elapsed_string($row222['time']); ?></span>
                                                                            </div>
                                                                        </li>
                                                                    <?php
                                                                }
                                                            ?>
                                                            
                                                        </a>
                                                        <?php
                                                    }  
                                                }
                                            }                       
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 pd-right-none pd-left-none">
                            <div class="main-conversation-box">
                                <div class="message-bar-head">
                                    <?php
                                        $q1 = "SELECT `name`, `profile_pic` FROM `users` WHERE id = '$conversation_user'";
                                        $q2 = $con->query($q1);
                                        while($row1111 = mysqli_fetch_array($q2)){
                                            ?>
                                            <div class="usr-msg-details">
                                                <div class="usr-ms-img">
                                                    <img src="images\pro_pic\<?php echo $row1111['profile_pic'] ?>" alt="">
                                                </div>
                                                <div class="usr-mg-info">
                                                    <h3><?php echo $row1111['name'] ?></h3>
                                                    <p>Online</p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                    
                                </div>
                                <div class="msg-show" style="height: 70.4vh; background-color:white; overflow: hidden; overflow-y: scroll;">
                                    <div style="padding-top:13vh; margin-left:2vh; margin-right:2vh;" id="containing_msg"></div>
                                </div>
                            </div>
                            <div class="message-send-area">
                                
                                    <div class="mf-field">
                                        <input type="text" id="message_send_box" placeholder="Type a message here" >
                                        <button type="submit" id="message_send">Send</button>
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

    <script type="text/javascript">
        var fromUsers = $("#fromUser").val();
        var toUsers = $("#toUser").val();
        $(document).ready(function(){
            $("#message_send").on("click", function(){
                var messages = $("#message_send_box").val();
                if (messages == ""){
                    alert("Please write something.");
                }
                else{
                    $.ajax({
                        url: "insertMessage.php",
                        method: "POST",
                        data:{
                            fromUser: fromUsers,
                            toUser: toUsers,
                            message: messages
                        },
                        dateType:"text",
                        success:function(data){
                            $("#message_send_box").val("");
                        }
                    });
                }
            });
            setInterval(function(){
                $.ajax({
                    url: "realtimeUpdate.php",
                    method: "POST",
                    data:{
                        fromUser: fromUsers,
                        toUser: toUsers
                    },
                    dataType:"text",
                    success:function(data){
                        $("#containing_msg").html(data);
                    }
                });
            }, 1);

        });

    </script>

</body>
</html>