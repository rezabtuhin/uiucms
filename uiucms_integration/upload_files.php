<?php
    session_start();
    $user = $_SESSION['user'];
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $pp = $_POST['profilep'];
    $cp = $_POST['coverp'];

    if ($pp != "" && $cp == "") {
        $image_array_1 = explode(";", $pp);
        $image_array_2 = explode(",", $image_array_1[1]);
        $base64_decode = base64_decode($image_array_2[1]);
        $path_img = './images/pro_pic/'.''.$user.'-'.time().'.png';
        $imagename = $user.'-'.time().'.png';
        file_put_contents($path_img, $base64_decode);
        $sql = "UPDATE `users` SET `profile_pic` = '$imagename' WHERE `id` = '$user'";
        $con->query($sql);
        // echo $imagename;
    }
    else if($pp == "" && $cp != ""){
        $image_array_1 = explode(";", $cp);
        $image_array_2 = explode(",", $image_array_1[1]);
        $base64_decode = base64_decode($image_array_2[1]);
        $path_img = './images/cover_pic/'.''.$user.'-'.time().'.png';
        $imagename = $user.'-'.time().'.png';
        file_put_contents($path_img, $base64_decode);
        $sql = "UPDATE `users` SET `cover_pic` = '$imagename' WHERE `id` = '$user'";
        $con->query($sql);
    }
    else{
        $image_array_1 = explode(";", $pp);
        $image_array_2 = explode(",", $image_array_1[1]);
        $base64_decode = base64_decode($image_array_2[1]);
        $path_img = './images/pro_pic/'.''.$user.'-'.time().'.png';
        $imagename1 = $user.'-'.time().'.png';
        file_put_contents($path_img, $base64_decode);


        $image_array_3 = explode(";", $cp);
        $image_array_4 = explode(",", $image_array_3[1]);
        $base64_decode_1 = base64_decode($image_array_4[1]);
        $path_img = './images/cover_pic/'.''.$user.'-'.time().'.png';
        $imagename2 = $user.'-'.time().'.png';
        file_put_contents($path_img, $base64_decode_1);
        
        $sql = "UPDATE `users` SET `profile_pic` = '$imagename', `cover_pic` = '$imagename2' WHERE `id` = '$user'";
        $con->query($sql);
    }
?>