


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b80eba6c42.js" crossorigin="anonymous"></script>
</head>
<style>
    .wrapper {
	float: left;
	width: 100%;
	position: relative;
    }
    .sign-in {
	    background-color: #ffc000;
    }
    .sign-in-page {
	    float: left;
	    width: 100%;
	    padding: 100px 0 20px 0;
    }
    .signin-popup {
    	width: 870px;
    	margin: 0 auto;
    	position: relative;
    }
    .signin-popup:before {
    	content: '';
    	position: absolute;
    	top: -16px;
    	left: 56px;
    	width: 30px;
    	height: 30px;
    	background-color: #fff;
    	-webkit-border-radius: 100px;
    	-moz-border-radius: 100px;
    	-ms-border-radius: 100px;
    	-o-border-radius: 100px;
    	border-radius: 100px;
    }
    .signin-popup:after {
    	content: '';
    	position: absolute;
    	top: -37px;
    	left: 43px;
    	width: 20px;
    	height: 20px;
    	background-color: #fff;
    	-webkit-border-radius: 100px;
    	-moz-border-radius: 100px;
    	-ms-border-radius: 100px;
    	-o-border-radius: 100px;
    	border-radius: 100px;
    }

    .signin-pop {
	float: left;
	width: 100%;
	background-color: #fff;
	position: relative;
    -webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	-ms-border-radius: 4px;
	-o-border-radius: 4px;
	border-radius: 3px;
    }
    .signin-pop:before {
    	content: '';
    	position: absolute;
    	top: 0;
    	left: 50%;
    	-webkit-transform: translateX(-50%);
    	-moz-transform: translateX(-50%);
    	-ms-transform: translateX(-50%);
    	-o-transform: translateX(-50%);
    	transform: translateX(-50%);
    	height: 100%;
    	width: 1px;
    	background-color: #f0f0f0;
    }
    .cmp-info {
	float: left;
	width: 100%;
	padding: 70px 5px 92px 5px;
    }
    .cm-logo {
    	float: left;
    	width: 100%;
    	padding-left: 45px;
    	margin-bottom: 120px;
    }
    .cm-logo img {
    	margin-bottom: 30px;
    }
    .cm-logo > p {
    	color: #666666;
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
        float: left;
        width: 100%;
    }
    .cmp-info > img {
    	width: 100%;
    	padding-left: 10px;
    }

    .login-sec {
        float: left;
        width: 100%;
        padding: 120px 0;
        position: relative;
    }
    .login-sec:before {
    	content: '';
    	position: absolute;
    	bottom: -15px;
    	right: 70px;
    	width: 30px;
    	height: 30px;
    	-webkit-border-radius: 100px;
    	-moz-border-radius: 100px;
    	-ms-border-radius: 100px;
    	-o-border-radius: 100px;
    	border-radius: 100px;
    	background-color: #fff;
    }
    .login-sec:after {
    	content: '';
    	position: absolute;
    	bottom: -40px;
    	right: 55px;
    	width: 20px;
    	height: 20px;
    	-webkit-border-radius: 100px;
    	-moz-border-radius: 100px;
    	-ms-border-radius: 100px;
    	-o-border-radius: 100px;
    	border-radius: 100px;
    	background-color: #fff;
    }
    .sign_in_sec {
    	float: left;
    	width: 100%;
    	padding-right: 75px;
    	padding-left: 60px;
    	display: none;
    }
    .sign_in_sec.current {
    	display: block;
    }
    .sign_in_sec h3 {
    	color: #000000;
    	font-size: 18px;
    	font-weight: 600;
    	position: relative;
    	padding-bottom: 10px;
    	margin-bottom: 30px;
    }
    .sign_in_sec h3:before {
    	content: '';
    	position: absolute;
    	bottom: 0;
    	left: 0;
    	width: 30px;
    	height: 2px;
    	background-color: #ffc000;
    }
    .sign_in_sec form {
    	float: left;
    	width: 100%;
    }

    .sn-field {
    	float: left;
    	width: 100%;
    	margin-bottom: 20px;
    	position: relative;
    }
    .sn-field.pd-more {
    	margin-bottom: 0;
    }
    .sn-field.pd-more input {
    	padding-left: 40px;
    }
    .sn-field > i {
    	position: absolute;
    	top: 50%;
    	left: 15px;
    	color: #666666;
    	font-size: 16px;
    	-webkit-transform: translateY(-50%);
    	-moz-transform: translateY(-50%);
    	-ms-transform: translateY(-50%);
    	-o-transform: translateY(-50%);
    	transform: translateY(-50%);
    }
    .sn-field > span {
    	position: absolute;
    	top: 50%;
    	right: 15px;
    	font-weight: 700;
    	color: #666666;
        font-size: 15px;
    	-webkit-transform: translateY(-50%);
    	-moz-transform: translateY(-50%);
    	-ms-transform: translateY(-50%);
    	-o-transform: translateY(-50%);
    	transform: translateY(-50%);
    }
    .sign_in_sec form input {
    	height: 40px;
    }
    .sign_in_sec form input,
    .sign_in_sec form select {
    	width: 100%;
    	padding: 0 15px 0 40px;
    	color: #b2b2b2;
    	font-size: 14px;
    	border:1px solid #e5e5e5;
    }
    .sign_in_sec form select {
    	line-height: 40px;
    	height: 40px;
    }
    .sign_in_sec form button {
    	color: #ffffff;
    	font-size: 16px;
    	background-color: #ffc000;
    	padding: 12px 27px;
    	border:0;
    	font-weight: 500;
    	margin-top: 30px;
    	cursor: pointer;
    }

</style>
<body class="sign-in" data-new-gr-c-s-check-loaded="14.1073.0" data-gr-ext-installed="">
    <div class="wrapper">
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo">
                                    <h3 style="font-size:18px;font-weight:700;"> <strong> UIU Club Management System </strong></h3>
                                    <hr>
                                    <p>UiU Club Management System is a platform which represents all the clubs and forums of UIU</p>
                                </div>
                                <img src="./login_files/cm-main-img.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="login-sec">
                                
                                <div class="sign_in_sec current" id="tab-1">
                                    <h3>Log In</h3>
                                    <form action="login_verification.php" method="post">
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
                                            
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit" name="submit">Log In</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>