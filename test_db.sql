-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 25 2021 г., 15:22
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `short_content`, `content`, `author_name`, `preview`, `type`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-12 08:05:04', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 19:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 19:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 19:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2017-05-11 19:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 19:00:05', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 19:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 19:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-05-11 19:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication'),
(10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2016-03-11 19:00:00', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 'TopicAuthor', 'images/2.png', 'NewsPublication');

-- --------------------------------------------------------

--
-- Структура таблицы `product_brand`
--

CREATE TABLE `product_brand` (
  `id` int(11) NOT NULL,
  `name_brand` varchar(255) NOT NULL,
  `description` text,
  `sort_order` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_brand`
--

INSERT INTO `product_brand` (`id`, `name_brand`, `description`, `sort_order`, `status`) VALUES
(1, 'Audi', NULL, 1, 1),
(2, 'Автоваз', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_model`
--

CREATE TABLE `product_model` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_model`
--

INSERT INTO `product_model` (`id`, `brand_id`, `user_id`, `name`, `description`, `image`) VALUES
(1, NULL, 1, 'Kia Carnival IV', 'KIA Carnival – переднеприводный минивэн полноразмерного сегмента, который в самой южнокорейской компании позиционируют в качестве представителя «нового класса» под названием GUV (Grand Utility Vehicle), как бы намекая на его «кроссоверную направленность». По словам разработчиков, этот автомобиль сочетает в себе комфорт и вместительность минивэна с динамикой и характером городского кроссовера, а нацелен, в первую очередь, на прогрессивные молодые семьи с несколькими детьми.', '0001_kiaСarnival.jpg'),
(4, NULL, 1, 'Bentley Arnage R 6.8', 'В сентябре 2006 года дебютировали обнавленные модели Arnage в исполнениях T,R и RL. Изменения коснулись как экстерьера автомобиля, так и интерьера, была модернизирована и конструкция. Внешне обновленные Arnage отличает новая радиаторная решетка, носовая скульптура с фирменной “крылатой B” для версий R и RL, эмблемы Bentley на подшипниках для колесных дисков, новая ксеноновая светотехника и эмблемы на задних стойках крыши. Версии Arnage R и Arnage RL предлагаются с салоном, отделанным корнем орехового дерева и кожей и двухцветной окраской кузова.', '0002_audi.jpg'),
(5, 1, 2, 'Audi 80 2.0', '<table> <tbody> <tr> <td>Год выпуска:</td> <td>1993</td> </tr> <tr> <td>Тип кузова:</td> <td>Седан</td> </tr> <tr> <td>Трансмиссия:</td> <td>механическая</td> </tr> <tr> <td>Привод:</td> <td>передний</td> </tr> <tr> <td>Поколение:</td> <td>4 поколение </td> </tr> <tr> <td>Двигатель:</td> <td>бензин, 2000 куб.см, 115 л.с.</td> </tr> <tr> <td>Расход топлива по трассе:</td> <td>как давить на педаль л/100км</td> </tr> <tr> <td>Руль:</td> <td>Левый</td> </tr> </tbody> </table>', '0003_bentley.jpg'),
(6, 2, 1, 'ГАЗ 13 «Чайка»', 'ГАЗ 13 «Чайка» – седан F-класса, задний привод. Автомат. Бензиновый двигатель мощностью 195 лошадиных сил.', '0004_gaz12.jpg'),
(7, NULL, 2, 'Mercedes-Benz W123', 'ГАЗ 13 «Чайка» – седан F-класса, задний привод. Автомат. Бензиновый двигатель мощностью 195 лошадиных сил.', '0005_mersBenz.jpg'),
(8, 2, 2, 'ЗИЛ 111', 'ЗИЛ 111 – седан, задний привод. Автомат. Бензиновый двигатель мощностью 200 лошадиных сил.\r\n', '0006_zill115.jpg'),
(9, NULL, 2, 'Bentley S III', 'Bentley S III – седан, задний привод. Автомат. Бензиновый двигатель мощностью 200 лошадиных сил.\r\n', '0007_bentley.jpg'),
(10, 1, 1, 'Ауди', '', '4af52202f77beb11ba59ce2056aa7878.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) DEFAULT NULL,
  `nick_name` varchar(60) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `role_user` varchar(60) DEFAULT NULL,
  `pass_hash` varchar(32) NOT NULL,
  `avatar` varchar(60) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `nick_name`, `email`, `role_user`, `pass_hash`, `avatar`, `status`) VALUES
(1, 'Админ', 'admin', 'aychanov.tlegen@mail.ru', 'admin', '25d55ad283aa400af464c76d713c07ad', NULL, 1),
(2, 'Менеджер', 'manager', 'manager@mail.ru', 'user', '25d55ad283aa400af464c76d713c07ad', NULL, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_model`
--
ALTER TABLE `product_model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product_model`
--
ALTER TABLE `product_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product_model`
--
ALTER TABLE `product_model`
  ADD CONSTRAINT `product_model_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
