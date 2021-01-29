<?php


require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['admin_username']) && isset($_POST['admin_password'])) {

    // receiving the post params
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    // get the user by email and password
    $user = $db->getFacultyByEmailAndPassword($admin_username, $admin_password);

    if ($user != false) {
        // use is found
        $response["error"] = FALSE;
        // $response["user"]["admin_username"] = $user["admin_username"];
        // $response["user"]["admin_password"] = $user["admin_password"];
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

