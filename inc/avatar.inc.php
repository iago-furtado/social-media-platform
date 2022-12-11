<?php 
// Creates a condition for access to this page to be unavailable to the user
if(isset($_POST["submit"])){
    
    // Creates variables to link the form to the database
    $name = $_POST["avatarName"];
    $bio = $_POST["bio"];

    // Includes the database
    require_once 'db.php';
    // Includes functions file
    require_once 'functions.inc.php';

    // Creating avatar
    createAvatar($conn, $name, $bio);
}