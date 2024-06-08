<?php

session_start();
if (!isset($_SESSION['logged_in'])) {
  header('location: login.php');
  exit;
}

if (isset($_POST['add_to_cart'])) {

  if (isset($_SESSION['cart'])) {

    $product_array_ids = array_column($_SESSION['cart'], "product_id");
    if (!in_array($_POST['product_id'], $product_array_ids)) {

      $product_id = $_POST['product_id'];


      $product_array = array(
        'product_id' => $_POST['product_id'],
        'product_name' => $_POST['product_name'],
        'product_price' => $_POST['product_price'],
        'product_image' => $_POST['product_image'],
        'product_quantity' => $_POST['product_quantity']
      );

      $_SESSION['cart'][$product_id] = $product_array;
    } else {

      echo '<script>alert("Товар уже был добавлен")</script>';
    }
  } else {

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $product_array = array(
      'product_id' => $product_id,
      'product_name' => $product_name,
      'product_price' => $product_price,
      'product_image' => $product_image,
      'product_quantity' => $product_quantity
    );

    $_SESSION['cart'][$product_id] = $product_array;
  }



} else if (isset($_POST['remove_product'])) {


  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);
} else if (isset($_POST['edit_quantity'])) {

  $product_id = $_POST['product_id'];
  $product_quantity = $_POST['product_quantity'];

  $product_array = $_SESSION['cart'][$product_id];

  $product_array['product_quantity'] = $product_quantity;

  $_SESSION['cart'][$product_id] = $product_array;
} else {
  // header('location: index.php');
}

function calculateTotalCart()
{

  $total = 0;

  foreach ($_SESSION['cart'] as $key => $value) {

    $product = $_SESSION['cart'][$key];

    $price = $product['product_price'];
    $quantity = $product['product_quantity'];
    $total = $total + ($price * $quantity);
  }

  $_SESSION['total'] = $total;
}

calculateTotalCart();

?>

<?php include ("header.php")?>

  <section class="cart container my-5 py-5">
    <div class="container mt-5">
      <h2 class="font-weight-bolde">Корзина</h2>
      <hr>
    </div>

    <table class="mt-5 pt-5">
      <tr>
        <th>Товар</th>
        <th>Название</th>
        <th>Итог</th>
      </tr>

      <?php foreach ($_SESSION['cart'] as $key => $value) { ?>

        <tr>
          <td>
            <div class="product-info">
              <img src="./assets/img/<?php echo $value['product_image']; ?>" alt="">
              <div>
                <p><?php echo $value['product_name']; ?></p>
                <small><span>₽</span><?php echo $value['product_price']; ?></small>
                <br>
                <form action="cart.php" method="POST">
                  <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                  <input type="submit" name="remove_product" class="remove-btn" value="Удалить">
                </form>

              </div>
            </div>
          </td>

          <td>
            <form method="POST" action="cart.php">
              <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
              <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>">
              <input type="submit" class="edit-btn" value="Изменить" name="edit_quantity">
            </form>
          </td>

          <td>
            <span>₽</span>
            <span class="product"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
          </td>
        </tr>

      <?php } ?>

    </table>

    <div class="cart-total">
      <table>

        <tr>
          <td>Итог</td>
          <td>₽ <?php echo $_SESSION['total']; ?></td>
        </tr>
      </table>
    </div>

    <div class="checkout-container">
      <form method="POST" action="checkout.php">
        <input type="submit" class="btn checkout-btn" value="Оплата" name="checkout">
      </form>
    </div>

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