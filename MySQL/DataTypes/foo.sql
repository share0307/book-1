CREATE TABLE `foo` (
  `type_int` INT(11) UNSIGNED NOT NULL  DEFAULT '0' COMMENT 'type_int',
  `type_tinyint` TINYINT(3) UNSIGNED NOT NULL  DEFAULT '0' COMMENT 'type_tinyint',
  `type_varchar_1` VARCHAR(255)  NOT NULL  DEFAULT '0' COMMENT 'type_varchar_1',
  `type_varchar_2` VARCHAR(65535)  NOT NULL  DEFAULT '0' COMMENT 'type_varchar_2',
  `type_text` TEXT NOT NULL  DEFAULT '0' COMMENT 'type_text',
  `type_timestamp` TIMESTAMP NULL DEFAULT NULL COMMENT 'type_timestamp'
) ENGINE=InnoDB  DEFAULT CHARSET=UTF8 COMMENT='示例表';