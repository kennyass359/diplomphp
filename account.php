<?php

session_start();
if(!isset($_SESSION['logged_in'])){
  header('location: login.php');
  exit;
}

if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit; 
  }
}

?>




<?php include ("header.php")?>




  <!-- Account -->
  <section class="my-5 py-5">
    <div class="row container mx-auto">
      <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
        <h3 class="font-weight-bold">Аккаунт</h3>
        <hr class="mx-auto">
        <div class="account-info">
          <p>Имя: <span><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}?></span></p>
          <p>Email: <span><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];}?></span></p>
          <p><a href="#orders" id="orders-btn">Ваши заказы</a></p>
          <p><a href="account.php?logout=1" id="logout-btn">Выйти</a></p>
        </div>
      </div>

      <div class="col-lg-6 col-md-12 col-sm-12">
        <form id="account-form">
          <h3>Сменить пароль</h3>
          <hr class="mx-auto">
          <div class="form-group">
            <label>Пароль</label>
            <input type="password" class="form-control" id="account-password">
          </div>
          <div class="form-group">
            <label>Подтвердите пароль</label>
            <input type="password" class="form-control" id="account-password-confirm">
          </div>
          <div class="form-group">
            <input type="submit" value="Сменить пароль" class="btn" id="change-pass-btn">
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- orders -->
  <section id="orders" class="orders container my-2 py-3">
    <div class="container mt-2">
      <h2 class="font-weight-bolde text-center">Заказы</h2>
      <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5">
      <tr>
        <th>Товар</th>
        <th>Дата</th>
      </tr>
      <tr>
        <td>
          <div class="product-info">
            <img src="./assets/img/jeans1.webp" alt="">
            <div>
              <p class="mt-3">
                Синие джинсы
              </p>
            </div>
          </div>
        </td>

        <td>
          <span>
            12-02-2024
          </span>
        </td>

      </tr>

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/34a4f1a444.js" crossorigin="anonymous"></script>
</body>

</html>