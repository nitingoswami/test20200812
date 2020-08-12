<?php
    // Configuration

    $username   = 'root';
    $password   = 'root';
    $hostname   = 'localhost';
    $database   = 'test20200812';
    
    // Connection
    $mysqli = new mysqli($hostname,$username,$password,$database);

    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
?>