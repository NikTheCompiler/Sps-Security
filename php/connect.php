<?php
$servername = "DESKTOP-FCR3KJC";
$username = "sps";
$password = "sps";

try {
  $conn = new PDO("mysql:host=$servername;dbname=SpsSecurity", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>