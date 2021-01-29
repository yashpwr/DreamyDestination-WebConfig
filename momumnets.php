<?php

$HostName="localhost";
$HostUser="id9274597_dreamydestination";
$HostPass="yash@123";
$DatabaseName="id9274597_dreamydestination";

// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
	 $DefaultId = 0;
 
 ///$ImageData = $_POST['image_path'];
 
 //$ImageName = $_POST['image_name'];
 $monumnets_name = $_POST['monumnets_name'];
 $monumnets_city = $_POST['monumnets_city'];
 $monumnets_address = $_POST['monumnets_address'];
 $monumnets_pic = $_POST['monumnets_pic'];
 

 //$GetOldIdSQL ="SELECT id FROM monuments_master ORDER BY monumnets_name ASC";
 
 //$Query = mysqli_query($conn,$GetOldIdSQL);
 
 //while($row = mysqli_fetch_array($Query)){
 
 //$DefaultId = $row['id'];
 //}
 
 $monumnets_pic = "images/$monumnets_name.png";
 
 $ServerURL = "https://yash-dreamydestination.000webhostapp.com/$monumnets_pic";
 
 $InsertSQL = "insert into monuments_master (monumnets_name,monumnets_city,monumnets_address,'monumnets_pic') values ('$monumnets_name','$monumnets_city','$monumnets_address','$ServerURL')";
 
 if(mysqli_query($conn, $InsertSQL)){

 file_put_contents($ImagePath,base64_decode($ImageData));

 echo "Your Image Has Been Uploaded.";
 }
 
 mysqli_close($conn);
 }else{
 echo "Not Uploaded";
 }

?>