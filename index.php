<?php
session_start();
?>

<html>
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link href="style.css" rel="stylesheet">
    <!-- Navbar -->

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

    <!-- End of Nav -->
</head>



<body id="body">
<section>
<!-- Carousel -->

<div class="carousel slide" data-interval="2000" data-ride="carousel">
    <div class="carousel-inner text-center">
        <div class="carousel-item active firstcaro">
            <div class="d-flex h-100 align-items-center justify-content-center">
                <h1 class="h1" style="
                
                color: white;
  -webkit-text-fill-color: white; /* Will override color (regardless of order) */
  -webkit-text-stroke-width: 1px;
  -webkit-text-stroke-color: black;
                ">Welcome to FedEx Virtual! <br><a style="  -webkit-text-fill-color: white; /* Will override color (regardless of order) */
  -webkit-text-stroke-width: 0px;
  -webkit-text-stroke-color: black;" class="btn btn-primary btn-lg" href="/apply.php" role="button">Apply Here!</a>
</h1>
                <br>
                
            </div>
        </div>
        <div class="carousel-item secondcaro">
            <div class="d-flex h-100 align-items-center justify-content-center">
            <h1 class="h1" style="
                
                color: white;
  -webkit-text-fill-color: white; /* Will override color (regardless of order) */
  -webkit-text-stroke-width: 1px;
  -webkit-text-stroke-color: black;
                ">Welcome to FedEx Virtual! <br><a style="  -webkit-text-fill-color: white; /* Will override color (regardless of order) */
  -webkit-text-stroke-width: 0px;
  -webkit-text-stroke-color: black;" class="btn btn-primary btn-lg" href="/apply.php" role="button">Apply Here!</a>
</h1>
                <br>
            </div>
        </div>
        <div class="carousel-item thirdcaro">
            <div class="d-flex h-100 align-items-center justify-content-center">
            <h1 class="h1" style="
                
                color: white;
  -webkit-text-fill-color: white; /* Will override color (regardless of order) */
  -webkit-text-stroke-width: 1px;
  -webkit-text-stroke-color: black;
                ">Welcome to FedEx Virtual! <br><a style="  -webkit-text-fill-color: white; /* Will override color (regardless of order) */
  -webkit-text-stroke-width: 0px;
  -webkit-text-stroke-color: black;" class="btn btn-primary btn-lg" href="/apply.php" role="button">Apply Here!</a>
</h1>
                <br>
            </div>
        </div>
    </div>
</div>
    

    <div class="container" style="color: black;">
        <p class="has-text-weight-bold text-center" style="font-size: 48px; ">Welcome to <span style="color: #660099;">Fed</span><span style="color: #ff6600;">Ex</span> Virtual!</p>
        <!--<p class="text-center" style="padding-bottom: 10%;">Welcome to the Official Gian Exploits page! If you need to join the discord, link is above, or go to <a href="https://discord.gianexploits.tk">https://discord.gianexploits.tk/</a></p>-->


    </div>

    <div class="jumbotron" style="margin-top: 20%;">
        <h1 class="display-4">What is FS Downloads?</h1>
        <p class="lead">
            FS Downloads is a site for flight sim downloads! This includes every flight sim! You must be a registered user to be able to download items and an admin to upload. Enjoy!
        </p>
        <hr class="my-4">
        <p>Go to downloads!</p>
        <a class="btn btn-primary btn-lg" href="/downloads" role="button">Click To Navigate to Downloads</a>
    </div>

</section>

</body>

<footer>

</footer>

</html>
