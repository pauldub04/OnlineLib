
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
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Наличие</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT id, title, author, availability FROM books";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $cnt = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<th scope="row">'.$cnt.'</th>';
                                echo '<td>'.$row["title"].'</td>';
                                echo '<td>'.$row["author"].'</td>';
                                echo '
                                    <td>
                                        <button type="button" class="btn btn-outline-primary">
                                ';

                                if ($row["availability"] == 1)
                                    echo "Доступна";
                                else
                                    echo "Нет в наличии";
                                            
                                echo '
                                        </button>
                                    </td>
                                ';
                                echo '
                                    <form name="delete" action="delete.php" method="POST">
                                        <td>
                                            <button type="submit"  class="btn btn-outline-danger">
                                                Удалить
                                            </button>
                                        </td>
                                    </form>
                                ';
                                echo '</tr>';

                                $cnt++;

                            }
                        } else {
                            echo "0 results";
                        }

                    ?>


                    <tr>
                        <th scope="row">Добавить</th>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control"></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-outline-success">
                                Добавить
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

<?php
    // echo "closed";
    $conn->close();
?>