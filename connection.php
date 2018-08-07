<?php
// Parameters for MySQL database
$host = "localhost"; // Name host 
$user = "root";      // Usename MySQL
$pass = "";          // Password MySQL
$namedb = "kaligarangIkom";      // Database name
 
// Create a connection to the MySQL database
$conn = mysqli_connect($host, $user, $pass);
$db = mysqli_select_db ($conn, $namedb );

?>
