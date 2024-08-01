<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "market";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("mal:(: " . mysqli_connect_error());
}
//echo "bien:)";


