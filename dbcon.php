<?php
    session_start();
    $con = mysqli_connect("localhost","root","","crud_operation");
    
if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

$sql = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'products'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $value = $row['COUNT(*)'];
    }
  }
if($value == 0)
{
    $sql = "USE crud_operation";
        mysqli_query($con,$sql);
        mysqli_query($con,"CREATE TABLE `products`
        (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `category` varchar(255) NOT NULL,
        `title` varchar(255) NOT NULL,
        `price` float NOT NULL,
        `image` varchar(255) NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");
}

$sql = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'users'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $value = $row['COUNT(*)'];
    }
  }
if($value == 0)
{
  $sql = "USE crud_operation";
        mysqli_query($con,$sql);
        mysqli_query($con,"CREATE TABLE `users` 
        (
        `sno` int(8) NOT NULL AUTO_INCREMENT,
        `user_email` varchar(30) NOT NULL,
        `user_pass` varchar(255) NOT NULL,
        PRIMARY KEY (`sno`)
      ) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");
}

?>