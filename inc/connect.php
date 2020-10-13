<?php
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
$con = new mysqli('205.185.125.123', 'admin_login', 'FLZ37FfDK', 'admin_login');

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
    die();
}

/*
 * Username: c6ghYrHWNv

Database name: c6ghYrHWNv

Password: KnkFOTCnx9

Server: remotemysql.com

Port: 3306

These are the username and password to log in to your database and phpMyAdmin
 */