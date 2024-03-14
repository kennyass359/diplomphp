<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include('connection.php');


session_start();



if (isset($_POST['place_order'])) {

  // 1. имя юзера в дб

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $order_cost = $_SESSION['total'];
  $order_status = "Зарезервировано";
  $user_id = $_SESSION['user_id'];
  $order_date = date('Y-m-d H:i:s');


  $stmt = $conn->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date) 
    VALUES (?,?,?,?,?,?,?); ");

  $stmt->bind_param('sssisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);

  $stmt->execute();

  

  //2. новый заказ и поместить в  бд


  $order_id = $stmt->insert_id;





  //3. получить товары из корзины (сессионка)

  foreach ($_SESSION['cart'] as $key => $value) {

    $product = $_SESSION['cart'][$key];
    $product_id = $product['product_id'];
    $product_name = $product['product_name'];
    $product_image = $product['product_image'];
    $product_price = $product['product_price'];
    $product_quantity = $product['product_quantity'];

    //4. каждую вещь в orders_item

    $stmt1 = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_image, product_price, product_quantity, user_id, order_date) VALUES (?,?,?,?,?,?,?,?)");

    $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_price, $product_quantity, $user_id, $order_date);
    $stmt1->execute();
    
  }

  //5.удалить все из корзины
  unset($_SESSION['cart']);

  //6.
  header('location: ../payment.php?order_status=Заказ зарезервирован');
}
