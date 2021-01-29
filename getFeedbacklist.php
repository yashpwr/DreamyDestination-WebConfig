<?php 
 
require 'dbconfig/config.php';

$msg = array();
$getData = "SELECT * FROM `dreamy_destination_feedback` ";
$qur = $con->query($getData);

while($r = mysqli_fetch_assoc($qur)){

$msg[] = array("feedback_rating" => $r['feedback_rating'], "comment" => $r['comment'],"posted_by" => $r['posted_by'],"posted_on" => $r['posted_on']);
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