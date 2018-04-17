CREATE TABLE `session` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `session_id` int(11) unsigned NOT NULL  COMMENT 'session id',
  `session_data` varchar(2000)  NOT NULL DEFAULT '' COMMENT 'session data',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=UTF8;