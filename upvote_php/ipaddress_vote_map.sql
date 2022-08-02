CREATE TABLE IF NOT EXISTS `ipaddress_vote_map` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `link_id` int(8) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `vote_rank` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
)