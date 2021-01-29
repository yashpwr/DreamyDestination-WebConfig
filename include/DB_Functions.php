<?php


class DB_Functions {

    private $conn;

    // constructor
    function __construct() {
        require_once 'DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $email, $password,$fullname) {
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt

        $stmt = $this->conn->prepare("INSERT INTO thesis_by_tag_users(fullname, name, email, encrypted_password, salt, created_at) VALUES(?, ?, ?, ?, ? ,NOW())");
        $stmt->bind_param("sssss",$fullname, $name, $email, $encrypted_password, $salt);
        $result = $stmt->execute();
        $stmt->close();

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            return $user;
        } else {
            return false;
        }
    }

    /**
     * Get user by email and password
     */
    public function getFacultyByEmailAndPassword($faculty_username, $faculty_password) {

        $stmt = $this->conn->prepare("SELECT * FROM parentTeacher_faculty_login WHERE faculty_username = ? && faculty_password = ?");

        $stmt->bind_param("ss", $faculty_username,$faculty_password);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // verifying user password
            // $student_password = $user['student_password'];
            // check for password equality
            if ($faculty_password == $user['faculty_password']) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }
    
    public function getAdminByEmailAndPassword($admin_username, $admin_password) {

        $stmt = $this->conn->prepare("SELECT * FROM parentTeacher_admin_login WHERE admin_password = ? && admin_password = ?");

        $stmt->bind_param("ss", $admin_username,$admin_password);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // verifying user password
            // $student_password = $user['student_password'];
            // check for password equality
            if ($admin_password == $user['admin_password']) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }
    
        public function getUserByEmailAndPassword($user_email, $user_password) {

        $stmt = $this->conn->prepare("SELECT * FROM registered_user WHERE user_email = ? && user_password = ?");

        $stmt->bind_param("ss", $user_email,$user_password);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // verifying user password
            // $student_password = $user['student_password'];
            // check for password equality
            if ($user_password == $user['user_password']) {
                // user authentication details are correct
                return $user;
            }
        }
        else {
            return NULL;
        }
    }
    
    

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $stmt = $this->conn->prepare("SELECT email from thesis_by_tag_users WHERE email = ?");

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // user existed 
            $stmt->close();
            return true;
        } else {
            // user not existed
            $stmt->close();
            return false;
        }
    }

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

}

?>
