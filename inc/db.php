<?php
$link = mysqli_connect('remotemysql.com', 'c6ghYrHWNv', 'KnkFOTCnx9', 'c6ghYrHWNv');

if ($link->connect_errno) {
    echo "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error;
    die();
}
?>