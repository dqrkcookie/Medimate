<?php

    include("../config/connect.php");
    require("../config/session.php");

    if(isset($_POST["submit"])){

    }

    $name = "";
    $number  = "";
    $gender  =  "";
    $status  =  "";
    $email  =  "";
    $password  =  "";

    $check = [$name, $number, $gender, $status, $email, $password];

    if(isset($_POST["submit"])){
        if(!array_filter($check)){
            $name = mysqli_real_escape_string($connect, $_POST["name"]);
            $number  = mysqli_real_escape_string($connect, $_POST["number"]);
            $gender  =  mysqli_real_escape_string($connect, $_POST["gender"]);
            $status  =  mysqli_real_escape_string($connect, $_POST["status"]);
            $email  =  mysqli_real_escape_string($connect, $_POST["email"]);
            $password  =  mysqli_real_escape_string($connect, $_POST["password"]);

            $sql = "INSERT INTO med_patients(patientName, guardian_email, Gender, patientStatus, Email, passwordKey, dateCreated) VALUES ('$name', '$number', '$gender', '$status', '$email', '$password', NOW())";
               
            if (!mysqli_query($connect, $sql)){
                    echo "error: " . mysqli_error($connect);
            } else{
                header("Cache-Control: no-cache, no-store, must-revalidate");
                header("Location: ../LOGIN/login.html");
                die();
            }

        }
    }

?>   

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="regis-style.css">
</head>

<body>

    <div class="regis-border">

        <div class="mouse">
            <img id="pix" src="band-aid.jpg"/>
            <h3 id="lets"> Let's get you set up</h3>
            <span id="mess"> It should only take a couple of minutes <br/> setting up your account </span>
            <hr/>
            <input type="button" value="Start" id="back">
            <img src="flower-cat.webp" id="kawaii">
        </div>

        <form action="http://192.168.1.2:8989/Medimate-mobile/Medimate/www/Register/registration.php" method="POST">
            <h3 id="text"> Sign Up Form </h3>
            
            <label for="name"> Name: </label>
            <input type="text" required id="name" name="name" value="<?php echo htmlspecialchars($name) ?>">

            <br/>
            
            <label for="patient-num"> Guardian email: </label>
            <input type="email" required id="patient-num" name="number" value="<?php echo htmlspecialchars($number) ?>">    

            <select id="gender" required name="gender" value="<?php echo htmlspecialchars($gender) ?>">
                <option value="" disabled selected> Select Gender </option>
                <option> Male </option>
                <option> Female </option>
            </select>
            
            <label for="chec"> Single </label>
            <input type="checkbox" id="chec" name="status" value="Single">

            <label for="box"> Married </label>
            <input type="checkbox" id="box" name="status" value="Married">

            <label for="email"> Email: </label>
            <input type="email" required id="email" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <br/>
            <label for="pass-c"> Password: </label>
            <input type="password" id="pass-c" required name="password" value="<?php echo htmlspecialchars($password) ?>">

            <input type="submit" value="Save" id="submit" name="submit">
        </form>

        <script src="regis.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
            function register(){
                fetch("http://192.168.1.2:8989/Medimate-mobile/Medimate/www/Register/registration.php")
                  .then(response => response.text())
                  .then(data => {
                      console.log(data);
                  })
                  .catch(error => {
                      console.error('Error:', error);
                  });
            }
            
            window.onload = function() {
                register();
            };
        </script>
    </div>

</body>

</html>