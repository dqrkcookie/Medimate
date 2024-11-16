<?php

    $credentials = ["host" => "localhost:3307", "email" => "administrator", "password" => "MedimatE", "db_name" => "medimate"];

    $connect = mysqli_connect($credentials["host"], $credentials["email"], $credentials["password"], $credentials["db_name"]);

    if($connect){
        // echo ("connected now to DB");
    }
?>