<?php
    session_start();
    $user = "011191156";
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $sql = "SELECT DISTINCT(person_to) FROM message WHERE person_to != '$user'";
    $result = $con->query($sql);
    
    // if(isset($_POST['search-trigger'])){
    //     $search_content = $_POST['searchValue'];
    // }

    
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
    <title>Search Result for "----"</title>
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
        .search-title{
            float: left;
	        width: 100%;
	        margin-bottom: 20px;
	        /* padding: 0 15px; */
        }
        .search-title h3{
            /* color: #000000; */
	        font-size: 20px;
	        font-weight: 600;
	        background-color: #fff;
	        padding: 10px 15px;
        }

        .companies-list {
            float: left;
            width: 100%;
            margin-bottom: -30px;
        }
        .company_profile_info {
            float: left;
            width: 100%;
            background-color: #fff;
            text-align: center;
            border-left: 1px solid #e4e4e4;
            border-right: 1px solid #e4e4e4;
            border-bottom: 1px solid #e4e4e4;
            margin-bottom: 30px;
        }
        .company-up-info {
            float: left;
            width: 100%;
            padding: 30px 0;
            border-bottom: 1px solid #e5e5e5;
        }
        .company-up-info img {
            float: none;
            margin-bottom: 10px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            -ms-border-radius: 100px;
            -o-border-radius: 100px;
            border-radius: 100px;
            height: 90px;
            object-fit: cover;
        }
        .company-up-info h3 {
            color: #000000;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .company-up-info h4 {
            color: #686868;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 21px;
        }
        .company-up-info ul {
            float: left;
            width: 100%;
        }
        .company-up-info ul li {
            display: inline-block;
            margin-right: 6px;
        }
        .company-up-info ul li a {
            display: inline-block;
            padding: 0 12px;
            color: #fff;
            height: 35px;
            line-height: 35px;
        }
        .company-up-info ul li a i {
            font-size: 24px;
            position: relative;
            top: 3px;
        }
        .follow {
            background-color: #53d690;
        }
        .message-us {
            background-color: #e44d3a;
        }
        .company_profile_info > a {
            display: inline-block;
            color: #000000;
            font-size: 16px;
            font-weight: 500;
            padding: 18px 0;
        }
        .search-button{
            border: none;
            background-color: transparent;
            padding-left: 2vh;
            color:rgba(0,0,0,.55);;
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
                    <img src="uiu.jpg" height="30"
                        alt="logo" loading="lazy" style="margin-top: 2px; border-radius:50%;" />
                </a>

                


                <form class="input-group w-auto my-auto d-none d-sm-flex" action="search-result.php" method="POST">
                    <input type="text" class="form-control rounded" name="searchValue" placeholder="Search" style="min-width: 125px;" />
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


    <div class="container">
        <div class="search-title my-5">
            <h3>Search result for "..."</h3>
        </div>

        <div class="companies-list">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="company_profile_info">
                        <div class="company-up-info">
                            <img src="images\pf-icon1.png" alt="">
                            <h3>Nola Rifat</h3>
                            <h4>Front end developer</h4>
                            <ul>
                                <li><a href="" title="" class="follow">Add</a></li>
                                <li><a href="" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                        <a href="" title=""
                            class="view-more-pro">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.3.0/mdb.min.js"></script>

</body>

</html>