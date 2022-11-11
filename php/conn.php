<?php
$servername = "sql204.epizy.com";
$username = "epiz_32666315";
$password = "ccSKwXUOPX";
$dbname = "epiz_32666315_report";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
?>