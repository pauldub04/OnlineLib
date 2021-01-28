
<?php
    $servername = "localhost";
    $username = "pd";
    $password = "1234";
    $dbname = "books";


    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Online Библиотека</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
    <div id="app">
        <div class="container mt-5">
            <h1>Список книг нашей библиотеки</h1>
            <?php
                $sql = "SELECT id, title, author, availability FROM books";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $cnt = 1;
            
                    echo '
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Автор</th>
                                <th scope="col">Наличие</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        <tbody>';
                    
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<th scope="row">'.$cnt.'</th>';
                        echo '<td>'.$row["title"].'</td>';
                        echo '<td>'.$row["author"].'</td>';
                        echo '
                            <form name="change_availability" action="change_availability.php" method="POST">
                                <td>
                                    <input type="text" name="availability" value='.$row["availability"].' hidden>
                                    <button type="submit" name="id" value='.$row["id"].' class="btn btn-outline-primary">
                        ';

                        if ($row["availability"] == 1)
                            echo "Доступна";
                        else
                            echo "Нет в наличии";
                                    
                        echo '
                                    </button>
                                </td>
                            </form>
                        ';
                        echo '
                            <form name="delete" action="delete.php" method="POST">
                                <td>
                                    <button type="submit" name="id" value='.$row["id"].' class="btn btn-outline-danger">
                                        Удалить
                                    </button>
                                </td>
                            </form>
                        ';
                        echo '</tr>';

                        $cnt++;

                    }
                    echo '</tbody>';
                    
                } else {
                    echo '<h5 class="mt-5">Ни одной книги нет</h5>';
                }

            ?>

            <!-- <tr>
                    <th scope="row">Добавить</th>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-outline-success">
                            Добавить
                        </button>
                    </td>
                </tr> -->
                

            <form action="add.html">
                <td>
                    <button type="submit" class="btn btn-outline-success mt-2">
                        Добавить книгу
                    </button>
                </td>
            </form>
                
        </div>
    </div>

</body>
</html>

<?php
    // echo "closed";
    $conn->close();
?>