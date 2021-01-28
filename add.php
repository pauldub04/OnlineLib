<?php

    $servername = "localhost";
    $username = "pd";
    $password = "1234";
    $dbname = "books";


    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    if ($_POST['availability'] == 'true')
        $availability = 1;
    else
        $availability = 0;

    $sql = "INSERT INTO books (title, author, availability)
    VALUES ('".$_POST['title']."', '".$_POST['author']."', ".$availability.")";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header('Location: http://localhost:8000/');
    exit;
?>