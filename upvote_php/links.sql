CREATE TABLE IF NOT EXISTS `links` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `votes` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`)
)

INSERT INTO `links` (`id`, `title`, `description`, `votes`) VALUES
(1, 'Favorite Star Rating with jQuery', 'This tutorial is for doing favorite star rating using jQuery. It displays list of HTML stars by using li tags. These stars are highlighted by using CSS and jQuery based on the favorite rating selected by the user.', 0),
(2, 'PHP RSS Feed Read and List', 'PHP''s simplexml_load_file() function is used for reading data from xml file. Using this function, we can parse RSS feed to get item object array.', 0),
(3, 'jQuery AJAX Autocomplete – Country Example', 'Autocomplete feature is used to provide auto suggestion for users while entering input. It suggests country names for the users based on the keyword they entered into the input field by using jQuery AJAX.', 0);
