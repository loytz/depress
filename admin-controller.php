<?php
include ('connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'login-form/PHPMailer/src/Exception.php';
require 'login-form/PHPMailer/src/PHPMailer.php';
require 'login-form/PHPMailer/src/SMTP.php';

if(isset($_POST['email_verification_code']))
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
        $mail->addAddress( $_POST['new_admin_email'], 'Admin'); //Add a recipient
        $mail->addAddress($_POST['new_admin_email']); //Name is optional

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'AMHC Verification Code';
        $mail->Body = '
            <html>
            <head>
            <title>AMHC Verification Code</title>
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
                <h4>Hello ' . $_POST['new_admin_email'] . ',</h4>
                <p>This is your email verification code:</p>
                <div class="code">' . $_POST['email_verification_code'] . '</div>
            </div>
            </body>
            </html>
        ';

        $mail->send();
        echo 'Email code has been sent.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if(isset($_POST['verifyPassword']))
{
    $verifyPassword = encrypt_decrypt('encrypt', $_POST["verifyPassword"]);


    // Validate user credentials
    $sql = "SELECT * FROM admin WHERE password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $verifyPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // User found
        echo "Password verified.";

    } else {
        // User not found
        echo "Passwords do not match.";
    }

    $stmt->close();
    $conn->close();
}

if(isset($_POST['change_email_now']))
{
    $new_admin_email= $_POST['new_admin_email'];
    $admin_password= encrypt_decrypt('encrypt',  $_POST['admin_password']);

    $sql = "UPDATE `admin` SET `email` ='$new_admin_email' WHERE  `password`= '$admin_password'";

    if ($conn->query($sql) === TRUE)
    {
        echo 'Email change successful.';
        $_SESSION['user_email'] = $new_admin_email;
    }
    else
    {     
        echo 'Email change unsuccessful. Please try again.';
    }
}

if(isset($_POST['change_password_now']))
{
    $old_password= encrypt_decrypt('encrypt',  $_POST['old_password']);
    $new_password= encrypt_decrypt('encrypt',  $_POST['new_password']);

    $sql = "UPDATE `admin` SET `password` ='$new_password' WHERE  `password`= '$old_password'";

    if ($conn->query($sql) === TRUE)
    {
        echo 'Password change successful.';
    }
    else
    {     
        echo 'Password change unsuccessful. Please try again.';
    }
}

if(isset($_POST['change_adminDetails_now']))
{
    $admin_password= encrypt_decrypt('encrypt',  $_POST['admin_password']);
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $occupation= $_POST['occupation'];

    $sql = "UPDATE `admin` SET `first_name`='$fname',`middle_name`='$mname',`last_name`='$lname',`occupation`='$occupation' WHERE  `password`= '$admin_password'";

    if ($conn->query($sql) === TRUE)
    {
        $_SESSION['first_name'] = $fname;
        $_SESSION['middle_name'] = $mname;
        $_SESSION['last_name'] = $lname;
        $_SESSION['occupation'] = $occupation;

        echo 'Admin details change successful.';
    }
    else
    {     
        echo 'Admin details change unsuccessful. Please try again.';
    }
}
?>