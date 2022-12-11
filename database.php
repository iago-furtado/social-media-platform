<?php
/*
 I'm creating another database file because I'm not able to read, update and delete data from the users table.
*/
 class database{

    // connection database variables
    private $servername = "172.31.22.43";
    private $username   = "Iago200507139";
    private $password   = "3AoppHwZNO";
    private $database   = "Iago200507139";
    public  $con;


    // Database Connection constructor
    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
        if(mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        }else{
            return $this->con;
        }
    }



    /************************
     ***  User Functions  ***
    *************************/

    // Function to fetch all users records 
    public function displayData()
    {
        $query = "SELECT * FROM users";
        $result = $this->con->query($query);
        if($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else{
            echo "No found records";
        }
    }

    // Function that fetch single data for edit from user table
    public function displyaRecordById($id)
    {
        $query = "SELECT * FROM users WHERE userID = '$id'";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }else{
            echo "Record not found";
        }
    }

    // Function to update user
    public function updateRecord($postData)
    {
        $name = $this->con->real_escape_string($_POST['name']);
        $username = $this->con->real_escape_string($_POST['uid']);
        $email = $this->con->real_escape_string($_POST['email']);
        $id = $this->con->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE users SET userName = '$name', userEmail = '$email', userUid = '$username' WHERE userID = '$id'";
            $sql = $this->con->query($query);
            if ($sql==true) {
            header("Location:users.php?msg2=update");
            }else{
            echo "Registration updated failed try again!";
            }
        }
    }

    // Function to delete user
    public function deleteRecord($id)
    {
        $query = "DELETE FROM users WHERE userID = '$id'";
        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:users.php?msg3=delete");
        }else{
            echo "Record does not delete try again";
        }
    }



    /*************************
    ***  Avatar Functions  ***
    **************************/

    // Function to display the data 
    public function displayAvatarData()
    {
        $query = "SELECT * FROM user_avatar";
        $result = $this->con->query($query);
        if($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    // Function that fetch single data for edit from user_avatar table
    public function displyaAvatarRecordById($id)
    {
        $query = "SELECT * FROM user_avatar WHERE avatarID = '$id'";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }else{
            echo "Record not found";
        }
    }

    // Function to update user_avatar
    public function updateAvatarRecord($postData)
    {
        $name = $this->con->real_escape_string($_POST['avatarName']);
        $bio = $this->con->real_escape_string($_POST['bio']);
        $id = $this->con->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE user_avatar SET avatarName = '$name', avatarBio = '$bio' WHERE avatarID = '$id'";
            $sql = $this->con->query($query);
            if ($sql==true) {
            header("Location:profile.php?msg2=update");
            }else{
            echo "Registration updated failed try again!";
            }
        }
    }

    // Function to delete avatar information
    public function deleteAvatarRecord($id)
    {
        $query = "DELETE FROM user_avatar WHERE avatarID = '$id'";
        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:profile.php?msg3=delete");
        }else{
            echo "Record does not delete try again";
        }
    }
}
