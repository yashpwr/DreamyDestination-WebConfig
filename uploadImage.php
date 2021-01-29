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
 
 $ImageData = $_POST['image_path'];
 
 $ImageName = $_POST['image_name'];
 
 $place_name = $_POST['place_name'];
 $place_address = $_POST['place_address'];
 $place_type = $_POST['place_type'];
 $place_city = $_POST['place_city'];

 $GetOldIdSQL ="SELECT id FROM UploadImageToServer ORDER BY id ASC";
 
 $Query = mysqli_query($conn,$GetOldIdSQL);
 
 while($row = mysqli_fetch_array($Query)){
 
 $DefaultId = $row['id'];
 }
 
 $ImagePath = "/$DefaultId.png";
 
 $ServerURL = "https://dreamydestinationapp.000webhostapp.com/DreamyDestination/images$ImagePath";
 
 $InsertSQL = "insert into UploadImageToServer (image_path,image_name,place_city,place_type,place_address,place_name) values ('$ServerURL','$ImageName','$place_city','$place_type','$place_address','$place_name')";
 
 if(mysqli_query($conn, $InsertSQL)){

 file_put_contents($ImagePath,base64_decode($ImageData));

 echo "Your Image Has Been Uploaded.";
 }
 
 mysqli_close($conn);
 }else{
 echo "Not Uploaded";
 }

?>