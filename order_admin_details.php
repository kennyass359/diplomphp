
<?php
session_start();
include('server/connection.php');

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
    header("Location: admin.php");
} else {
    $order_id = $_GET['order_id'];

    $sql = "SELECT * FROM order_items WHERE order_id = $order_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>item_id</th><th>order_id</th><th>product_id</th><th>product_name</th><th>product_image</th><th>product_price</th><th>product_quantity</th><th>user_id</th><th>order_date</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["item_id"]. "</td><td>" . $row["order_id"] . "</td><td>" . $row["product_id"] . "</td><td>" . $row["product_name"] . "</td><td><img src='assets/img/" . $row["product_image"] . "' alt='Product Image' height='100px'></td><td>" . $row["product_price"] . "</td><td>" . $row["product_quantity"] . "</td><td>" . $row["user_id"] . "</td><td>" . $row["order_date"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
}
?>
