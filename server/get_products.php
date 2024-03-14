<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products");

$stmt->execute();

$products_catalog = $stmt->get_result();

?>