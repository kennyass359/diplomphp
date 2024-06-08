-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 08 2024 г., 14:04
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `invvi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` varchar(30) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(6, 4000.00, 'Получено', 1, '89083020420', 'Чебоксары', 'проспект Мира, 100, 6', '2024-02-29 14:37:33'),
(7, 16000.00, 'Отмена', 1, '89083020420', 'Чебоксары', 'проспект Мира, 100, 6', '2024-02-29 14:39:57'),
(8, 16000.00, 'Отправлено', 1, '89083020420', 'Чебоксары', 'проспект Мира, 100, 6', '2024-02-29 14:40:52'),
(9, 4000.00, 'Получено', 1, '89083020420', 'Чебоксары', 'проспект Мира, 100, 6', '2024-02-29 14:42:26'),
(10, 7000.00, 'received', 1, '89083020420', 'Чебоксары', 'проспект Мира, 100, 6', '2024-03-07 18:24:38'),
(11, 20000.00, 'received', 1, '89083020420', 'Чебоксары', 'проспект Мира, 100, 6', '2024-03-14 12:55:24'),
(12, 7000.00, 'Зарезервировано', 1, '89083020420', 'Чебоксары', 'проспект Мира, 100, 6', '2024-03-14 13:24:19'),
(13, 12000.00, 'Зарезервировано', 1, '89083020420', 'Чебоксары', 'проспект Мира, 100, 6', '2024-04-10 12:29:56'),
(14, 8000.00, 'Получено', 1, '89083020420', 'Чебоксары', 'проспект Мира, 100, 6', '2024-05-14 18:09:47'),
(15, 4000.00, 'Зарезервировано', 4, '12', 'сибирь', 'мира 100', '2024-06-08 13:49:59');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 5, '1', 'Зимний лёд', '10.png.webp', 4000.00, 1, 1, '2024-02-29 14:02:30'),
(2, 5, '2', 'Весеннее цветение', '13.png.webp', 4000.00, 1, 1, '2024-02-29 14:02:30'),
(3, 6, '1', 'Зимний лёд', '10.png.webp', 4000.00, 1, 1, '2024-02-29 14:37:33'),
(4, 7, '2', 'Весеннее цветение', '13.png.webp', 4000.00, 4, 1, '2024-02-29 14:39:57'),
(5, 8, '3', 'Осенний призыв', '16.png.webp', 4000.00, 4, 1, '2024-02-29 14:40:52'),
(6, 9, '2', 'Весеннее цветение', '13.png.webp', 4000.00, 1, 1, '2024-02-29 14:42:26'),
(7, 10, '8', 'КофтаЧетыре', 'clothes4.jpg', 7000.00, 1, 1, '2024-03-07 18:24:38'),
(8, 11, '2', 'Весеннее цветение', '13.png.webp', 4000.00, 4, 1, '2024-03-14 12:55:24'),
(9, 11, '3', 'Осенний призыв', '16.png.webp', 4000.00, 1, 1, '2024-03-14 12:55:24'),
(10, 12, '6', 'КофтаДва', 'clothes2.webp', 7000.00, 1, 1, '2024-03-14 13:24:19'),
(11, 13, '2', 'Весеннее цветение', '13.png.webp', 4000.00, 2, 1, '2024-04-10 12:29:56'),
(12, 13, '1', 'Зимний лёд', '10.png.webp', 4000.00, 1, 1, '2024-04-10 12:29:56'),
(13, 14, '2', 'Весеннее цветение', '13.png.webp', 4000.00, 1, 1, '2024-05-14 18:09:47'),
(14, 14, '1', 'Зимний лёд', '10.png.webp', 4000.00, 1, 1, '2024-05-14 18:09:47'),
(15, 15, '3', 'Осенний призыв', '16.png.webp', 4000.00, 1, 4, '2024-06-08 13:49:59');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Зимний лёд', 'tshirt', 'Холод всегда по душе', '10.png.webp', '10.png.webp', '10.png.webp', '10.png.webp', 4000.00, 0, 'blue'),
(2, 'Весеннее цветение', 'tshirt', 'Весна, слякоть, за что...', '13.png.webp', '13.png.webp', '13.png.webp', '13.png.webp', 4000.00, 0, 'white'),
(3, 'Осенний призыв', 'tshirt', 'Здравствуй небо в сапогах', '16.png.webp', '16.png.webp', '16.png.webp', '16.png.webp', 4000.00, 0, 'brown'),
(4, 'Просто футболка', 'tshirt', 'Просто', '19.jpg.webp', '19.jpg.webp', '19.jpg.webp', '19.jpg.webp', 4000.00, 0, 'beige'),
(5, 'Кофта en', 'hoodie', 'Очень крутая первая кофта', 'clothes1.webp', 'clothes1.webp', 'clothes1.webp', 'clothes1.webp', 7000.00, 0, 'gray'),
(6, 'Кофта to', 'hoodie', 'Очень крутая вторая кофта', 'clothes2.webp', 'clothes2.webp', 'clothes2.webp', 'clothes2.webp', 7000.00, 0, 'gray'),
(7, 'Кофта tre', 'hoodie', 'Очень крутая третья кофта', 'clothes3.webp', 'clothes3.webp', 'clothes3.webp', 'clothes3.webp', 7000.00, 0, 'gray'),
(8, 'Кофта fire', 'hoodie', 'Очень крутая четвертая кофта', 'clothes4.jpg', 'clothes4.jpg', 'clothes4.jpg', 'clothes4.jpg', 7000.00, 0, 'gray');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Михаил Василfьев', 'michael09102004@gmail.com', '123456789'),
(2, 'озон', 'vkira0007@gmail.cjm', 'qwertyu'),
(3, 'Михаил', 'misha0910200458@gmail.com', '12345678'),
(4, 'Покупатель', 'iwantbuy@gmail.com', 'pehm3avf');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
