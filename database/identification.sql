-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 11 2020 г., 23:46
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `identification`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lvluser` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `email`, `password`, `lvluser`) VALUES
(18, 'Стас', 'Карноза', 'ProvadeRR', 'stas.karnoza@gmail.com', '37c7bf094ae4c01667362a71766176e3', 1),
(19, 'Stas', 'Karnoza', 'ProvadeR', 'stas.karnoza@mail.ru', '6374a45bc0a0dddf488ddc5b5b2bc3e6', 3),
(20, 'Алексей', 'Кравченко', 'xslon', 'leha@gmail.com', '256f656bbb1387836fa231732694eecc', 1),
(21, 'UPN', 'fffff', 'xslon', '380675639404@gmail.com', '256f656bbb1387836fa231732694eecc', 1),
(22, 'Леха', 'Слон', 'flfllgkgkkgktg', 'stas.karnoza@gmail.com', '6374a45bc0a0dddf488ddc5b5b2bc3e6', 1),
(23, 'Станислав', 'Карноза', 'stas', 'qwe@gmail.com', 'c211c9e7e7689217c0cb99aafe30f3d7', 4),
(24, 'Леха', 'Кравченко', 'lleha', 'ssss@mail.ru', '202cb962ac59075b964b07152d234b70', 3),
(25, 'Eldar', 'Mirzabekov', 'Eldarka228', 'eldarmirzabekov@gmail.com', '9b8b2dc00a2331d386c6d6b2696072a9', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
