<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>invvi - Органическая одежда</title>
  <link rel="shortcut icon" href="./assets/img/Group 1.svg" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary py-4 fixed-top">
    <div class="container">
      <a href="./index.php"><img src="./assets/img/Group 1.svg" alt="" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="./shop.html">Каталог</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Бренд</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./contact.html">Контакты </a>
          </li>

          <li class="nav-item">
            <a href="./cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
            <a href="./account.html"><i class="fa-solid fa-user"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- home -->
  <section id="home">
    <div class="container">
      <h4>На всю жизнь</h4>
      <h1><span>Органическая</span> вечность</h1>
      <p>Качество навсегда</p>
      <button>Смотреть</button>
    </div>
  </section>
  <br />

  <!-- brand -->
  <section id="brand" class="container">
    <div class="row g-6 gy-4">
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="./assets/img/Design_uden_navn-38.jpg.webp" alt="" />
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="./assets/img/Design_uden_navn-39.jpg.webp" alt="" />
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12"
        src="./assets/img/1_06c6290b-89fd-4e90-bcca-c2c8dfb9b0fb.jpg.webp" alt="" />
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12"
        src="./assets/img/2_72426d31-2d1a-4082-94ca-8047d1110f84.jpg.webp" alt="" />
    </div>
  </section>

  <!-- featured -->
  <section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3>Наш выбор</h3>
      <hr class="mx-auto"/>
      <p>Только избранные Вами товары</p>
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

  <!-- banner -->
  <section id="banner" class="my-5 py-5">
    <div class="container">
      <h4>Зимнее время</h4>
      <h1>Чтобы было тепло</h1>
      <button class="text-uppercase">Смотреть</button>
    </div>
  </section>

  <!-- clothes -->
  <section id="featured" class="my-5 ">
    <div class="container text-center mt-5">
      <h3>Толстовки и кофты</h3>
      <hr class="mx-auto"/>
      <p>Хлопок, чистота, комфорт</p>
    </div>
    <div class="row mx-auto container-fluid">
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/clothes1.webp" alt="" />
        <h5 class="p-name">Зимний лёд</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/clothes2.webp" alt="" />
        <h5 class="p-name">Весеннее цветение</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/clothes3.webp" alt="" />
        <h5 class="p-name">Осенний призыв</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/clothes4.jpg" alt="" />
        <h5 class="p-name">Просто футболка</h5>
        <h4 class="p-price">40000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
    </div>
  </section> 

  <!-- shoes -->
  <section id="featured" class="my-5 ">
    <div class="container text-center mt-5">
      <h3>Брюки и джинсы</h3>
      <hr class="mx-auto"/>
      <p>Вечность, деним, постоянство</p>
    </div>
    <div class="row mx-auto container-fluid">
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/jeans1.webp" alt="" />
        <h5 class="p-name">Зимний лёд</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/jeans2.webp" alt="" />
        <h5 class="p-name">Весеннее цветение</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/jeans3.webp" alt="" />
        <h5 class="p-name">Осенний призыв</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/jeans4.webp" alt="" />
        <h5 class="p-name">Просто футболка</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
    </div>
  </section> 

  <!-- accesories -->
  <section id="featured" class="my-5 ">
    <div class="container text-center mt-5">
      <h3>Аксессуары</h3>
      <hr class="mx-auto"/>
      <p>Простота, спокойствие, непринуждённость</p>
    </div>
    <div class="row mx-auto container-fluid">
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/acc1.webp" alt="" />
        <h5 class="p-name">Зимний лёд</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/acc2.webp" alt="" />
        <h5 class="p-name">Весеннее цветение</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/acc3.webp" alt="" />
        <h5 class="p-name">Осенний призыв</h5>
        <h4 class="p-price">4000.00 ₽</h4>
        <button class="buy-btn">Купить</button>
      </div>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="./assets/img/acc4.webp" alt="" />
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/34a4f1a444.js" crossorigin="anonymous"></script>
</body>

</html>