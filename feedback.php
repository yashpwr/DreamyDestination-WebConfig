<?php
require 'dbconfig/config.php';


$feedback_rating=$_POST['feedback_rating'];
$comment=$_POST['comment'];
$posted_by=$_POST['posted_by']; 
$posted_on=$_POST['posted_on'];


$query="insert into dreamy_destination_feedback(feedback_rating,comment,posted_by,posted_on) values('$feedback_rating','$comment','$posted_by','$posted_on')";

$result = $con->query($query);
//$qur = $con->query($query);
 if(!$result){
     echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
} else{
echo "Success.";

}
?>