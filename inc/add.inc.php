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
        header("location: ../add.php?error=emptyInput");
        exit();
    }
    // Checks the username
    if(invalidUsername($username) !== false){
        header("location: ../add.php?error=invalidUsername");
        exit();
    }
    // Checks the valid format of email
    if(invalidEmailFormat($email) !== false){
        header("location: ../add.php?error=invalidEmail");
        exit();
    }
    // Checks if the password matchs 
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../add.php?error=PasswordDontMatch");
        exit();
    }
    // Checks the unique username in the database
    if(uidExistsAdd($conn, $username, $email) !== false){
        header("location: ../add.php?error=usernameRepeated");
        exit();
    }

    createUserAdd($conn, $name, $email, $username, $pwd);


}else{
    header("location: ../add.php?error=notwork");
}