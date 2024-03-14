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
    <title>Admin</title>
</head>
<body>
    <form method="post" action="admin.php">
        <label for="login">Логин:</label>
        <input type="text" name="login" id="login"><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
    } else {
        $sql = "SELECT * FROM orders";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>id</th><th>Стоимость</th><th>Статус</th><th>Айди пользователя</th><th>Телефон</th><th>Чебоксары</th><th>Адрес</th><th>Дата</th><th>Поменять статус</th><th>Детали</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["order_id"]. "</td><td>" . $row["order_cost"] . "</td><td>" . $row["order_status"] . "</td><td>" . $row["user_id"] . "</td><td>" . $row["user_phone"] . "</td><td>" . $row["user_city"] . "</td><td>" . $row["user_address"] . "</td><td>" . $row["order_date"] . "</td><td><form method='post' action='change_status.php'><input type='hidden' name='order_id' value='" . $row["order_id"] . "'><select name='new_status'><option value='отправлено'>Отправлено</option><option value='Получено'>Получено</option><option value='Отмена'>Отмена</option></select><input type='submit' value='Change status'></form></td><td><a href='order_admin_details.php?order_id=" . $row["order_id"] . "'>Details</a></td></tr>";
            }
            echo "</table>";
            echo "<p><a href='logout_admin.php'>Выйти</a></p>";

        } else {
            echo "0 results";
        }
    }
}
$conn->close();
?>
