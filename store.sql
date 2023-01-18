

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `admin` (`admin_id`, `adminUser`, `password`, `pass`) VALUES
(23, 'pana.hazhar@gmail.com', 0, 'Pana2022');

-- --------------------------------------------------------


CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------



CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



INSERT INTO `items` (`id`, `name`, `price`) VALUES
(1, 'Cannon EOS', 36000),
(2, 'Sony DSLR', 40000),
(3, 'Sony DSLR', 50000),
(4, 'Olympus DSLR', 80000),
(5, 'Titan Model #301', 13000),
(6, 'Titan Model #201', 3000),
(7, 'HMT Milan', 8000),
(8, 'Favre Lueba #111', 18000),
(9, 'Raymond', 1500),
(10, 'Charles', 1000),
(11, 'HXR', 900),
(12, 'PINK', 1200);

-- --------------------------------------------------------



CREATE TABLE `products` (
  `ProductName` varchar(202) NOT NULL,
  `Price` int(11) NOT NULL,
  `disc` varchar(202) NOT NULL,
  `my_img` varchar(202) NOT NULL,
  `prId` int(1) NOT NULL,
  `productType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `products` (`ProductName`, `Price`, `disc`, `my_img`, `prId`, `productType`) VALUES
('vcx', 4, 'dsfds', 'IMG-63b0bb68ac24f1.78221727.jpg', 12, 'laptop'),
('vcx', 4, 'dsfds', 'IMG-63b0bbb51e4228.46262385.jpg', 13, 'watch'),
('czcx', 676, 'dsaa', 'IMG-63b0bdaa8fbf97.13931395.png', 14, ''),
('czcx', 676, 'f', 'IMG-63b0be25c9ecb6.76306493.png', 15, 'mobile'),
('czcx', 676, 'f', 'IMG-63b0be900df279.95288627.png', 16, ''),
('czcx', 676, 'f', 'IMG-63b0beb8c01003.25316244.png', 17, 'mobile');



CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`) VALUES
(4, 'yugesh verma', 'yugeshverma32@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '6263056779', 'bhilai', '25 commercial complex, nehru nagar,east near vijya bank, bhilai C.G.'),
(5, 'yugesh', 'yugeshverma@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '9165063741', 'bhilai', 'bhilai'),
(6, 'pana', 'pana1@gmail.com', '7f34fc16528ceac28bb5a401c4c93bac', '0772', 'sulaymaniah', 'ff'),
(7, 'ali', 'ali24@gmail.com', '2ca66ee4ce1db271e227c2a973eeeabe', 'gf', 'Arbil', 'madacaskar');



CREATE TABLE `users_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


INSERT INTO `users_items` (`id`, `user_id`, `item_id`, `status`) VALUES
(18, 5, 11, 'Added to cart'),
(20, 5, 5, 'Added to cart'),
(22, 0, 1, 'Added to cart'),
(23, 0, 1, 'Added to cart'),
(24, 0, 1, 'Added to cart');



ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);


ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`prId`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);


ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE `products`
  MODIFY `prId` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
