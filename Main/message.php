<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        
        require("../config/session.php");
        $receiver = $_SESSION["guardina_email"];
        // echo $receiver;

        require '../vendor/autoload.php';
        
        $mail = new PHPMailer(true);
        
        try {
            $mail->isSMTP();
            $mail->Host       = "smtp.gmail.com"; 
            $mail->SMTPAuth   = true;
            $mail->Username   = "sumalpong2003@gmail.com"; 
            $mail->Password   = "cnxi cast wwlt gvdr"; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port       = 587; 
        
            $mail->setFrom("sumalpong2003@gmail.com", "Medimate"); 
            $mail->addAddress("$receiver", "Guardian"); 
            $mail->isHTML(true); 
            $mail->Subject = "Medication";
            $mail->Body    = "Good day,<br><br>We wanted to inform you that your son/daughter missed their scheduled medication today.";
            $mail->AltBody = "Good day,

            We wanted to inform you that your son/daughter missed their scheduled medication today.";
        
            $mail->send();
            echo "Email has been sent successfully!";
        } catch (Exception $e) {

            var_dump($e);

            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    ?>
