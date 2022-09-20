<?php
    session_start();
    $user = $_SESSION['user'];
    $role = $_SESSION['role'];
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

    <title>Home</title>
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
                                                <span><?php echo $fol_in ?></span>
                                            </li>
                                            <li>
                                                <h4>Followers</h4>
                                                <span><?php echo $fol_er ?></span>
                                            </li>
                                            <li>
                                                <?php
                                                    if ($role == 'student'){
                                                        ?>
                                                            <a href="profile.php" title="">View Profile</a>
                                                        <?php
                                                    }
                                                    else if ($role == 'club'){
                                                        ?>
                                                            <a href="club_profile.php" title="">View Profile</a>
                                                        <?php
                                                    }
                                                    else{
                                                        ?>
                                                            <a href="admin_profile.php" title="">View Profile</a>
                                                        <?php
                                                    }
                                                ?>
                                                
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

                                        <?php
                                            $show_post_query = "SELECT * FROM `post` WHERE `user_id` IN (SELECT `person` FROM `followship` WHERE `follower` = '$user' AND `privacy` = 'public') ORDER BY `post`.`time` DESC";
                                            $show_post_result = $con->query($show_post_query);
                                            
                                            while($row_1 = mysqli_fetch_array($show_post_result)){
                                                extract($row_1);
                                                $formated_date = date("M d, Y h:i a", strtotime($time));
                                                ?>
                                                    <div class="posty mb-4">
                                                        <div class="post-bar no-margin">
                                                            <div class="post_topbar">
                                                                <?php
                                                                    $user_select_query = "SELECT * FROM `users` WHERE `id` = '$user_id'";
                                                                    $user_select_result = $con->query($user_select_query);
                                                                    while($row_2 = mysqli_fetch_array($user_select_result)){
                                                                        ?>
                                                                        <div class="usy-dt">
                                                                            <img src="./images/pro_pic/<?php echo $row_2['profile_pic'] ?>" alt="" width=45>
                                                                            <div class="usy-name">
                                                                                <h3 class="post-owner"><a href="profile.php?id=<?php echo $row_2['id']?>"><?php echo $row_2['name'] ?></a></h3>
                                                                                <span><img src="./homepage_files/clock.png" alt=""><?php echo $formated_date ?></span>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                ?>
                                                                <style>
                                                                    .post-owner a{
                                                                        color:black;
                                                                        text-decoration:none;
                                                                    }
                                                                    .post-owner a:hover{
                                                                        text-decoration: underline;
                                                                    }
                                                                </style>
                                                                
                                                                
                                                            </div>
                                                            <div class="job_descp mt-2">
                                                                <p><?php echo $post_text ?></p> 
                                                            </div>
                                                            <?php
                                                                $comment_selector = "SELECT * FROM `comments` WHERE `post_id` = '$post_id'";
                                                                $comment_selector_result = $con->query($comment_selector);
                                                                $total_comments = mysqli_num_rows($comment_selector_result);
                                                            ?>
                                                            <section class="d-flex justify-content-around mb-2" style="border-top: 1px solid #b2b2b2; border-bottom: 1px solid #b2b2b2;">
                                                                <div class="rect-like mt-2 mb-2">
                                                                    <?php
                                                                        $reaction = "SELECT * FROM `reaction` WHERE `post_id` = $post_id AND `user` = '$user'";
                                                                        $reaction_result = $con->query($reaction);
                                                                        if (mysqli_num_rows($reaction_result) > 0) {
                                                                            ?>
                                                                                
                                                                                <a href="javascript:void(0)" onclick="like_unlike('<?php echo $user ?>', <?php echo $post_id ?>, 'like')" id="like_loop_<?php echo $post_id ?>" style="color: red; width: 100%;" title="<?php echo $post_id ?>" class="like-comment-btn"> <i class="fas fa-heart"></i> Like</a>
                                                                            <?php
                                                                        }
                                                                        else{
                                                                            ?>
                                                                                <a href="javascript:void(0)" onclick="like_unlike('<?php echo $user ?>', <?php echo $post_id ?>, 'unlike')" id="like_loop_<?php echo $post_id ?>" style="color: #b2b2b2; width: 100%;" title="<?php echo $post_id ?>" class="like-comment-btn"> <i class="fas fa-heart"></i> Like</a>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    <input type="text" id="u_id" value = "<?php echo $user ?>" hidden>
                                                                    <input type="text" id="p_id" value = "<?php echo $post_id ?>" hidden>
                                                                </div>
                                                                
                                                                <div class="rect-like mt-2 mb-2"><a href="" style="color: #b2b2b2; width: 100%;" class="like-comment-btn"> <i class="fas fa-comment"></i>Comments (<?php echo $total_comments ?>) </a></div>
                                                            </section>
                                                            <?php
                                                                if(($total_comments-2)>0){
                                                                    ?>
                                                                        <a href="" class="" style="color: #FFC000;">View <?php echo $total_comments-2 ?> more comment(s)</a>
                                                                    <?php
                                                                }
                                                            ?>

                                                        </div>
                                                        <div class="comment-section">
                                                            <div class="comment-sec" id="comment_sec<?php echo $post_id ?>">
                                                                <!-- <ul id="comment_112"> -->
                                                                    <?php
                                                                        $comment_retrieve = "SELECT * FROM `comments` WHERE `post_id` = $post_id order by `time` DESC LIMIT 2";
                                                                        $run_query = mysqli_query($con,$comment_retrieve);
                                                                        while($row_3 = mysqli_fetch_array($run_query)){
                                                                            extract($row_3);
                                                                            $formated_date = date("M d, Y h:i a", strtotime($time));
                                                                            $user_info_retrieve = "SELECT * FROM `users` WHERE `id` = '$user_id'";
                                                                            $run_query_2 = mysqli_query($con,$user_info_retrieve);
                                                                            while($row_4 = mysqli_fetch_array($run_query_2)){
                                                                                ?>
                                                                                    <div class="post_topbar">
                                                                                        <div class="usy-dt">
                                                                                            <img src="images/pro_pic/<?php echo $row_4['profile_pic']?>" alt="" width="40">
                                                                                            <div class="usy-name">
                                                                                                <h3><a class="user_profile_link" href="profile.php?user_id=<?php echo $row_4['id']?>"><?php echo $row_4['name'] ?></a></h3>
                                                                                                <span><img src="homepage_files/clock.png" alt=""><?php echo $formated_date ?></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="reply-area">
                                                                                        <p><?php echo $comment ?></p>
                                                                                    </div>
                                                                                <?php
                                                                            }
                                                                        }
                                                                    ?>
                                                                <!-- </ul> -->
                                                                <style>
                                                                    .user_profile_link{
                                                                        color: black;
                                                                        text-decoration: none;
                                                                    }
                                                                    .comment a:hover{
                                                                        text-decoration: underline;
                                                                    }
                                                                </style>
                                                            </div>
                                                            <div class="post-comment">
                                                                <div class="cm_img">
                                                                    <img src="./images/pro_pic/<?php echo $pro_pic ?>" alt="" style="border-radius:50%">
                                                                </div>
                                                                <div class="comment_box">
                                                                    <form>
                                                                        <input type="text" placeholder="Post a comment" id="comment_box<?php echo $post_id ?>">
                                                                        <button type="button" onclick="submit_comment(<?php echo $post_id ?> , '<?php echo $user ?>')">Send</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                        <!-- <script>
                                            $(".like-comment-btn").click(function() {
                                                var elem = document.querySelector('.like-comment-btn');
                                                var title = $(this).attr('title');
                                                // alert(title);
                                                const color = elem.style.color;
                                                var u_id = $("#u_id").val();
                                                var p_id = $("#p_id").val();
                                                // alert(color+" "+u_id+" "+p_id);
                                                $.ajax({
                                                    method: "POST",
                                                    url:"like.php",
                                                    data:{
                                                        u_id: u_id,
                                                        p_id: title,
                                                        color: color,
                                                    },
                                                    success: function(da_ta){
                                                        if (da_ta == "red") {
                                                            elem.style.color = da_ta;
                                                        }
                                                        else{
                                                            elem.style.color = da_ta;
                                                        }
                                                    }
                                                });
                                                

                                            })
                                        </script> -->
                                        <script>
                                            function like_unlike(u_id, p_id, status){
                                                var elem = document.querySelector('#like_loop_'+p_id);
                                                $.ajax({
                                                    method: "POST",
                                                    url: "like.php",
                                                    data:{
                                                        u_id: u_id,
                                                        p_id: p_id,
                                                        status: status
                                                    },
                                                    success: function(da_ta){
                                                        if (da_ta == "red") {
                                                            elem.style.color = da_ta;
                                                        }
                                                        else{
                                                            elem.style.color = da_ta;
                                                        }
                                                    }
                                                });
                                            }

                                            function comment_loader(){
                                                alert("hehehe");
                                                // $.ajax({
                                                //     method: "POST",
                                                //     url: "comment.php",
                                                //     data:{
                                                //         post_id: post_id,
                                                //     },
                                                //     success: function(da_ta){
                                                //         alert(da_ta);
                                                //         $("#comment_112").html(da_ta);
                                                //     }
                                                // });
                                            }
                                            // comment_loader();

                                            function submit_comment(p_id, u_id){
                                                comment_text = $("#comment_box"+p_id).val(); 
                                                // alert(comment_text);
                                                $.ajax({
                                                    method: "POST",
                                                    url: "comment_insert.php",
                                                    data:{
                                                        u_id: u_id,
                                                        p_id: p_id,
                                                        comment_text: comment_text
                                                    },
                                                    success: function(){
                                                        $("#comment_box"+p_id).val('');
                                                    }
                                                });

                                                // $.ajax({
                                                //     method: "POST",
                                                //     url: "comment_update.php",
                                                //     data:{
                                                //         p_id: p_id
                                                //         u_id: u_id,
                                                //     },
                                                //     success: function(da_ta){
                                                //         $("#comment_sec"+p_id).html(da_ta);
                                                //     }
                                                // });
                                            }
                                        </script>
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
                            <div class="col-lg-12">
                            <p>*Supported file format ".jpg", ".png", ".jpeg"</p>
                                <input type="file" name="my_image">
                                
                            </div>
                            
                            <div class="col-lg-12">
                                <textarea name="description" placeholder="Write something"></textarea>
                            </div>
                            <div class="col-lg-6">
                            <select class="custom-select custom-select-sm" name="privacy_options">
                                <option selected disabled>Privacy Option</option>
                                <option value="public">Public</option>
                                <option value="follower">Followers</option>
                                <option value="private">Only me</option>
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
                            $privacy_option = $_POST['privacy_options'];
                            if(isset($_FILES['my_image'])){
                                $img_name = $_FILES['image']['name'];
                                $img_size = $_FILES['image']['size'];
                                $tmp_name = $_FILES['image']['tmp_name'];
                                $error = $_FILES['image']['error'];
                                if($error == 0) {
                                    if($img_size > 125000){
                                        ?>
                                            <script>
                                                alert("File size exceeds limit.");
                                            </script>
                                        <?php
                                    }
                                    else{
                                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                                        $img_ex_lc = strtolower($img_ex);
                                        $allowed_exs = array("jpg", "png", "jpeg");
                                        if(in_array($img_ex_lc, $allowed_exs)){
                                            $new_img_name = uniqid("IMG", true).'.'.$img_ex_lc;
                                            $img_upload_path = './images/post_pic/'.$new_img_name;
                                            move_uploaded_file($tmp_name, $img_upload_path);
                                            
                                            $post_insertion = "INSERT INTO `post`(`user`, `post_text`, `post_picture`, `privacy`) VALUES ('$user','$post_text','$new_img_name','$privacy_option')";
                                            $con->query($post_insertion);
                                            header("location: home.php");
                                        }
                                        else{
                                            ?>
                                                <script>
                                                    alert("File format not supported.");
                                                </script>
                                            <?php
                                        }
                                    }
                                }
                            }

                            else{
                                $post_insertion = "INSERT INTO `post`(`user`, `post_text`, `privacy`) VALUES ('$user','$post_text','$privacy_option')";
                                $con->query($post_insertion);
                                header("location: home.php");
                            }

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
    <script src="js/custom-ajax.js"></script>

</body>
</html>