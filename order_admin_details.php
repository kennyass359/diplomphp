<?php
session_start();
include('server/connection.php');

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
    header("Location: admin.php");
} else {
    $order_id = $_GET['order_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&display=swap" rel="stylesheet" />
    <title>Order Details</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $sql = "SELECT * FROM order_items WHERE order_id = $order_id";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<table class='table table-striped table-hover'><thead class='table-dark'><tr><th>Название</th><th>Картинка</th><th>Цена</th><th>Количество</th><th>Пользователь</th><th>Дата</th></tr></thead><tbody>";
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["product_name"] . "</td><td><img src='assets/img/" . $row["product_image"] . "' alt='Product Image' class='img-thumbnail' style='height: 100px;'></td><td>" . $row["product_price"] . "</td><td>" . $row["product_quantity"] . "</td><td>" . $row["user_id"] . "</td><td>" . $row["order_date"] . "</td></tr>";
                            }
                            echo "</tbody></table>";
                        } else {
                            echo "<p class='text-danger'>0 results</p>";
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
?>
