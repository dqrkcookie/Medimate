<?php

    require("../config/session.php");

    $servername = "localhost:3307";
    $username = "administrator";
    $password = "MedimatE";
    $db_name = "chat";

    $connect = mysqli_connect($servername, $username, $password, $db_name);

    if(!$connect){
        exit("connect failed");
    }

    $sql = "SELECT messages, time_sent FROM chatbox";
    $result = mysqli_query($connect, $sql);

    if($result->num_rows > 0){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach($data as $sms){
            echo "<div style='border: 1px solid black; padding: 2px; background-color: yellow; border-radius: 10px;'>".$sms["messages"]. "<br>". $sms["time_sent"] ."</div> <br>";
        }         
    } else {
        echo "Send a message to start a chat.";
    }
    
    mysqli_close($connect);

?>