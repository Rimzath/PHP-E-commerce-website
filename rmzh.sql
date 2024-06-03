--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- Dumping data for table `products`


INSERT INTO `products` (`product_id`, `product_name`, `in_stock`, `price`, `cost`, `filepath`) VALUES
(4, 'Asus-TUF-A16', 25, 185000, 200000, 'Asus-TUF-A16-gaming-laptop-review.jpg'),
(5, 'DELL G15', 10, 100000, 120000, 'DellG15RTX3050.jpg'),
(6, 'Asus Rog Zephyrus', 10, 562000, 600000, 'ROG-Zephyrus-Duo-15.jpg'),
(7, 'Mac Book Pro 14 M2', 15, 450000, 560000, 'macbook-pro-14-m2-max.webp'),
(8, 'Ideapad Slim 3i', 15, 95600, 115000, 'ideapadslim3i.webp');

-- --------------------------------------------------------


--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- Dumping data for table `signup`


INSERT INTO `signup` (`id`, `name`, `username`, `password`, `user_type`) VALUES
(1, 'user', 'uname', '1234', 'customer'),
(2, 'uoc', 'uoc', 'uoc', 'customer'),
(3, 'admin', 'admin', '1234', 'admin');
COMMIT;