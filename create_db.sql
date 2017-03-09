CREATE TABLE `retro` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` varchar(20) NOT NULL,
  `channel_id` varchar(20) NOT NULL,
  `retro_item` text NOT NULL,
  `retro_completed` timestamp NULL DEFAULT NULL,
  `retro_completed_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

