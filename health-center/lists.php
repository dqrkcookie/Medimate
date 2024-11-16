<?php
    require("../config/session.php");
    require("../config/connect.php");

    $mysql = "SELECT * FROM med_patients ORDER BY ID";

    $result = mysqli_query($connect, $mysql);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($data as $ins){
        echo "<div style='border: 1px solid #949398ff; border-radius: 15px; display: flex;justify-content: center; margin-bottom: 1px'>". $ins["Gender"] . ": " . $ins["patientName"] ."</div>";
    }

?>