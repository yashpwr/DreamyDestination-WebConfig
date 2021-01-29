<?php
require 'dbconfig/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

$user_full_name=$_POST['user_full_name'];
$user_email=$_POST['user_email'];
$user_password=$_POST['user_password']; 
$user_joined_date=$_POST['user_joined_date']; 
$string = substr($user_full_name,0,3);
$number = uniqid();
$varray = str_split($number);
$len = sizeof($varray);

$string = substr($user_full_name,0,3);
$number = uniqid();
$varray = str_split($number);
$len = sizeof($varray);
$user_unique_id = array_slice($varray, $len-5, $len);
$user_unique_id = implode(",", $user_unique_id);
$user_unique_id = str_replace(',', '', $user_unique_id);
$user_unique_id = $string . $user_unique_id;


$query="insert into registered_user(user_full_name,user_email,user_password,user_unique_id,user_joined_date) values('$user_full_name','$user_email','$user_password','$user_unique_id','$user_joined_date')";

$result = $con->query($query);
//$qur = $con->query($query);
 if(!$result){
     echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
} else{
echo "Records inserted successfully.";
// $mail = new phpMailer/PHPMailer/PHPMailer(); // create a new object
// $mail->IsSMTP(); // enable SMTP
// $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
// $mail->SMTPAuth = true; // authentication enabled
// $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
// $mail->Host = "smtp.gmail.com";
// $mail->Port = 465; // or 587
// $mail->IsHTML(true);
// $mail->Username = "parentteacher001@gmail.com";
// $mail->Password = "ParentTeacher@123";
// $mail->SetFrom("ParentTeacherApp@gmail.com");
// $mail->Subject = "Test";
// $mail->Body = "hello";
// $mail->AddAddress("parentteacher001@gmail.com");

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'yashdvn@gmail.com'; // email
$mail->Password = 'yash1.born2win'; // password
$mail->setFrom('parentteacher001@gmail.com'); // From email and name
$mail->addAddress($user_email); // to email and name
$mail->Subject = 'Registration Successfull';
$mail->msgHTML("Greeting, Welcome to Dreamy Destination a smart solution for getting information about travelling.");

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
}
?>