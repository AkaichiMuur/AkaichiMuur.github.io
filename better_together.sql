-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 21 2021 г., 12:28
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `better_together`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id_app` int NOT NULL,
  `name_app` varchar(255) NOT NULL,
  `description_app` varchar(255) NOT NULL,
  `description_decline` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `before_img` varchar(255) NOT NULL,
  `after_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status_app` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_app` datetime NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`id_app`, `name_app`, `description_app`, `description_decline`, `category`, `before_img`, `after_img`, `status_app`, `date_app`, `id_user`) VALUES
(2, 'Ремонт дороги на улице Дроздова', 'Требуется ремонт дороги улица Дроздова, рядом с магазинов \"Пятерочка\".', NULL, 'Ремонт дороги', 'https://www.gkh.ru/images/articles/102285/dorogi-vo-dvore_500x339.jpg', 'https://gradpk.ru/wp-content/uploads/2019/06/47c6d8a01c5b926d3e251754d22f0e3e.jpg', 'Решена', '2021-03-01 18:39:36', 1),
(5, 'Ремонт здания на улице Пушкина', 'Требуется ремонт дома №35 на улице Пушкина. Облупилась штукатурка на углу здания.', NULL, 'Ремонт здания', 'https://lh3.googleusercontent.com/proxy/vdBMPiVMVvnOEN-_6XfXl1ImpXZ0PDT8jcz9vAfcdZMi4SD_tsE18zvecKs0_H2wxpr-6MNAocZIL7zwEk7OVC9e5O3XDtSRVQT6ZrOb9egWQTeAsMDBbAnh4Rig8RcatfauNEl1GqdFcOXBSobSmCHuZw4XHSS4-CRs1ezQJywPwqMAmkm25OYP2g', NULL, 'Новая', '2021-03-16 16:58:46', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `fio` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `fio`, `login`, `email`, `password`, `role`) VALUES
(1, 'Иванов-Пушкин Иван Иванович', 'ivan', 'ivan@gmail.com', 'ivan', 1),
(2, 'Admin', 'admin', 'admin@gmail.com', 'adminWSR', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id_app`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id_app` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
