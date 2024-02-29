<?php

include('server/connection.php');

if (isset($_GET['product_id'])) {

  $product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
  $stmt->bind_param("i", $product_id);

  $stmt->execute();

  $product = $stmt->get_result();
} else {

  header('location: index.php');
}

?>



<?php include ("header.php")?>


  <!-- single product -->
  <section class="container single-product my-5 pt-5">
    <div class="row mt-5">
      <?php while ($row = $product->fetch_assoc()) { ?>






        <div class="col-lg-5 col-md-6 col-sm-12">
          <img class="img-fluid w-100 pb-1" src="./assets/img/<?php echo $row['product_image']; ?>" alt="" id="mainImg">
          <div class="small-img-group">
            <div class="small-img-col">
              <img src="./assets/img/<?php echo $row['product_image']; ?>" width="100%" class="small-img" alt="">
            </div>
            <div class="small-img-col">
              <img src="./assets/img/<?php echo $row['product_image2']; ?>" width="100%" class="small-img" alt="">
            </div>
            <div class="small-img-col">
              <img src="./assets/img/<?php echo $row['product_image3']; ?>" width="100%" class="small-img" alt="">
            </div>
            <div class="small-img-col">
              <img src="./assets/img/<?php echo $row['product_image4']; ?>" width="100%" class="small-img" alt="">
            </div>
          </div>
        </div>



        <div class="col-lg-6 col-md-12 col-12">
          <h6>Аксессуары</h6>
          <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
          <h2><?php echo $row['product_price']; ?> ₽</h2>

          <form method="POST" action="cart.php">
            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">

            <input type="number" name="product_quantity" value="1">
            <button class="buy-btn" type="submit" name="add_to_cart">Купить</button>

          </form>
          <h4 class="mt-5 mb-5">Описание</h4>
          <span><?php echo $row['product_description']; ?></span>
        </div>

      <?php } ?>

    </div>
  </section>



  <!-- related products -->
  <section id="related- products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3>Вам обязательно подойдут</h3>
      <hr class="mx-auto" />
    </div>
    <div class="row mx-auto container-fluid">
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/10.png.webp" alt="" />
        <h5 class="p-name">Зимний лёд</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/13.png.webp" alt="" />
        <h5 class="p-name">Весеннее цветение</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/16.png.webp" alt="" />
        <h5 class="p-name">Осенний призыв</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/19.jpg.webp" alt="" />
        <h5 class="p-name">Просто футболка</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
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
  <script>
    var mainImg = document.getElementById("mainImg");
    var smallImg = document.getElementsByClassName("small-img");

    for (let i = 0; i < 4; i++) {
      smallImg[i].onclick = function() {
        mainImg.src = smallImg[i].src;
      }
    }
  </script>
</body>

</html>