CREATE TABLE `drivers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `cpf` char(14) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `situation` char(9) DEFAULT 'FREE' COMMENT 'FREE, ONGOING, RETURNING',
  `status` int(11) DEFAULT '0' COMMENT '0 - Active; 1- Inactive',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;