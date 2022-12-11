<?php

    session_start();
    session_unset();
    session_destroy();

    // send back to the index page
    header("location: ../index.php");
    exit();