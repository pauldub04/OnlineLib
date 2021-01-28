<?php
    $servername = "localhost";
    $username = "pd";
    $password = "1234";
    $dbname = "books";


    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    if ($_POST['availability'] == '1')
        $new = 0;
    else
        $new = 1;

    $sql2 = "UPDATE books SET availability=".$new." WHERE id=".$_POST['id'];

    if ($conn->query($sql2) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    header('Location: http://localhost:8000/');
    exit;
?>