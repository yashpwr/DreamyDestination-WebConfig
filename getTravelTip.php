<?php 
 
require 'dbconfig/config.php';

$msg = array();
$getData = "SELECT * FROM `admin_travel_tip` ";
$qur = $con->query($getData);

while($r = mysqli_fetch_assoc($qur)){

$msg[] = array("travel_description_type" => $r['travel_description_type'], "travel_description" => $r['travel_description'], "date_added" => $r['date_added']);
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