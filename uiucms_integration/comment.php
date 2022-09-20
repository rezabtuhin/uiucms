<?php
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $p_id = $_POST['post_id'];
    $comment_retrieve = "SELECT * FROM `comments` WHERE `post_id` = $post_id order by `time` DESC LIMIT 2";
    $run_query = mysqli_query($con,$comment_retrieve);
    while($row_3 = mysqli_fetch_array($run_query)){
        extract($row_3);
        $formated_date = date("M d, Y h:i a", strtotime($time));
        $user_info_retrieve = "SELECT * FROM `users` WHERE `id` = '$user_id'";
        $run_query_2 = mysqli_query($con,$user_info_retrieve);
        while($row_4 = mysqli_fetch_array($run_query_2)){
            echo $row_4['id'];
        }
    }
?>