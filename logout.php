<?php
    #Invoke Database Connection File
    @include './database/config.php';

    #End session and destroys stored data
    session_start();
    session_unset();
    session_destroy();

    #Redirects to login page
    header('location:index.php');
?>