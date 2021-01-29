<?php
require 'dbconfig/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

$user_email = $_POST['user_email'];
$string = substr($user_email,0,3);
$number = uniqid();
$varray = str_split($number);
$len = sizeof($varray);
$user_password = array_slice($varray, $len-5, $len);
$user_password = implode(",", $user_password);
$user_password = str_replace(',', '', $user_password);
$user_password = $string . $user_password;


$query="update registered_user set user_password='$user_password' where user_email = '$user_email' ";

$result = $con->query($query);
//$qur = $con->query($query);
 if(!$result){
     echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
} else{
echo "Records inserted successfully.";
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
$mail->msgHTML("Greeting, Welcome to Dreamy Destination a smart solution for getting information about travelling.Your new password is $user_password. You can change this system generated password through the application. Happy Travelling");

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
}
?>