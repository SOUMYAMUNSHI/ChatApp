<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "chatapp";

$conn = mysqli_connect($serverName, $userName, $password, $databaseName) or die("unable to connect");
if (!$conn) {
    die("Error" . mysqli_connect_error());
}
