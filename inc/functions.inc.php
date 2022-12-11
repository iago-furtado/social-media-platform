<?php 
/*************************
 *** Sign Up Functions ***
 *************************/

//variavle to check if the user was created
$check = false;

// Function to checks if the inputs of signup form are empty
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    global $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// Function to check if username accepts certain characters
// Regex - any latter and number, zero or more repetitions
function invalidUsername($username){
    global $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// Function to check the format of the email with pre-biuld function 
function invalidEmailFormat($email){
    global $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//Function to check passwords
function pwdMatch($pwd, $pwdRepeat){
    global $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

// Function to check in the database repeated username and email
function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    // Checks any error in the sql or stmt
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    // Prepare and execute the stmt
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    // If the data existis in the database, return its row
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    // Close the stmt
    mysqli_stmt_close($stmt);
}

// Function to create user
function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    // Checks any error in the sql or stmt
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    // Hash the password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    // Prepare and execute the stmt
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    // Close the stmt
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();    
}



/*************************
 ***  Login Functions  ***
 *************************/

 // Function to checks if the inputs of signup form are empty
function emptyInputLogin($username, $pwd){
    global $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


// Function that accesses the user to the site
function loginUser($conn, $username, $pwd){

    // variable to check the username or the email in the database
    // Function uidExists line 59-60. 
    $checkUid = uidExists($conn, $username, $username);

    // Error handler to check if the username or email exists
    if($checkUid === false){
        header("location: ../login.php?error=wrongLogin");
        exit(); 
    }

    // check the password hahsed in the database
    $pwdHashed = $checkUid["userPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wrongLogin");
        exit(); 
    }
    // starting session
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $checkUid["userID"];
        $_SESSION["useruid"] = $checkUid["userName"];
        header("location: ../index.php");
    }
}



/****************************
 ***  Add Page Functions  ***
 ****************************/

 // Function to check in the database repeated username and email
function uidExistsAdd($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    // Checks any error in the sql or stmt
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../add.php?error=stmtFailed");
        exit();
    }

    // Prepare and execute the stmt
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    // If the data existis in the database, return its row
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    // Close the stmt
    mysqli_stmt_close($stmt);
}

// Function to create user
function createUserAdd($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    // Checks any error in the sql or stmt
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../add.php?error=stmtFailed");
        exit();
    }

    // Hash the password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    // Prepare and execute the stmt
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    // Close the stmt
    mysqli_stmt_close($stmt);
    header("location: ../users.php?error=none2");
    exit();    
}

/*****************************
 ***  Edit Page Functions  ***
 *****************************/
// Function to checks if the inputs of signup form are empty
function emptyInputEdit($name, $email, $username){
    global $result;
    if(empty($name) || empty($email) || empty($username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


/*********************************
 ***  Create Avatar Functions  ***
 *********************************/
function createAvatar($conn, $name, $bio){
    $sql = "INSERT INTO user_avatar (avatarName, avatarBio) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);
    // Checks any error in the sql or stmt
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../add.profile.php?error=stmtFailed");
        exit();
    }


    // Prepare and execute the stmt
    mysqli_stmt_bind_param($stmt, "ss", $name, $bio);
    mysqli_stmt_execute($stmt);
    // Close the stmt
    mysqli_stmt_close($stmt);
    header("location: ../profile.php?error=none3");
    exit();    
}