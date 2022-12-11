<?php 
// Creates a condition for access to this page to be unavailable to the user
if(isset($_POST["submit"])){
    
    // Creates variables to link the form to the database
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    // Includes the database
    require_once 'db.php';
    // Includes functions file
    require_once 'functions.inc.php';

    // Errors Handlings 
    // Checks if the inputs of signup form are empty
    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
        header("location: ../signup.php?error=emptyInput");
        exit();
    }
    // Checks the username
    if(invalidUsername($username) !== false){
        header("location: ../signup.php?error=invalidUsername");
        exit();
    }
    // Checks the valid format of email
    if(invalidEmailFormat($email) !== false){
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    // Checks if the password matchs 
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../signup.php?error=PasswordDontMatch");
        exit();
    }
    // Checks the unique username in the database
    if(uidExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernameRepeated");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);


}else{
    header("location: ../signup.php?error=notwork");
}