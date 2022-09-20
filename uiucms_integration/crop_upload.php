<?php
    session_start();
    $user = $_SESSION['user'];
    $con = mysqli_connect("localhost", "root", "", "uiucms");

    if(isset($_POST['crop_image'])){
        $data = $_POST['crop_image'];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $base64_decode = base64_decode($image_array_2[1]);
        $path_img = './images/pro_pic/'.''.$user.'-'.time().'.png';
        $imagename = $user.'-'.time().'.png';
        file_put_contents($path_img, $base64_decode); 
        // $sql2 = "INSERT INTO upload(imagename) VALUES ('$imagename')"; 
        // $conn->query($sql2); 
    }
?>