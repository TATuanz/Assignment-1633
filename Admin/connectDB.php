<?php
function connectDB() {
    $servername = "localhost";
    $username = "Nigo";
    $password = "123";
    $dbname = "shop";
  
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 
    return $conn;
} 
?>