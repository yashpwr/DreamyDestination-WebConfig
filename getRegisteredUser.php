<?php 
 
require 'dbconfig/config.php';

$msg = array();
$getData = "SELECT * FROM `registered_user` ";
$qur = $con->query($getData);

while($r = mysqli_fetch_assoc($qur)){

$msg[] = array("user_full_name" => $r['user_full_name'], "user_unique_id" => $r['user_unique_id'], "user_email" => $r['user_email']);
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