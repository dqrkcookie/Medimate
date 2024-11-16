<?php
    
    include("../config/connect.php");

    require("../config/session.php");

    $a = $b = $c = $d = $e = $f = $g = $h = $i = "";
    $num = $_SESSION["contact"];
    $patient_info = array($a, $b, $c, $d, $e, $f, $g, $h, $i);

        if(isset($_POST["sub"])){
            if(!array_filter($patient_info)){
                $a = mysqli_real_escape_string($connect, $_POST["email"]);
                $b = mysqli_real_escape_string($connect, $_POST["password"]);
                $c = mysqli_real_escape_string($connect, $_POST["name"]);
                $d = mysqli_real_escape_string($connect, $_POST["gender"]);
                $e = mysqli_real_escape_string($connect, $_POST["age"]);
                $f = mysqli_real_escape_string($connect, $_POST["status"]);
                $g = mysqli_real_escape_string($connect, $_POST["birthday"]);
                $h = mysqli_real_escape_string($connect, $_POST["doct"]);
                $i = mysqli_real_escape_string($connect, $_POST["illness"]);
                $_SESSION["pic"];
                $_SESSION["am"];           
                $_SESSION["nm"]; 
                $_SESSION["pm"];

                $sqlP = "INSERT INTO med_patients(patientName, guardian_email, Gender, patientStatus,Email, passwordKey, birthdayP, doctorN, patientI, data_saved, dateCreated, ageP, user_photo, alarm_Am, alarm_Nn, alarm_Pm) VALUES ('$c', '$num', '$d', '$f', '$a', '$b', '$g', '$h', '$i', NOW(), NOW(), '$e', '{$_SESSION["pic"]}', '{$_SESSION["am"]}', '{$_SESSION["nm"]}', '{$_SESSION["pm"]}')";
//get data after editing profile

                foreach($_SESSION["db_main"] as $data){
                    if($data["Email"] === $_SESSION["Email"] && $data["passwordKey"] === $_SESSION["passwordKey"]){
                        $values = $data;
                        $em = $values["Email"];
                        $tableR = "DELETE FROM med_patients WHERE Email = '$em'";

                        if(!mysqli_query($connect, $tableR)){
                            echo "Error.";
                        }
                    }
                }

                if(mysqli_query($connect, $sqlP)){
                    header("Cache-Control: no-cache, no-store, must-revalidate");
                    header("Location: ../LOGIN/login.html");
                    header("Refresh: .3, url:http://localhost/Software_Design/Main/home.php?uploadsuccess");
                    die();
                } else {
                    echo "Error.";
                }
                
            } 

        }

        foreach($_SESSION["db_main"] as $data){
            if($data["Email"] === $_SESSION["Email"] && $data["passwordKey"] === $_SESSION["passwordKey"]){
                $values = $data;
                $_SESSION["name"] = $data["patientName"];
            }
// get the data of the matching email and password of the user after logging in            
        }

        $SESSION["get"] = $values;
        $guardian = $values["guardian_email"];
        $_SESSION["guardina_email"] = $guardian;
        
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home-style.css">
    <script>
        window.history.forward();
    </script>
</head>

<body>

    <button id="angy">Select</button>
    
    <div class="side-bar">
        <div id="grid">          
            <a id="chat"> Chat with Health Professionals </a>
            <a id="home" onclick="Menu()"> Home </a>
            <a id="set" onclick="Sched()"> Set Up Time </a>
            <a id="history" onclick="History()"> Medication History </a>
            <a id="profile" onclick="Profile()"> Profile </a>
            <a id="log-out" > Log Out </a>
        </div>
    </div>    

    <div class="content-1">
        <div class="welcome">
            <h1 id="wel"> Welcome to Medimate App </h1>
            <div class="orange">
                <img src="time.jpg" id="or" alt="">
            </div>
            <h1 id="greet"> Hello, I am Medimate your Personal Healtcare Companion. </h1>
        </div>       
    </div>

    <div class="content-2">
        <div class="set">
            <h1 id="sched"> Set up schedule </h1>
        </div>

        <div id="mainTime">
            <p id="cT"> Current Time: <span id="currentTime"> </span> </p>
        </div>

        <?php
        
            include("../config/connect.php");
        
            $Am = $values["alarm_Am"];
            $Nn = $values["alarm_Nn"];
            $Pm = $values["alarm_Pm"];

            if(isset($_POST["set"])){                    
                if(isset($_POST["am"], $_POST["nn"], $_POST["pm"])){

                        $am = $_POST["am"];
                        $nn = $_POST["nn"];
                        $pm = $_POST["pm"];

                        $Am = $am;
                        $_SESSION["am"] = $Am;
                        $Nn = $nn;
                        $_SESSION["nm"] = $Nn;
                        $Pm = $pm;
                        $_SESSION["pm"] = $Pm;
                        
                        $myslq = "UPDATE med_patients SET alarm_Am= '$am', alarm_Nn = '$nn', alarm_Pm = '$pm' where Email='{$values['Email']}' ";

                        if(!mysqli_query($connect, $myslq)){
                            echo "Update unsuccessfull";
                        } else {
 
                        }
                    
                    
                }
                
            }

            $amSched = $Am;
            $nnSched = $Nn; 
            $pmSched = $Pm; 

        ?>

        <div class="set-here">
            <form action="home.php" method="POST">
                <div class="morning">
                    <input type="time" id="set-time-m" name="am" value="<?php echo $amSched ?>">
                    <input type="text" name="amMeds" id="amMeds" placeholder="Medicine name">
                    <label for="set-time-m"> Set morning alarm </label>
                </div>
                    
                <div class="noon">
                    <input type="time" id="set-time-n" name="nn" value="<?php echo $nnSched ?>">
                    <input type="text" name="nnMeds" id="nnMeds" placeholder="Medicine name">
                    <label for="set-time-n"> Set afternoon alarm </label>
                </div>
                    
                <div class="evening">
                    <input type="time" id="set-time-e" name="pm" value="<?php echo $pmSched ?>">
                    <input type="text" name="pmMeds" id="pmMeds" placeholder="Medicine name">
                    <label for="set-time-e"> Set evening alarm </label>
                </div>

                <input type="submit" value="SET SCHEDULE" name="set" id="sub-sched">
            </form>   
        </div>
                
    </div>

    <div class="content-3">
        <div class="header">
            <h1 id="med-histo"> Medication History </h1>
        </div>

        <div class="history">
            <ul>
                <li id="one"> <span> </span> </li>
                <li id="two"> <span> </span> </li>
                <li id="three"> <span> </span> </li>
            </ul>   
        </div>

    </div>

    <div class="content-4">
        <h1 id="p-profile"> Your profile </h1>

        <div class="pic">       
            
            
        <?php
            include("../config/connect.php");

            $photo = $values["user_photo"];
            if(isset($_POST["up-photo"])){
                $file = $_FILES["get-photo"];
                $defaultPhoto = $values["user_photo"];
                // print_r($file);

                $fileName = $_FILES["get-photo"]["name"];
                $fileTmpName = $_FILES["get-photo"]["tmp_name"];
                $fileSize = $_FILES["get-photo"]["size"];
                $fileError = $_FILES["get-photo"]["error"];
                $fileType = $_FILES["get-photo"]["type"];
          
                // echo $fileName;
                $fileExt = explode(".", $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $allowed = array("jpg", "png", "jpeg", "gif");
                if(in_array($fileActualExt, $allowed)){
                    if($fileError === 0){
                        if($fileSize < 5000000){
                            $fileNewName = uniqid(",", true). "." . $fileActualExt;
                            $fileDir = "images/" . $fileNewName;
                            move_uploaded_file($fileTmpName, $fileDir);

                            $photo = $fileNewName;
                            $_SESSION["pic"] = $photo;

                            foreach($_SESSION["db_main"] as $sata){
                                if($sata["Email"] === $_SESSION["Email"] && $sata["passwordKey"] === $_SESSION["passwordKey"]){
                                    $results = $sata;
                                    $eml = $results["Email"];

                                    $tableP = "UPDATE med_patients SET user_photo = '$fileNewName' WHERE Email = '$eml'";   
                                    if(!mysqli_query($connect, $tableP)){
                                        echo "Error.";
                                    } 
                                }
                            }

                            header("Location: " . $_SERVER['PHP_SELF']);

                        } else{
                            echo ("File is too large.");
                        }
                    } else {
                        echo ("Error.");
                    }
                } else {
                    echo ("Cannot upload the file.");
                }
              
            }

            ?>

            <div>
                <?php $defaultPhoto = $photo; ?>
                <img src="images/<?php echo $defaultPhoto?>" alt="none" class="upload">
                <form id="picture" action="home.php" method="POST" enctype="multipart/form-data">  
                    <input type="file" accept=".jpg, .jpeg, .png, .gif" id="pic" name="get-photo">
                    <input type="submit" value="Upload now" id="up" name="up-photo">
                </form>
            </div>            
        </div>

        <div class="prof-info">
            <form action="home.php" method="POST">
                <div class="bord">
                    <div class="one">
                        <input id="a" type="text" name="name" value="<?php echo htmlspecialchars($values["patientName"]) ?>">
                        <label for="a"> Name </label>
                        <input id="b" type="text" name="gender" value="<?php echo htmlspecialchars($values["Gender"]) ?>">
                        <label for="b"> Gender </label>
                        <input id="c" type="number" name="age" value="<?php echo htmlspecialchars($values["ageP"]) ?>">
                        <label for="c"> Age </label>
                    </div>
                    
                    <div class="two">
                        <input id="d" type="text" name="status" value="<?php echo htmlspecialchars($values["patientStatus"]) ?>">
                        <label for="d"> Status </label>
                        <input id="e" type="date" name="birthday" value="<?php echo htmlspecialchars($values["birthdayP"]) ?>">
                        <label for="e"> Birthday </label>
                        <input id="f" type="text" name="doct" value="<?php echo htmlspecialchars($values["doctorN"]) ?>">
                        <label for="f"> Doctor's Name </label>
                    </div>
    
                    <div class="three">
                        <input id="g" type="text" name="illness" value="<?php echo htmlspecialchars($values["patientI"]) ?>">
                        <label for="g"> Patient's Issue </label>
                        <input id="h" type="text" name="email" value="<?php echo htmlspecialchars($values["Email"]) ?>">
                        <label for="h"> Email </label>
                        <input id="i" type="password" name="password" value="<?php echo htmlspecialchars($values["passwordKey"]) ?>">
                        <label for="i"> Password </label>
                    </div>

                    <div class="save">
                        <input type="submit" value="Save changes" id="pass" name="sub">
                        <input type="button" value="Edit profile" id="edit">
                    </div>  
                    
                </div>         
            </form>
        </div>
    </div>
    
    <div class="Sure">
        <div id="YoN">
            <h2 id="LO"> Log out of Medimate? </h2>
            <div id="buttonN">
                <button id="Y" name="log-out"> Yes </button>     
                <button id="N"> No </button>
            </div> 
        </div>
    </div>

    <div class="amNotify">

        <div id="head">
            <button id="exit" name="exit" type="submit"> X </button>
        </div> 
        
        
        <p id="amMessage"> Time to take your Medicine !!!
        </p>
        <button id="done" name="taken"> Done </button>
        
    </div>

    <script src="home.js"></script>
    <script src="alarm.js"></script>
    <script>
        let out = document.querySelector("#Y");
        out.onclick = function(){
            window.location.href = "../LOGIN/login.html";
        }
    </script>
</body>

</html>