<?php
require_once('inc/connect.php');
$msg="";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if(!isset($_POST["email"])) {
    $msg = "Please put your email in the box below";
} else {
    if($stmt = $con->prepare("SELECT * FROM users WHERE email = ? LIMIT 1")) {
        $stmt->bind_param('s', $_POST["email"]);
        $stmt->execute();
        $stmt->store_result();
        $stmt->fetch();
        if(!$stmt->num_rows > 0) {
            echo "The email that you have given does not exist in our database!";
        } else {
            $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
			$token = str_shuffle($token);
            $token = substr($token, 0, 10);
            
            if ($stmt = $con->prepare("INSERT INTO password_resets(email, token) VALUES (?,?)")) {
                $stmt->bind_param('ss', $_POST["email"], $token);
                $stmt->execute();
                $stmt->store_result();
                
            }
            try{
                $mail = new PHPMailer(true);
                            
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'mail.fantratic.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'noreply@fedexvirtual.cloud';                     // SMTP username
                $mail->Password   = 'lanekia18';                               // SMTP password
                $mail->Port       = 587;    
                
                $mail->setFrom("noreply@fedexvirtual.cloud", "fedexvirtual.cloud");
                $mail->addAddress($_POST["email"]);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = "Please reset password here: https://fedexvirtual.cloud/passwordreset.php?token={$token}";
                $mail->send();
            
            } catch (Exception $e) {
                echo "Message not sent. Error: {$mail->ErrorInfo}";
            }
                
        }
    }
    
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset | Sky Cargo Virtual</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

				<img src="https://logodix.com/logo/2087366.jpg"><br><br>

				<?php if ($msg != "") echo $msg . "<br><br>" ?>

				<form method="post" action="reset.php">
					
					<input class="form-control" name="email" type="email" placeholder="Email..."><br>
					<input class="btn btn-primary" type="submit" name="submit" value="Register">
				</form>

			</div>
		</div>
	</div>
</body>
</html>