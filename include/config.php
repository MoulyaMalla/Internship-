<?php
$servername = "localhost";
// Create connection
$conn = mysqli_connect('localhost','root','','internship');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
 // echo "Connected successfully";