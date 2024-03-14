<?php

session_start();

include('server/connection.php');

if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;
}

if(isset($_POST['login_btn'])){

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email=? AND user_password = ? LIMIT 1");

$stmt->bind_param('ss', $email, $password);




if($stmt->execute()){
  $stmt->bind_result($user_id, $user_name, $user_email, $user_password);
  $stmt->store_result();

  if($stmt->num_rows() == 1){
    $stmt->fetch();

    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_email'] = $user_email;
    $_SESSION['logged_in'] = true;


    header('location: account.php?login_success=Авторизация прошла успешно');

  }else{
    header('location: login.php?message=Не нашли ваш аккаунт');
  }

}else{

  header('location: login.php?error=Что-то пошло не так');

}


}

?>





<?php include ("header.php")?>


  <!-- Login -->
  <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Авторизация</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form id="login-form" method="POST" action="login.php">
          <p style="color: red;" class="text-center"><?php if(isset($_GET['ошибка'])){ echo $_GET['ошибка'];}?></p>
            <div class="form-group">
                <label for="">Электронная почта</label>
                <input type="email" class="form-control" name="email" id="login-email" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Пароль</label>
                <input type="password" class="form-control" name="password" id="login-password" required>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn" id="login-btn" name="login_btn" value="Авторизация">
            </div>
            <div class="form-group">
                <a href="register.php" id="register-url" class="btn">Впервые? Зарегистрируйся</a>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/34a4f1a444.js" crossorigin="anonymous"></script>
</body>

</html>