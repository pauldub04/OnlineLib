<?php
    $servername = "localhost";
    $username = "pd";
    $password = "1234";
    $dbname = "books";


    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    

    echo 'Успешно соединились';
    // $conn->close();
?>