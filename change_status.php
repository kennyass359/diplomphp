<?php
session_start();
include('server/connection.php');

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
    header("Location: admin.php");
} else {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['new_status'];

    $sql = "UPDATE orders SET order_status = '$new_status' WHERE order_id = $order_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
