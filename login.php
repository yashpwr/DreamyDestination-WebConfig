<?php


require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['user_email']) && isset($_POST['user_password'])) {

    // receiving the post params
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // get the user by email and password
    $user = $db->getUserByEmailAndPassword($user_email, $user_password);

    if ($user != false) {
        // use is found
        $response["error"] = FALSE;
        $response["error_msg"] = "Login success";
        $response["user"]["user_full_name"] = $user["user_full_name"];
        $response["user"]["user_email"] = $user["user_email"];
        $response["user"]["user_password"] = $user["user_password"];
        $response["user"]["user_unique_id"] = $user["user_unique_id"];
        $response["user"]["user_joined_date"] = $user["user_joined_date"];
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}
?>

