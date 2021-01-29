<?php
require 'dbconfig/config.php';


$travel_description_type=$_POST['travel_description_type'];
$travel_description=$_POST['travel_description'];
$date_added=$_POST['date_added']; 


$query="insert into admin_travel_tip(travel_description_type,travel_description,date_added) values('$travel_description_type','$travel_description','$date_added')";

$result = $con->query($query);
//$qur = $con->query($query);
 if(!$result){
     echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
} else{
echo "Success.";

}
?>