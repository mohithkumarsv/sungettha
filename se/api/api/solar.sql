CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `login` (`id`, `userName`, `password`, `token`, `firstName`, `lastName`, `phone`, `email`, `type`, `active`, `createdDate`, `updatedDate`) 
VALUES (1, 'emsadmin', 'emsadmin', '2057564ac24451b55368bb170fe0b91d', 'admin', 'admin', '9986552521', 'admin@gmail.com', 1, 1, '2017-02-02 13:43:08', '2017-02-02 13:43:08'),
(2, 'solaradmin', 'solaradmin', '$2a$10$51755504713a5514401a8u8lAz23UpV3vt1XDot031sidMRu3VdQ2', 'admin', 'admin', '213123', 'admin@gmail.com', 1, 1, '2017-02-02 13:45:31', '2017-02-02 14:21:27');

-- event mangement admin
/*Categories */
CREATE TABLE locationEntitySolar(
  `id` int not null AUTO_INCREMENT,
  `package` varchar(256) not null,
  `title` varchar(256) not null,
  `field1` varchar(500) not null,
  `field2` varchar(500) not null,
  `field3` varchar(500) not null,
  `field4` varchar(500) DEFAULT NULL,
  `field5` varchar(500) DEFAULT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
);
/*video gallery */
CREATE TABLE videoEntitySolar(
  `id` int not null AUTO_INCREMENT,
  `page` varchar(1000) not null,
  `title` varchar(1000) not null,
  `description` varchar(2000) not null,
  `url` varchar(1500) not null,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
);
CREATE TABLE imageEntitySolar(
  `id` int not null AUTO_INCREMENT,
  `title` varchar(1000) not null,
  `description` varchar(2000) not null,
  `url` varchar(1500) not null,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
);