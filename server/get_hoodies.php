<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='hoodie' LIMIT 4 ");

$stmt->execute();

$hoodies_products = $stmt->get_result();

?>