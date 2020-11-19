<?php
session_start();
require_once('inc/connect.php');
$msg="";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
if(isset($_POST["submit"])) {
    if(!isset($_GET["token"])) {
        die("This is not a valid token 1");
    } else {
        if ($stmt = $con->prepare("SELECT * FROM password_resets WHERE token = ? LIMIT 1")) {
            $stmt->bind_param('s', $_GET["token"]);
            $stmt->execute();
            //$stmt->store_result();
            $user = $stmt->get_result();
            if($user === false) {
                echo "{$_GET["token"]}\r\n";
                exit;
            }
            $password = $_POST['password'];
            $cPassword = $_POST['cPassword'];
            $email = $user->fetch_assoc()['email'];
            
    
            if ($user->num_rows > 0) {
                
                
                if ($password != $cPassword) {
                    echo "The passwords given do not match!";
                } else {
                    
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
                    if($stmt = $con->prepare("UPDATE users SET password = ? WHERE email = ?")) {
                        $stmt->bind_param('ss', $hashedPassword, $email);
                        $stmt->execute();
                        $stmt->store_result();
                        $stmt->fetch();

                        if($stmt = $con->prepare("DELETE FROM password_resets WHERE token = ?")) {
                            $stmt->bind_param('s', $_GET['token']);
                            $stmt->execute();
                            $stmt->store_result();
                            $stmt->fetch();
                        }
    
                        echo "Password reset complete, you may now login! <a href='https://fedexvirtual.cloud/login.php'></a>";
                        
                        
                    }
                }
            } else {
                die("This is not a valid token");
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
    <title>Reset Password | Sky Cargo Virtual</title>
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

				<?php
                echo "<form method='post' action='passwordreset.php?token={$_GET['token']}'>";
                ?>
				<!--<input class="form-control" name="name" type="name" placeholder="Token..."><br>-->
                <input class="form-control" name="password" type="password" placeholder="New Password..."><br>
					<input class="form-control" name="cPassword" type="password" placeholder="Confirm New Password..."><br>
					<input class="btn btn-primary" type="submit" name="submit" value="Register">
				</form>

			</div>
		</div>
	</div>
</body>
</html>