<?php
session_start();
require 'inc/connect.php';
$msg = "";

/*if (!isset($_SESSION['loggedin']) && !$_SESSION["loggedin"] === true){
    header("Location: login.php");
    exit;
}*/

if (isset($_POST['submit'])) {
    $airline = $_POST['airline'];
    $aircrafttype = $_POST['aircrafttype'];
    $flightnumber = $_POST['flightnumber'];
    $depicao = $_POST['depicao'];
    $arricao = $_POST['arricao'];
    $flighttime = $_POST['flighttime'];
    $blockfuel = $_POST['blockfuel'];
    $cargoweight = $_POST['cargoweight'];
    $route = $_POST['route'];
    $cruiseflightlevel = $_POST['cruiseflightlevel'];
    $remarks = $_POST['remarks'];

    if(empty($airline) || empty($aircrafttype) || empty($flightnumber) || empty($depicao) || empty($arricao) || empty($flighttime) || empty($blockfuel) || empty($cargoweight) || empty($route) || empty($cruiseflightlevel)) {
        $msg = "One of the fields were empty! Please refile the PIREP!";
    } else {
        $sql = $con->prepare("INSERT INTO pirep (userid)");
    }
} else {
    $msg = "Please retry to submit the form and try again. If that does not work, please send an email to alex@skycargovirtual.com";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIREP Form</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    
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
<div class="container-fluid">
    <form method="post">
        <div class="form-group">
            <label>Airline</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="airline" id="fedex" value="fedex" checked>
                <label class="form-check-label" for="fedex">
                    FedEx
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="airline" id="primeair" value="primeair">
                <label class="form-check-label" for="primeair">
                    Prime Air
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="airline" id="ups" value="ups">
                <label class="form-check-label" for="ups">
                    UPS
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="aircrafttype">Aircraft Type</label>
            <input type="text" class="form-control" id="aircrafttype" aria-describedby="text">

        </div>
        <div class="form-group">
            <label for="flightnumber">Flight Number</label>
            <input type="text" class="form-control" id="flightnumber" aria-describedby="text">

        </div>
        <div class="form-group">
            <label for="depicao">Departure ICAO</label>
            <input type="text" class="form-control" id="depicao" aria-describedby="text">

        </div>
        <div class="form-group">
            <label for="arricao">Arrival ICAO</label>
            <input type="text" class="form-control" id="arricao" aria-describedby="text">

        </div>
        <div class="form-group">
            <label for="flighttime">Flight Time</label>
            <input type="text" class="form-control" id="flighttime" aria-describedby="flighttimedisplay">
            <small id="flighttimedisplay">Display as __h__m</small>
        </div>
        <div class="form-group">
            <label for="blockfuel">Block Fuel [LBS]</label>
            <input type="text" class="form-control" id="blockfuel" aria-describedby="text">

        </div>
        <div class="form-group">
            <label for="cargoweight">Cargo Weight [LBS]</label>
            <input type="text" class="form-control" id="cargoweight" aria-describedby="text">

        </div>
        <div class="form-group">
            <label for="route">Route</label>
            <input type="text" class="form-control" id="route" aria-describedby="text">

        </div>
        <div class="form-group">
            <label for="cruiseflightlevel">Cruise Flight Level</label>
            <input type="text" class="form-control" id="cruiseflightlevel" aria-describedby="text">

        </div>
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <input type="text" class="form-control" id="remarks" aria-describedby="text">

        </div>
        <input type="submit" class="btn btn-primary" value="Submit Form">
    </form>
</div>

</body>
</html>