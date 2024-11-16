<?php

    header("Access-Control-Allow-Origin: *");
    include("../config/connect.php");   
    include("../health-center/data.php");

    $mysql = "SELECT * FROM med_patients ORDER BY ID";

    $result = mysqli_query($connect, $mysql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($data as $ins){
        $number = $ins["guardian_email"];
        $_SESSION["contact"] = $number;
        $_SESSION["names"] = $ins["patientName"];
    }

    $ins = "";
    $number = "";

    $_SESSION["db_main"] = $data;

    $email = isset($_POST["email"]) ? $_POST["email"]: "";
    $pass = isset($_POST["password"]) ? $_POST["password"]: "";

    $_SESSION["Email"] = $email;
    $_SESSION["passwordKey"] = $pass;

    $loginState = false;

    for($p = 0; $p < count($data); $p++){
        if($data[$p]["Email"] === $email && $data[$p]["passwordKey"] === $pass){
            $loginState = true;
            break;                
            }
               
    }

    if(isset($_POST["continue"])){
        if($loginState){
            header("Cache-Control: no-cache, no-store, must-revalidate");
            header("Location: ../Main/home.php");
            exit();
        } else if ($email === $who["name"] && $pass === $who["passkey"]){
            header("Location: ../health-center/chat-center.html");
        }else {
            header("Refresh: .3; url=login.html");
        };
    }

    foreach($_SESSION["db_main"] as $data){
        if($data["Email"] === $_SESSION["Email"] && $data["passwordKey"] === $_SESSION["passwordKey"]){
            $values = $data;
        }    
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <style>
        body{
            background-color: black;
        }

        div{
            height: 15%;
            width: 30%;
            background-color: whitesmoke;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div> <h6> Invalid </h6> </div>
</body>
</html>