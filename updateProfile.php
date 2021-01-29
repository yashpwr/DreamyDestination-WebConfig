<?php
require 'dbconfig/config.php';

$user_full_name = $_POST['user_full_name'];
$user_email = $_POST['user_email'];
$user_unique_id = $_POST['user_unique_id'];


$query="update registered_user set user_password='$user_password' where user_unique_id = '$user_unique_id' ";

$result = $con->query($query);
//$qur = $con->query($query);
 if(!$result){
     echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
} else{
echo "Records inserted successfully.";
}
?>