<?php
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $fromUser = $_POST['fromUser'];
    $toUser = $_POST['toUser'];
    $output = "";
    

    $chats = mysqli_query($con, "SELECT * FROM `message` WHERE (person = '$fromUser' AND person_to = '$toUser') OR (person = '$toUser' AND person_to = '$fromUser')")
    or die("Failed ".mysql_error());
    while($chat = mysqli_fetch_assoc($chats)){
        if($chat['person'] == $fromUser){

            $output.=  '<div class="text-right mb-2">
                            <spa class="badge badge-warning text-wrap text-left p-2" style="font-size:18px; border-radius:12px 12px 0 12px; font-weight:500; color: white; max-width: 300px">'.$chat['message'].'</span>
                        </div>';
        }
        else{
            $output.=  '<div class="mb-2">
                            <span class="badge badge-secondary text-wrap text-left p-2" style="font-size:18px; border-radius:12px 12px 12px 0px; font-weight:500; color: white; max-width: 300px">'.$chat['message'].'</span>
                        </div>';
        }
    }
    echo $output;
    $output = "";
?>