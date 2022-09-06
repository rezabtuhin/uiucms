<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="./css/animate.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="./css/line-awesome-font-awesome.min.css">
    <link href="./css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="./css/slick.css">
    <link rel="stylesheet" type="text/css" href="./css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/responsive.css">
    <script src="https://kit.fontawesome.com/b80eba6c42.js" crossorigin="anonymous"></script>
</head>

<body class="sign-in" data-new-gr-c-s-check-loaded="14.1073.0" data-gr-ext-installed="">
    <div class="wrapper">
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo">
                                    <h3><img src="./images/login_cms_logo_2.png" alt="" width=300></h3>
                                    <!-- <h3 style="font-weight: 700; font-size:20px;"> <b>UIU Club Management System</b> </h3> -->
                                    <p>UiU Club Management System is a platform which represents all the clubs and forums of UIU</p>
                                </div>
                                <img src="./images/cm-main-img_2.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="login-sec">

                                <div class="sign_in_sec current" id="tab-1">
                                    <h3>Log In</h3>
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" name="username" placeholder="Username">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" name="password" placeholder="Password">
                                                    <i class="fa-solid fa-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd text-center">
                                                <h4 id="error_msg" style="color: red;"></h4>
                                            </div>

                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit" name="submit">Log In</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        $username = $_POST['username'];
                                        $password = $_POST['password'];
                                        $con = mysqli_connect("localhost", "root", "", "uiucms");
                                        $sql = "SELECT * FROM users WHERE id = '$username' AND pass = '$password'";
                                        $result = $con->query($sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            $role_res = mysqli_fetch_array($result);
                                            $_SESSION['user'] = $username;
                                            $_SESSION['role'] = $role_res['role'];
                                            header("location: home.php");
                                        } else {
                                    ?>
                                            <script>
                                                const error_note = document.getElementById("error_msg");
                                                error_note.innerHTML = "Username or Password is incorrect";
                                            </script>
                                    <?php
                                        }
                                    }

                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript" src="./login_files/jquery.min.js.download"></script>
    <script type="text/javascript" src="./login_files/popper.js.download"></script>
    <script type="text/javascript" src="./login_files/bootstrap.min.js.download"></script>
    <script type="text/javascript" src="./login_files/slick.min.js.download"></script>
    <script type="text/javascript" src="./login_files/script.js.download"></script>

</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>