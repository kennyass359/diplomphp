<?php

session_start();

include('server/connection.php');
 if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;
}

if (isset($_POST['register'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  if ($password !== $confirmPassword) {
    header('location: register.php?error=пароли не совпадают');
  } else if (strlen($password) < 6) {
    header('location: register.php?error=как минимум 6 символов');
  } else {

    $stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");
    $stmt1->bind_param('s', $email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->store_result();
    $stmt1->fetch();

    if ($num_rows != 0) {
      header('location: register.php?error=данный email уже используется');
    } else {

      $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?,?,?)");

      $stmt->bind_param('sss', $name, $email, $password);
      if ($stmt->execute()) {
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['logged_in'] = true;
        header('location: account.php?register=Вы успешно зарегистрировались');
      } else {
        header('location: register.php?error=При создании аккаунта произошла ошибка');

      }
    }
  }
}


?>


<?php include("header.php") ?>



<!-- Register -->
<section class="my-5 py-5">
  <div class="container text-center mt-3 pt-5">
    <h2 class="form-weight-bold">Регистрация</h2>
    <hr class="mx-auto">
  </div>
  <div class="mx-auto container">
    <form id="register-form" method="POST" action="register.php">
      <p style="color: red;"><?php if (isset($_GET['error'])) echo $_GET['error'] ?></p>
      <div class="form-group">
        <label for="">Имя</label>
        <input type="text" class="form-control" name="name" id="register-name" required>
      </div>
      <div class="form-group mt-3">
        <label for="">Электронная почта</label>
        <input type="email" class="form-control" name="email" id="register-email" required>
      </div>
      <div class="form-group mt-3">
        <label for="">Пароль</label>
        <input type="password" class="form-control" name="password" id="register-password" required>
      </div>
      <div class="form-group mt-3">
        <label for="">Повторите пароль</label>
        <input type="password" class="form-control" name="confirmPassword" id="register-confirm-password" required>
      </div>
      <div class="form-group mt-3">
        <input type="submit" class="btn" name="register" id="register-btn" value="Регистрация">
      </div>
      <div class="form-group">
        <a href="login.php" id="login-url" class="btn">Уже есть аккаунт? Авторизируйся</a>
      </div>
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