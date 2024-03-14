<?php
include('server/connection.php');
?>

<?php include("header.php") ?>


    <style>
        .product img {
            width: 100%;
            height: auto;
             box-sizing: border-box;
             object-fit: cover;
        }

        .pagination a {
            color: black;
        }

        .pagination li:hover a {
            color:#18db0b;
            background-color:black;
        }
    </style>

  
  <!-- featured -->
  <section id="featured" class="my-5 py-3">
    <div class="container mt-5 py-5">
      <h3>Каталог</h3>
      <hr/>
      <p>Всё здесь</p>
    </div>
    <div class="row mx-auto container">
      
      <div class="row mx-auto container-fluid">

    <?php include('server/get_products.php') ?>

    <?php 
    while ($row = $products_catalog->fetch_assoc()) {
    ?>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>">
        <img class="img-fluid mb-3" src="assets/img/<?php echo $row['product_image'] ?>" alt="" />
        <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
        <h4 class="p-price"><?php echo $row['product_price'] ?> ₽</h4>
        <button class="buy-btn">Купить</button></a>
      </div>
      
      <?php } ?>
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





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/34a4f1a444.js" crossorigin="anonymous"></script>
</body>

</html>