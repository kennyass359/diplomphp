<?php

session_start();


?>






<?php include ("header.php")?>


    <!-- payment -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Оплата</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">
            <p><?php echo $_GET['order_status'];?></p>
            <p>Общая стоимость: ₽<?php echo $_SESSION['total'] ?></p>
            <input class="btn btn-primary" type="submit" value="Оплата">
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