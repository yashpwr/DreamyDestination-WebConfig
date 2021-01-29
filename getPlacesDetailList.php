<?php 
 
require 'dbconfig/config.php';

$msg = array();

$place_city = $_POST['place_city'];
$place_type = $_POST['place_type'];


$getData = "SELECT * FROM `UploadImageToServer` where place_city = '$place_city' && place_type = '$place_type' ";
$qur = $con->query($getData);

while($r = mysqli_fetch_assoc($qur)){

$msg[] = array("image_name" => $r['image_name'], "place_name" => $r['place_name'], "place_address" => $r['place_address'], "image_path" => $r['image_path'], "place_type" => $r['place_type'], "place_city" => $r['place_city']);
}

if (empty($msg)) {
     $json = "No Values Found";
}
else
{
    $json = $msg;
}


header('content-type: application/json');
echo json_encode($json);

@mysqli_close($conn);
        
?>