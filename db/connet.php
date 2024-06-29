<?php 
 $hostname = "localhost";
 $username = "root";
 $password = "1234";
 $database ="projectdb";
 
 $conn = mysqli_connect($hostname,$username,$password,$database);

 if(!$conn){
    die("Connection failded". mysqli_connect_error());
 }else{
 }
?>