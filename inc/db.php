<?php

// Create variables to connect to the database
$serverName = "172.31.22.43";
$dbUsername = "Iago200507139";
$dbPassword = "3AoppHwZNO";
$dbName = "Iago200507139";

// Create variable conn(connection) that link with database workbranch
$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

// Check the connection
if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}