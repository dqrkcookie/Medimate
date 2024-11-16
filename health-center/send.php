<?php
    include("../config/session.php");

    $servername = "localhost:3307";
    $username = "administrator";
    $password = "MedimatE";
    $db_name = "chat";
    $input = $_POST["msgs"];
    $healthcare = $_SESSION["center"];

    $connect = mysqli_connect($servername, $username, $password, $db_name);

    if($connect){
        echo ("connected");
    }else{
        exit("connect failed");
    }

    $sql = "INSERT INTO chatbox (messages, time_sent) VALUES ('$healthcare: $input', NOW())";

    if(mysqli_query($connect, $sql)){
        header("Location: chat-center.html");
    } else {
        echo "Error: ". $sql. "<br>". mysqli_error($connect);
    }

    mysqli_close($connect);
    
?>