<?php

include('server/connection.php');
session_start();

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){

    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");

    $stmt->bind_param('i', $order_id);

    $stmt->execute();

    $order_details = $stmt->get_result();
}else {
    header('location: account.php');
    exit;
}

?>


<?php include("header.php") ?>



<!-- order details -->
<section id="orders" class="orders container my-2 py-3">
  <div class="container mt-5">
    <h2 class="font-weight-bolde text-center pt-5">Детали заказа</h2>
    <hr class="mx-auto">
  </div>

  <table class="mt-5 pt-5 mx-auto">
    <tr>
      <th>Название</th>
      <th>Цена</th>
      <th>Количество</th>
    </tr>

    <?php while($row = $order_details->fetch_assoc()){  ?>
    

<tr>
<td>
    <div class="product-info">
        <img src="assets/img/<?php echo $row ['product_image']; ?>" alt="">
        <div>
            <p class="mt-3"><?php echo $row['product_name']; ?></p>
        </div>
    </div>
    </td>
 
    <td>
       <span>₽<?php echo $row['product_price']; ?></span>
    </td>

    <td>
       <span><?php echo $row['product_quantity']; ?></span>
    </td>

</tr> 

<?php } ?>

  </table>




</section>


<!-- footer -->
<footer class="mt-5 py-5">
  <div class="row justify-content-center container mx-auto pt-5">
    <div class="footer-one col-lg-3 col-md-6 col-sm-12">
      <img src="./assets/img/Group 1.svg" alt="">
      <p class="pt-3">Просто мы, просто лучше.</p>
    </div>
    <div class="footer-one col-lg-3 col-md-6 col-sm-12">
      <h5 class="pb-2">Наш выбор</h5>
      <ul class="text-uppercase">
        <li><a href="#">Мужское</a></li>
        <li><a href="#">Женское</a></li>
        <li><a href="#">Аксессуары</a></li>
        <li><a href="#">О нас</a></li>
        <li><a href="#">Информация</a></li>
        <li><a href="#">Доставка</a></li>
      </ul>
    </div>

    <div class="footer-one col-lg-3 col-md-6 col-sm-12">
      <h5 class="pb-2">Напишите нам</h5>
      <div>
        <h6 class="text-uppercase">Адрес</h6>
        <p>Россия, Чебоксары</p>
      </div>
      <div>
        <h6 class="text-uppercase">Телефон</h6>
        <p>11-11-11</p>
      </div>
      <div>
        <h6 class="text-uppercase">Почта</h6>
        <p>michael09102004@gmail.com</p>
      </div>
    </div>
  </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/34a4f1a444.js" crossorigin="anonymous"></script>
</body>

</html>