<?php
    include("../config/session.php");

    $host = "localhost:3307";
    $email = "administrator";
    $password = "MedimatE";
    $db_name = "medicine"; 

    $conn = mysqli_connect($host, $email, $password, $db_name);

    if(!$conn){
        echo "error";
    }

    $sql = "SELECT * FROM health_center";

    $result = mysqli_query($conn, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($data as $who){
        $_SESSION["center"] = $who["name"];
        $_SESSION["key"] = $who["passkey"];
    }
    
    mysqli_close($conn);

?>