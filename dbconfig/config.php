<?php
/*
Connects the DB in the Back End/Server Side
*/
$serv="localhost";
$user="id9274597_dreamydestination";
$pass="yash@123";
$db="id9274597_dreamydestination";
$con=mysqli_connect($serv,$user,$pass) or die("can't connect");
mysqli_select_db($con,$db);


?>