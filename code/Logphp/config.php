<?php

$conn = mysqli_connect('localhost','root','','login');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
else{
  $sql = "CREATE TABLE user_form (
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(30),
    user_type VARCHAR(30)
    )";
  }

  

?>