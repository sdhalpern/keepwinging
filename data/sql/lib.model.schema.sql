
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`tag_id` INTEGER(11)  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `user_FI_1` (`tag_id`),
	CONSTRAINT `user_FK_1`
		FOREIGN KEY (`tag_id`)
		REFERENCES `tag` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- wing
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `wing`;


CREATE TABLE `wing`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER(11)  NOT NULL,
	`number` INTEGER(11)  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `wing_FI_1` (`user_id`),
	CONSTRAINT `wing_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `user` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tag`;


CREATE TABLE `tag`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tag` VARCHAR(255)  NOT NULL,
	`number` INTEGER(11)  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- scan_log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `scan_log`;


CREATE TABLE `scan_log`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tag_id` INTEGER(11)  NOT NULL,
	`skipped` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `scan_log_FI_1` (`tag_id`),
	CONSTRAINT `scan_log_FK_1`
		FOREIGN KEY (`tag_id`)
		REFERENCES `tag` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Engine=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
