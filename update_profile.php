<?php
    session_start();
    $user = $_SESSION['user'];
    if(isset($_POST['update_profile'])){
        $con = mysqli_connect("localhost", "root", "", "uiucms");
        $name = $_POST['name'];
        $email = $_POST['email'];
        $bio = $_POST['bio'];
        $fb = $_POST['fb'];
        $linked_in = $_POST['lnk'];
        $git = $_POST['git'];
        $pweb = $_POST['pweb'];
        $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`bio`='$bio',`fb`='$fb',`linked_in`='$linked_in',`git`='$git',`personal_web`='$pweb' WHERE `id` = '$user'";
        $con->query($sql);
        header("location: settings.php");
    }
?>