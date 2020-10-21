<?php


require_once('inc/connect.php');
require_once './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$msg = "";

	if (isset($_POST['submit'])) {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cPassword = $_POST['cPassword'];
		$discord = $_POST['discord'];
        $isEmailConfirmed = 0;

		if ($name == "" || $email == "" || $password != $cPassword || $discord == "")
			$msg = "Please check your inputs!";
		else {
            if ($sql = $con->prepare('SELECT * FROM users WHERE email = ? LIMIT 1')) {
				$sql->bind_param('s', $email); // Honestly, you should also be sanitizing this, but that's beyond the example
				$sql->execute();
				$sql->store_result();
				$sql->fetch();
				if ($sql->num_rows > 0) {
					$msg = "Email already exists in the database!";
				} else {
					$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
					$token = str_shuffle($token);
					$token = substr($token, 0, 10);
	
					$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
	
	
				/*$stmt = $con->prepare("INSERT INTO users (name,email,password,isEmailConfirmed,token,discord)
						VALUES ('?', '?', '?', '0', '?', '?');
					");
					$stmt->bind_param("sssss", $name, $email, $hashedPassword, $token, $discord);
					$stmt->execute();
					$con->error_list;*/
	
	
					if ($stmt = $con->prepare("INSERT INTO users (name,email,password,isEmailConfirmed,token,discord) VALUES (?, ?, ?, ?, ?, ?)")) {
						$stmt->bind_param("sssiss", $name, $email, $hashedPassword, $isEmailConfirmed, $token, $discord);
						$stmt->execute();
						$stmt->store_result();
						$stmt->close();

						
					} else {
						$error = $con->errno . ' ' . $con->error;
						echo $error;
					}
					$message = "Please verify here: https://fedexvirtual.cloud/confirm.php?email={$email}&token={$token}";
					$subject = "Verify your account!";
										$headers = 'From: noreply@fedexvirtual.cloud' . "\r\n" .
							'Reply-To: noreply@fedexvirtual.cloud' . "\r\n" .
							'X-Mailer: PHP/' . phpversion();
					mail($email, $subject, $message, $headers);
					$msg = "Please check your email (Email may be in spam)!";

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
	$mail->addAddress($email);
	$mail->isHTML(false);
	$mail->Subject = $subject;
	$mail->Body = "Please verify here: https://fedexvirtual.cloud/confirm.php?email={$email}&token={$token}";
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
    <title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#" style="font-size:30px;"><span style="color: #660099;">Fed</span><span style="color: #ff6600;">Ex</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/downloads">Downloads</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <?php
            if ($_SESSION['loggedin']) {
                echo '<li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>';
            } else {
                echo '<li class="nav-item">
                    <a class="nav-link" href="login.php">Log In</a>
                </li>';
                echo '<li class="nav-item">
                    <a class="nav-link" href="register.php">Sign Up</a>
                </li>';
            }
            ?>
        </ul>

    </div>
</nav>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

				<img src="https://logodix.com/logo/2087366.jpg"><br><br>

				<?php if ($msg != "") echo $msg . "<br><br>" ?>

				<form method="post" action="register.php">
					<input class="form-control" name="name" placeholder="Name..."><br>
					<input class="form-control" name="email" type="email" placeholder="Email..."><br>
					<input class="form-control" name="password" type="password" placeholder="Password..."><br>
					<input class="form-control" name="cPassword" type="password" placeholder="Confirm Password..."><br>
                    <input class="form-control" name="discord" type="name" placeholder="Discord tag (Name#id)"><br>
					<input class="btn btn-primary" type="submit" name="submit" value="Register">
				</form>

			</div>
		</div>
	</div>
</body>
</html>