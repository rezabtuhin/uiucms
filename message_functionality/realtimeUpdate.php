<?php
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $fromUser = $_POST['fromUser'];
    $toUser = $_POST['toUser'];
    $output = "";
    

    $chats = mysqli_query($con, "SELECT * FROM `message` WHERE (person = '$fromUser' AND person_to = '$toUser') OR (person = '$toUser' AND person_to = '$fromUser')")
    or die("Failed ".mysql_error());
    while($chat = mysqli_fetch_assoc($chats)){
        if($chat['person'] == $fromUser){
            $output.= '<div class="d-flex justify-content-end mt-1">
                            <div class="d-block right-msg">
                                <p class="badge rounded-pill text-wrap text-start" style="font-size: 17px; padding: 10px 15px; font-weight:500; background-color: #FFC000; width: auto; max-width: 30rem;">'.$chat['message'].'</p>
                            </div>
                        </div>';
        }
        else{
            $output.='<div class="left-msg my-1 d-flex align-items-center">
                            <img src="img1.png" alt="" width="50" style="border-radius: 50%; margin-top: -20px;">
                            <p class="badge rounded-pill text-wrap text-start ms-2" style="font-size: 17px; padding: 10px 15px; font-weight:500; background-color: #efefef; color: #686868; width: auto; max-width: 30rem;">'.$chat['message'].'</p>
                    </div>';
        }
    }
    echo $output;
    $output = "";
?>