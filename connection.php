<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "sigin";      // Khai báo database

// Kết nối database sigin
$connect = mysqli_connect($server, $username, $password, $dbname) or die("không thể kết nối tới database");

mysqli_query($connect,"SET NAMES 'UTF8'")
?>