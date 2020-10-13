<?php

$msg = "";
if (isset($_POST['submit'])) {

$password = $_POST['hash'];

$haspw = password_hash($password, PASSWORD_BCRYPT);

$msg = $haspw;

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3" align="center">

            <img src="images/logo.png"><br><br>

            <?php if ($msg != "") echo $msg . "<br><br>" ?>

            <form method="post" action="login.php">
                <input class="form-control" name="hash" type="name" placeholder="Password..."><br>
                <input class="btn btn-primary" type="submit" name="submit" value="Log In">
            </form>

        </div>
    </div>
</div>
</body>
</html>
