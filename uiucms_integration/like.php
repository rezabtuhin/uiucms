<?php
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $u_id = $_POST['u_id'];
    $p_id = $_POST['p_id'];
    $status = $_POST['status'];

    if($status == 'like'){
        $sql = "DELETE FROM `reaction` WHERE `post_id` = $p_id AND `user` = $u_id";
        $con->query($sql);
        echo "#b2b2b2";
    }
    if($status == 'unlike'){
        $sql = "INSERT INTO `reaction`(`post_id`, `user`) VALUES ($p_id,'$u_id')";
        $con->query($sql);
        echo "red";
    }
    exit();
?>