<?php

$servername = "localhost";
$username = "";
$password = "";
$dbname = "eco_shop";

// Create connection
$conn = new mysqli('localhost','root','','eco_shop');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>