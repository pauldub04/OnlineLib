<?php
    $servername = "localhost";
    $username = "pd";
    $password = "1234";
    $dbname = "books";


    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "DELETE FROM books WHERE id=".$_POST['id'];

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    header('Location: http://localhost:8000/');
    exit;
?>