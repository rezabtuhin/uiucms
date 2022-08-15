<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $fromUser = $_POST['fromUser'];
    $toUser = $_POST['toUser'];
    $message = $_POST['message'];

    $sql = "INSERT INTO message(person, person_to, message)
    VALUES ('$fromUser', '$toUser', '$message')";
    $con->query($sql);
?>