<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include ("../connect.php");
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['forgot']))
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP(); //Send using SMTP
        $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth   = true; //Enable SMTP authentication
        $mail->Username   = 'advancementalhealth09@gmail.com'; //SMTP username
        $mail->Password   = 'wsyswkiqfbcramrp';  //SMTP password
        $mail->SMTPSecure =  'ssl'; //Enable implicit TLS encryption
        $mail->Port       = 465;  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('advancementalhealth09@gmail.com', 'Advance Mental Health Care');
        $mail->addAddress( $_POST['admin_gmail'], 'Admin'); //Add a recipient
        $mail->addAddress($_POST['admin_gmail']); //Name is optional

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'AMHC Password Reset Code';
        $mail->Body = '
            <html>
            <head>
            <title>AMHC Password Reset Code</title>
            <style>
                body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                }
                .container {
                width: 60%;
                margin: 20px auto;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                h4 {
                color: #333333;
                }
                p {
                color: #555555;
                }
                .code {
                background-color: #e0e0e0;
                padding: 10px;
                font-size: 18px;
                border-radius: 4px;
                margin-top: 10px;
                }
            </style>
            </head>
            <body>
            <div class="container">
                <h4>Hello ' . $_POST['admin_gmail'] . ',</h4>
                <p>This is your password reset code:</p>
                <div class="code">' . $_POST['reset_code'] . '</div>
            </div>
            </body>
            </html>
        ';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if(isset($_POST['reset_now']))
{
    $forgot_email_field= $_POST['forgot_email_field'];
    $new_password= encrypt_decrypt('encrypt',  $_POST['new_password']);

    $sql = "UPDATE `admin` SET `password` ='$new_password' WHERE  `email`= '$forgot_email_field'";

    if ($conn->query($sql) === TRUE)
    {
        echo 'Password reset successful.';
    }
    else {     
      
        echo 'Password reset unsuccessful. Please try again.';
    }
}

?>