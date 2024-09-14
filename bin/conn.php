<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "chatapp";

$conn = @mysqli_connect($serverName, $userName, $password, $databaseName);
mysqli_select_db($conn, $databaseName) or die("Unable to connect to dtabase");
if (!$conn) {
    die("Unabe to connect database");
} else
?>