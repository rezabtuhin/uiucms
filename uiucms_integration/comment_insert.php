<?php
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $u_id = $_POST['u_id'];
    $p_id = $_POST['p_id'];
    $comment_text = $_POST['comment_text'];

    $sql = "INSERT INTO `comments`(`post_id`, `user_id`, `comment`) VALUES ($p_id,'$u_id','$comment_text')";
    $con->query($sql);
    
    exit();
?>
