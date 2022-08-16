<?php
    session_start();
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $con = mysqli_connect("localhost", "root", "", "uiucms");
        $sql = "SELECT * FROM users WHERE id = '$username' AND pass = '$password'";
        $result = $con->query($sql);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['user'] = $username;
            header("location: account_settings.php");
        }
    }
    
?>