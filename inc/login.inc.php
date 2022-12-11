<?php
    if(isset($_POST["submit"])){

        // login variables
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        
        // Includes the database and functions 
        require_once 'db.php';
        require_once 'functions.inc.php';

        // Errors Handlings 
        // Checks if the inputs of signup form are empty
        if(emptyInputLogin($username, $pwd) !== false){
            header("location: ../login.php?error=emptyInput");
            exit();
        }

        // Login the user on the site 
        loginUser($conn, $username, $pwd);

    }
    else{
        header("location: ../login.php");
        exit();
    }