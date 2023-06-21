<?php
include('connection.inc.php');
include('MainFunctions.php');
include("confidentials.php");
include("../smtp/PHPMailerAutoload.php");
$mail = new PHPMailer;
$userEmail = $_POST['userEmail'];

function sendEmail ($mail, $conn, $email_add, $email_password, $smtp_address, $smtp_port, $userEmail) {
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $check_username = mysqli_query($conn, "SELECT * From users WHERE email='$userEmail'");
        if (mysqli_num_rows($check_username)) {

            define('SMTP_EMAIL', $email_add);
            define('SMTP_PASSWORD', $email_password);
    
            // $mail->IsMail();
            // $mail->IsSendmail();
    
            $mail->isSMTP();
            // $mail->Host = 'smtpout.secureserver.net';       // Set mailer to use SMTP 
            // $mail->Host = 'smtp.gmail.com';      
            $mail->Host = $smtp_address;                   // Specify main and backup SMTP servers 
            $mail->SMTPAuth = true;                         // Enable SMTP authentication 
            $mail->Username = SMTP_EMAIL;                   // SMTP username 
            $mail->Password = SMTP_PASSWORD;                // SMTP password 
            $mail->SMTPSecure = 'tls';                      // Enable TLS encryption, `ssl` also accepted 
            $mail->Port = $smtp_port;   //587                           // TCP port to connect to 
            //$mail->SMTPDebug = 1;
    
            // Sender info 
            $mail->setFrom($email_add, 'LPU MART - Enally');
            $mail->addReplyTo($email_add, 'LPU MART - Enally');
            // $mail->SetFrom('donotreply@mydomain.com', 'Admin');
    
            // Add a recipient 
            $mail->addAddress($userEmail);
    
            // CC or BBC handler
            //$mail->addCC('cc@example.com'); 
            //$mail->addBCC('bcc@example.com'); 
    
            // Set email format to HTML 
            $mail->isHTML(true);
    
            // Email Priority
            $mail->Priority = 'High';
    
            // Mail subject 
            $mail->Subject =  'LPU MART OTP - Enally.in';
    
            //$bodyContent = 'Hello';
    
            // Mail body content 
            $bodyContent = '<h2> Hello  ' . $userEmail .'  </h2> <br><br>
            <p>Your account has been created successfully. You can now buy, sell & rent product on LPU MART.</p>
            
            
            <br><br>
            <h4>Kind Regard</h4>
            <p>LPU MART</p>
            ';
            $mail->Body    = $bodyContent;
    
            if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo "success";
            }
            
        } else {
            echo "Your email doesn't exit or Something went wrong. Please try again.";
            
        }
        // Send email 
    
    } else {
        echo "Please enter a valid email";
    }
}


sendEmail ($mail, $conn, $email_add, $email_password, $smtp_address, $smtp_port, $userEmail);


