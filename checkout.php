<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
    exit();
}

if (!empty($_SESSION['cart']) && isset($_POST['checkout'])){



}else{
    header('location:index.php');
}

?>






<?php include ("header.php")?>


    <!-- checkout -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Введите данные</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" method="POST" action="server/place_order.php">
                <div class="form-group checkout-small-element">
                    <label for="">Имя</label>
                    <input type="text" class="form-control" name="name" id="checkout-name" required>
                </div>
                <div class="form-group mt-3 checkout-small-element">
                    <label for="">Электронная почта</label>
                    <input type="email" class="form-control" name="email" id="checkout-email" required>
                </div>
                <div class="form-group mt-3 checkout-small-element">
                    <label for="">Номер телефона</label>
                    <input type="tel " class="form-control" name="phone" id="checkout-phone" required>
                </div>
                <div class="form-group mt-3 checkout-small-element">
                    <label for="">Город</label>
                    <input type="text" class="form-control" name="city" id="checkout-city" required>
                </div>
                <div class="form-group mt-3 checkout-large-element">
                    <label for="">Адрес</label>
                    <input type="text" class="form-control" name="address" id="checkout-address" required>
                </div>
                <div class="form-group mt-3 checkout-btn-container">
                    <p>Общая сумма: ₽ <?php echo $_SESSION['total']; ?></p>
                    <input type="submit" name="place_order" class="btn" id="checkout-btn" value="Оформить заказ">
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