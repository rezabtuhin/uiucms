<?php

    session_start();
    $user = $_SESSION['user'];
    $role = $_SESSION['role'];
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $post_id = $_POST['p_id'];
    $user_id = $_POST['user_id'];
    $comment_retrieve = "SELECT * FROM `comments` WHERE `post_id` = $post_id order by `time` DESC LIMIT 2";
    $run_query = mysqli_query($con,$comment_retrieve);
    while($row_3 = mysqli_fetch_array($run_query)){
        extract($row_3);
        $formated_date = date("M d, Y h:i a", strtotime($time));
        $user_info_retrieve = "SELECT * FROM `users` WHERE `id` = '$user_id'";
        $run_query_2 = mysqli_query($con,$user_info_retrieve);
        while($row_4 = mysqli_fetch_array($run_query_2)){
            extract($row_4);
                echo '
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="images/pro_pic/<?php echo $profile_pic?>" alt="" width="40">
                        <div class="usy-name">
                            <h3><a class="user_profile_link" href="profile.php?user_id=<?php echo $id?>"><?php echo $name?></a></h3>
                            <span><img src="homepage_files/clock.png" alt=""><?php echo $formated_date ?></span>
                        </div>
                    </div>
                </div>
                <div class="reply-area">
                    <p><?php echo $comment ?></p>
                </div>';
        }
    }

?>