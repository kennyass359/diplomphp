<?php

session_start();
include('server/connection.php');


if (!isset($_SESSION['logged_in'])) {
  header('location: login.php');
  exit;
}

if (isset($_GET['logout'])) {
  if (isset($_SESSION['logged_in'])) {
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit;
  }
}

if (isset($_POST['change_password'])) {
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $user_email = $_SESSION['user_email'];

  if ($password !== $confirmPassword) {
    header('location: account.php?error=Пароли не совпадает');
  } else if (strlen($password) < 6) {
    header('location: account.php?error=Пароль должен иметь более 6 символов');
  } else {
    $stmt = $conn->prepare("UPDATE users SET user_password = ? WHERE user_email = ?");
    $stmt->bind_param('ss', $password, $user_email);

    if ($stmt->execute()) {
      header('location: account.php?message=Пароль был обновлен');
    } else {
      header('location: account.php?message=При обновлении пароля произошла ошибка');
    }
  }
}

if (isset($_SESSION['logged_in'])) {

  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ");

  $stmt->bind_param('i', $user_id);

  $stmt->execute();

  $orders = $stmt->get_result();
}

?>




<?php include("header.php") ?>




<!-- Account -->
<section class="my-5 py-5">
  <div class="row container mx-auto">
    <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
      <p class="text-center" style="color:green"> <?php if (isset($_GET['register_success'])) {
                                                    echo $_GET['register_success'];
                                                  } ?> </p>
      <p class="text-center" style="color:green"> <?php if (isset($_GET['login_success'])) {
                                                    echo $_GET['login_success'];
                                                  } ?> </p>
      <h3 class="font-weight-bold">Аккаунт</h3>
      <hr class="mx-auto">
      <div class="account-info">
        <p>Имя: <span><?php if (isset($_SESSION['user_name'])) {
                        echo $_SESSION['user_name'];
                      } ?></span></p>
        <p>Email: <span><?php if (isset($_SESSION['user_email'])) {
                          echo $_SESSION['user_email'];
                        } ?></span></p>
        <p><a href="#orders" id="orders-btn">Ваши заказы</a></p>
        <p><a href="account.php?logout=1" id="logout-btn">Выйти</a></p>
      </div>
    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">
      <form id="account-form" method="POST" action="account.php">
        <p class="text-center" style="color:red"> <?php if (isset($_GET['error'])) {
                                                    echo $_GET['error'];
                                                  } ?> </p>
        <p class="text-center" style="color:green"> <?php if (isset($_GET['message'])) {
                                                      echo $_GET['message'];
                                                    } ?> </p>
        <h3>Сменить пароль</h3>
        <hr class="mx-auto">
        <div class="form-group">
          <label>Пароль</label>
          <input type="password" class="form-control" id="account-password" name="password">
        </div>
        <div class="form-group">
          <label>Подтвердите пароль</label>
          <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword">
        </div>
        <div class="form-group">
          <input type="submit" value="Сменить пароль" name="change_password" class="btn" id="change-pass-btn">
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
      <th>id Заказа</th>
      <th>Стоимость заказа</th>
      <th>Статус заказа</th>
      <th>Дата заказа</th>
      <th>Детали заказа</th>
    </tr>
    
    <?php while($row = $orders->fetch_assoc() ) { ?>

<tr>
<td>
       <span><?php echo $row['order_id']; ?></span>
    </td>
 
    <td>
       <span> ₽ <?php echo $row['order_cost']; ?></span>
    </td>

    <td>
       <span><?php echo $row['order_status']; ?></span>
    </td>

    <td>
       <span><?php echo $row['order_date']; ?></span>
    </td>

    <td>
      <form method="POST" action="order_details.php">
        <input type="hidden" value=" <?php echo $row['order_status']; ?>" name= "order_status"/>
        <input type="hidden" value=" <?php echo $row['order_id']; ?>" name= "order_id"/>
        <input class="btn order-details-btn" name="order_details_btn" type="submit" value="Детали"/>
      </form>
    </td>

</tr> 
<?php }  ?> 

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