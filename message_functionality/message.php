<?php
    session_start();
    $user = "011191156";
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $sql = "SELECT DISTINCT(person_to) FROM message WHERE person_to != '$user'";
    $result = $con->query($sql);

    $conversation_user = $_REQUEST['conversation_user'];
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.css" rel="stylesheet" />
    <title>Messenger</title>
</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap');

        * {
            font-family: 'Source Sans Pro', sans-serif;
        }
        body{
            background-color: #f2f2f2;
        }
        .navbar{
            background-color: #FFC000;
        }
        .search-button{
            border: none;
            background-color: transparent;
            padding-left: 2vh;
            color:rgba(0,0,0,.55);;
        }

        .main-conversation-box {
	        float: left;
	        width: 100%;
	        background-color: #fff;
	        position: relative;
	        border-right: 1px solid #e4e4e4;
	        border-bottom: 1px solid #cbc2c2;
            padding: 10px;
        }
        .usr-msg-details {
	        float: left;
	        position: relative;
	        width: 100%;
            padding-left: 10px;
        }       
        .usr-ms-img {
        	float: left;
        	width: 50px;
        	position: relative;
        }
        .usr-ms-img img {
	        width: 100%;
	        -webkit-border-radius: 100px;
	        -moz-border-radius: 100px;
	        -ms-border-radius: 100px;
	        -o-border-radius: 100px;
	        border-radius: 100px;
        }
        .usr-mg-info {
        	float: left;
        	padding-left: 13px;
        	margin-top: 16px;
        }
        .usr-mg-info h3 {
        	color: #000000;
        	font-size: 18px;
        	font-weight: 600;
        }
        .main-chat-portion{
            width: 100%;
            height: 480px;
            background-color: white;
            border-bottom: 1px solid #cbc2c2;
            overflow-y: scroll;
        }
        .message-send-area {
        	float: left;
        	width: 100%;
        	background-color: #f3f5f7;
        	padding: 25px 20px 15px 20px;
        	border: 1px solid #eeeeee;
        }
        .message-send-area form {
        	width: 100%;
        }
        .mf-field {
        	width: 100%;
        }
        .mf-field input {
        	float: left;
        	width: 92%;
        	background-color: #fff;
        	color: #b2b2b2;
        	font-size: 16px;
        	padding: 0 15px;
        	border: 1px solid #e6e6e6;
        	height: 45px;
        }
        .mf-field button {
        	float: left;
        	width: 5%;
        	background-color: #FFC000;
        	height: 45px;
        	text-align: center;
        	color: #fff;
        	font-weight: 600;
        	border: 0;
        	margin-left: 15px;
        	cursor: pointer;
        }
        .msg-threads{
            border-bottom: 1px solid #cbc2c2;
            width: 500px;
        }
        .msg-threads h5{
            padding: 10px;
            padding-left: 15px;
        }
        .background-msg{
            width: 500px;
        }
        .background-msg img{
            padding-right: 2vh;
        }

    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-orange bg-opacity-30" >
        <div class="container justify-content-between">
            <div class="d-flex">
                <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="#">
                    <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="20"
                        alt="MDB Logo" loading="lazy" style="margin-top: 2px;" />
                </a>

                <form class="input-group w-auto my-auto d-none d-sm-flex" action="search-result.php" method="POST">
                    <input type="search" class="form-control rounded" placeholder="Search" style="min-width: 125px;" />
                    <button class="search-button" name="search-trigger"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <ul class="navbar-nav flex-row">

                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="#">
                        <span><i class="fas fa-home fa-lg"></i></span>
                    </a>
                </li>

                <li class="nav-item dropdown me-3 me-lg-1">
                    <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-comments fa-lg"></i>
                    </a>
                    <ul class="background-msg dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">

                        <div class="msg-threads">
                            <h5> <strong>Message Threads</strong> </h5>
                        </div>

                        <?php
                            if(mysqli_num_rows($result) == 0){
                                ?>
                                <div class="no-conversation-found">
                                    <strong class="d-flex justify-content-center"><p class="text-center text-wrap fw-bold" style="width: 15rem;">No converastion started. Find people to communicate</p></strong>
                                </div>
                                <?php
                            }
                            else{
                                while($rows = mysqli_fetch_array($result)){
                                    extract($rows);
                                    $user_sql = "SELECT * FROM users WHERE id = '$person_to'";
                                    $result_user = $con->query($user_sql);
                                    while($rows_2 = mysqli_fetch_array( $result_user )){
                                        extract($rows_2);
                                        
                                    ?>
                                        <li><a class="dropdown-item" href="message.php?conversation_user=<?php echo $id ?>">
                                        <img src="<?php echo $profile_pic ?>" class="rounded-circle" height="50"
                                            alt="user picture" loading="lazy" /><strong><?php echo $name?></strong></a></li>
                                    <?php                                    
                                    }
                                }
                            }
                            
                        ?>
                    </ul>
                </li>


                
                
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <?php

                        $main_user_sql = "SELECT * FROM users WHERE id = '$user'";
                        $main_user_result = $con->query($main_user_sql);
                        while($rows = mysqli_fetch_array( $main_user_result )){
                            extract($rows);
                            ?>
                                <img src="<?php echo $profile_pic ?>" class="rounded-circle" height="25"
                                        alt="user image" loading="lazy" />
                            <?php                                    
                            }
                    ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#" style="font-size: 16px;"><i class="fas fa-user-alt" style="margin-right: 7px;"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#" style="font-size: 16px;"><i class="fas fa-cog" style="margin-right: 7px;"></i>Settings</a></li>
                        <li><a class="dropdown-item" href="#" style="font-size: 16px;"><i class="fas fa-sign-out-alt" style="margin-right: 7px;"></i>Logout</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>

    <input type="hidden" id = "fromUser" name="" value = "<?php echo $user ?>">
    <input type="hidden" id = "toUser" name="" value = "<?php echo $conversation_user ?>">

    <div class="container mt-4">
        <div class="messages-sec">
            <div class="row">
                <div class="col-lg-12 col-md-12 pd-right-none pd-left-none">
                    <div class="main-conversation-box">
                        <div class="usr-msg-details">
                        <?php

                            $main_user_sql = "SELECT * FROM users WHERE id = '$conversation_user'";
                            $main_user_result = $con->query($main_user_sql);
                            while($rows = mysqli_fetch_array( $main_user_result )){
                            extract($rows);
                            ?>
                                <div class="usr-ms-img">
                                    <img src="<?php echo $profile_pic ?>" alt="">
                                </div>
                                <div class="usr-mg-info">
                                    <h3><?php echo $name?></h3>
                                </div>
                            <?php                                    
                            }
                        ?>
                        </div>
                    </div>
                    <div class="main-chat-portion">
                        
                        
                        <div class="container-fluid mt-3" id="message-area">
                            
                            
                        </div>
                        
                    </div>
                    <div class="message-send-area">
                        <div class="mf-field">
                            <input type="text" name="message" id="message" placeholder="Type a message here">
                            <button type="submit" id="send" name ="send"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src = "https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#send").on("click", function(){
                $.ajax({
                    url: "insertMessage.php",
                    method: "POST",
                    data:{
                        fromUser: $("#fromUser").val(),
                        toUser: $("#toUser").val(),
                        message: $("#message").val()
                    },
                    dateType:"text",
                    success:function(data){
                        $("#message").val(" ");
                    }
                });
            });
            
        });
    </script>
</body>

</html>