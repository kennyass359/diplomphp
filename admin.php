<?php
session_start();
include('server/connection.php');

$login = 'admin';
$password = 'admin';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['login'] == $login && $_POST['password'] == $password){
        $_SESSION['logged_in'] = true;
        header("Location: admin.php"); // redirecting to the same page
    } else {
        echo "Invalid login or password";
    }
}
else {
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&display=swap" rel="stylesheet" />
    <title>Admin</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="admin.php">
                            <div class="mb-3">
                                <label for="login" class="form-label">Логин:</label>
                                <input type="text" name="login" id="login" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Пароль:</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="d-grid">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    } else {
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&display=swap" rel="stylesheet" />
    <title>Admin</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $sql = "SELECT * FROM orders";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table class='table table-striped table-hover'><thead class='table-dark'><tr><th>id</th><th>Стоимость</th><th>Статус</th><th>Айди пользователя</th><th>Телефон</th><th>Город</th><th>Адрес</th><th>Дата</th><th>Поменять статус</th><th>Детали</th></tr></thead><tbody>";
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["order_id"]. "</td><td>" . $row["order_cost"] . "</td><td>" . $row["order_status"] . "</td><td>" . $row["user_id"] . "</td><td>" . $row["user_phone"] . "</td><td>" . $row["user_city"] . "</td><td>" . $row["user_address"] . "</td><td>" . $row["order_date"] . "</td><td><form method='post' action='change_status.php'><input type='hidden' name='order_id' value='" . $row["order_id"] . "'><select name='new_status' class='form-select'><option value='отправлено'>Отправлено</option><option value='Получено'>Получено</option><option value='Отмена'>Отмена</option></select><input type='submit' value='Поменять статус' class='btn btn-secondary mt-2'></form></td><td><a href='order_admin_details.php?order_id=" . $row["order_id"] . "' class='btn btn-info'>Детали</a></td></tr>";
                            }
                            echo "</tbody></table>";
                            echo "<p><a href='logout_admin.php' class='btn btn-danger'>Выйти</a></p>";

                        } else {
                            echo "<p>0 results</p>";
                        }
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    }
}
?>
