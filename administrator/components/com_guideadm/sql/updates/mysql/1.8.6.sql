
-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Accounts
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_accounts` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`catid` BIGINT(20) UNSIGNED ,
	`user_id` BIGINT(20) UNSIGNED ,
	`bank_id` BIGINT(20) UNSIGNED ,
	`account_type` VARCHAR(2) NOT NULL ,
	`agency` VARCHAR(12) ,
	`account` VARCHAR(32) ,
	`swift` VARCHAR(11) ,
	`iban` VARCHAR(40) ,
	`created_by` BIGINT(20) UNSIGNED ,
	`creation_date` DATE ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATE ,
	`ordering` INT(11) ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,

	PRIMARY KEY  (`id`),
	KEY `catid` (`catid`),
	KEY `user_id` (`user_id`),
	KEY `bank_id` (`bank_id`),
	KEY `created_by` (`created_by`),
	KEY `modified_by` (`modified_by`),
	KEY `ordering` (`ordering`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Address Labels
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_addresslabels` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`type` VARCHAR(50) NOT NULL ,
	`language` BIGINT(20) UNSIGNED ,
	`creation_date` DATETIME ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATETIME ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`ordering` INT(11) ,
	`published` TINYINT(11) DEFAULT 0 ,

	PRIMARY KEY  (`id`),
	KEY `language` (`language`),
	KEY `created_by` (`created_by`),
	KEY `ordering` (`ordering`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Addresses
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_addresses` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`catid` BIGINT(20) UNSIGNED ,
	`user_id` BIGINT(20) UNSIGNED ,
	`default_address` TINYINT DEFAULT 0 ,
	`address_label` BIGINT(20) UNSIGNED ,
	`country_id` BIGINT(20) UNSIGNED ,
	`state_id` BIGINT(20) UNSIGNED ,
	`address` VARCHAR(255) ,
	`suburb` VARCHAR(255) ,
	`zipcode` VARCHAR(255) ,
	`city` VARCHAR(255) ,
	`creation_date` DATE ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATE ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`ordering` INT(11) ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,

	PRIMARY KEY  (`id`),
	KEY `catid` (`catid`),
	KEY `user_id` (`user_id`),
	KEY `default_address` (`default_address`),
	KEY `country_id` (`country_id`),
	KEY `state_id` (`state_id`),
	KEY `created_by` (`created_by`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Brands
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_brands` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`name` VARCHAR(255) NOT NULL ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,

	PRIMARY KEY  (`id`),
	KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : BusinessTypes
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_businesstypes` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`country_id` BIGINT(20) UNSIGNED ,
	`type_code` VARCHAR(25) ,
	`type_name` VARCHAR(255) ,
	`language` BIGINT(20) UNSIGNED ,
	`information` TEXT ,
	`ordering` INT(11) ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATE ,
	`creation_date` DATE ,
	`created_by` BIGINT(20) UNSIGNED ,

	PRIMARY KEY  (`id`),
	KEY `country_id` (`country_id`),
	KEY `type_code` (`type_code`),
	KEY `ordering` (`ordering`),
	KEY `created_by` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Categories
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_categories` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`mgcat` VARCHAR(255) ,
	`published` TINYINT(11) ,

	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : ContactLang
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_contactlang` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`user_id` BIGINT(20) UNSIGNED ,
	`language` BIGINT(20) UNSIGNED NOT NULL ,
	`prof_level` VARCHAR(2) ,
	`creation_date` DATE ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATE ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`published` TINYINT(11) ,
	`ordering` INT(11) ,

	PRIMARY KEY  (`id`),
	KEY `user_id` (`user_id`),
	KEY `prof_level` (`prof_level`),
	KEY `created_by` (`created_by`),
	KEY `published` (`published`),
	KEY `ordering` (`ordering`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Doc Labels
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_doclabels` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`doc_type_name` VARCHAR(255) NOT NULL ,
	`doc_type_long` VARCHAR(255) ,
	`country_id` BIGINT(20) UNSIGNED ,
	`language` BIGINT(20) UNSIGNED ,
	`creation_date` DATETIME ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATETIME ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`ordering` INT(11) ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,

	PRIMARY KEY  (`id`),
	KEY `doc_type_name` (`doc_type_name`),
	KEY `country_id` (`country_id`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Countries
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_countries` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`iso_2` VARCHAR(2) NOT NULL ,
	`continent` VARCHAR(1) ,
	`country_name` VARCHAR(80) ,
	`long_name` VARCHAR(80) NOT NULL ,
	`flag` VARCHAR(255) ,
	`iso_3` VARCHAR(3) NOT NULL ,
	`un_member` TINYINT ,
	`numeric_code` VARCHAR(6) ,
	`calling_code` VARCHAR(8) ,
	`cctld` VARCHAR(5) ,
	`population` INT(11) ,
	`total_area` INT(11) ,
	`land_area` INT(11) ,
	`water_area` INT(11) ,
	`language` BIGINT(20) UNSIGNED ,
	`ordering` INT(11) ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,

	PRIMARY KEY  (`id`),
	UNIQUE KEY(iso_3),
	KEY `iso_2` (`iso_2`),
	KEY `continent` (`continent`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Documents
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_documents` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`catid` BIGINT(20) UNSIGNED ,
	`user_id` BIGINT(20) UNSIGNED ,
	`label_id` BIGINT(20) UNSIGNED ,
	`number` VARCHAR(255) ,
	`emission_date` DATE ,
	`expiration_date` DATE ,
	`emmision` VARCHAR(255) ,
	`image` VARCHAR(255) ,
	`image2` VARCHAR(255) ,
	`creation_date` DATE ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATE ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`ordering` INT(11) ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,
	`my_joomla_access` BIGINT(20) UNSIGNED ,
	`my_joomla_user` BIGINT(20) UNSIGNED ,

	PRIMARY KEY  (`id`),
	KEY `catid` (`catid`),
	KEY `user_id` (`user_id`),
	KEY `label_id` (`label_id`),
	KEY `expiration_date` (`expiration_date`),
	KEY `created_by` (`created_by`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Currencies
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_currencies` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`currency_id` VARCHAR(3) ,
	`title` VARCHAR(255) ,
	`published` TINYINT(11) ,
	`params` TEXT ,
	`symbol` VARCHAR(5) ,

	PRIMARY KEY  (`id`),
	KEY `currency_id` (`currency_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Lang
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_lang` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`lang_code` VARCHAR(7) ,
	`title` VARCHAR(50) ,
	`title_native` VARCHAR(50) ,
	`sef` VARCHAR(50) ,
	`image` VARCHAR(50) ,
	`description` VARCHAR(512) ,
	`metakey` TEXT ,
	`metadesc` TEXT ,
	`sitename` VARCHAR(1024) ,
	`published` TINYINT(11) ,
	`access` BIGINT(20) UNSIGNED DEFAULT 1 ,
	`ordering` INT(11) ,

	PRIMARY KEY  (`id`),
	KEY `lang_code` (`lang_code`),
	KEY `sef` (`sef`),
	KEY `image` (`image`),
	KEY `access` (`access`),
	KEY `ordering` (`ordering`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Languages
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_languages` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`name` VARCHAR(30) NOT NULL ,
	`short_name` VARCHAR(10) NOT NULL ,
	`flag` VARCHAR(2) ,
	`language` BIGINT(20) UNSIGNED ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,
	`ordering` INT(11) ,

	PRIMARY KEY  (`id`),
	KEY `name` (`name`),
	KEY `language` (`language`),
	KEY `published` (`published`),
	KEY `ordering` (`ordering`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Operators
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_operators` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`type` VARCHAR(2) ,
	`operator` VARCHAR(50) ,
	`contact_id` BIGINT(20) UNSIGNED ,
	`country_id` BIGINT(20) UNSIGNED ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,
	`ordering` INT(11) ,

	PRIMARY KEY  (`id`),
	KEY `type` (`type`),
	KEY `country_id` (`country_id`),
	KEY `published` (`published`),
	KEY `ordering` (`ordering`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Phone Labels
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_phonelabels` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`type` VARCHAR(255) ,
	`language` BIGINT(20) UNSIGNED ,
	`creation_date` DATETIME ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATETIME ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,
	`ordering` INT(11) ,

	PRIMARY KEY  (`id`),
	KEY `type` (`type`),
	KEY `language` (`language`),
	KEY `created_by` (`created_by`),
	KEY `published` (`published`),
	KEY `ordering` (`ordering`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Phones
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_phones` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`catid` BIGINT(20) UNSIGNED ,
	`user_id` BIGINT(20) UNSIGNED NOT NULL ,
	`default_phone` TINYINT DEFAULT 0 ,
	`label` BIGINT(20) UNSIGNED ,
	`cdc` BIGINT(20) UNSIGNED ,
	`number` VARCHAR(32) NOT NULL ,
	`operator` BIGINT(20) UNSIGNED ,
	`creation_date` DATE ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATE ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,
	`ordering` INT(11) ,

	PRIMARY KEY  (`id`),
	KEY `catid` (`catid`),
	KEY `user_id` (`user_id`),
	KEY `default_phone` (`default_phone`),
	KEY `label` (`label`),
	KEY `cdc` (`cdc`),
	KEY `operator` (`operator`),
	KEY `creation_date` (`creation_date`),
	KEY `created_by` (`created_by`),
	KEY `modification_date` (`modification_date`),
	KEY `modified_by` (`modified_by`),
	KEY `published` (`published`),
	KEY `ordering` (`ordering`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Prices
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_prices` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`grouper` INT(11) NOT NULL DEFAULT 0 ,
	`name` VARCHAR(255) ,
	`company` BIGINT(20) UNSIGNED NOT NULL ,
	`currency` BIGINT(20) UNSIGNED NOT NULL ,
	`hourly_rate` VARCHAR(4) NOT NULL ,
	`min_time` TIMESTAMP ,
	`from_date` DATE ,
	`until_date` DATE ,
	`remuneration` TINYINT DEFAULT 0 ,
	`remark` TEXT ,
	`pax_01` FLOAT ,
	`pax_02` FLOAT ,
	`pax_03` FLOAT ,
	`pax_04` FLOAT ,
	`pax_05` FLOAT ,
	`pax_06` FLOAT ,
	`pax_07` FLOAT ,
	`pax_08` FLOAT ,
	`pax_09` FLOAT ,
	`pax_10` FLOAT ,
	`pax_11` FLOAT ,
	`pax_12` FLOAT ,
	`pax_13` FLOAT ,
	`pax_14` FLOAT ,
	`pax_15` FLOAT ,
	`pax_16` FLOAT ,
	`pax_17` FLOAT ,
	`pax_18` FLOAT ,
	`pax_19` FLOAT ,
	`pax_20` FLOAT ,
	`pax_21` FLOAT ,
	`coordination_in` TINYINT NOT NULL DEFAULT 0 ,
	`coordination_fee` FLOAT ,
	`optional` FLOAT(3,2 ) DEFAULT 0 ,
	`extra_hour_day` FLOAT ,
	`extra_hour_night` FLOAT ,
	`night_shift` TIMESTAMP ,
	`created_by` BIGINT(20) UNSIGNED ,
	`creation_date` DATETIME ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATETIME ,
	`ordering` INT(11) ,
	`published` TINYINT(11) ,
	`access` BIGINT(20) UNSIGNED DEFAULT 1 ,

	PRIMARY KEY  (`id`),
	KEY `grouper` (`grouper`),
	KEY `company` (`company`),
	KEY `currency` (`currency`),
	KEY `from_date` (`from_date`),
	KEY `until_date` (`until_date`),
	KEY `remuneration` (`remuneration`),
	KEY `coordination_in` (`coordination_in`),
	KEY `created_by` (`created_by`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Services
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_services` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`internal_service_id` VARCHAR(25) ,
	`service_name` VARCHAR(255) NOT NULL ,
	`private_tour` TINYINT NOT NULL DEFAULT 0 ,
	`entrance_fees` TINYINT NOT NULL DEFAULT 1 ,
	`duration` VARCHAR(255) NOT NULL ,
	`company` BIGINT(20) UNSIGNED NOT NULL ,
	`meals` VARCHAR(2) NOT NULL ,
	`description` TEXT ,
	`country` BIGINT(20) UNSIGNED ,
	`state` BIGINT(20) UNSIGNED ,
	`kid_friendly` TINYINT NOT NULL DEFAULT 1 ,
	`kid_comment` TEXT ,
	`disabled_friendly` TINYINT NOT NULL DEFAULT 1 ,
	`disabled_comment` TEXT ,
	`activity_level` VARCHAR(2) NOT NULL ,
	`activity_comment` TEXT ,
	`min_pax` INT(11) NOT NULL DEFAULT 1 ,
	`max_pax` INT(11) NOT NULL DEFAULT 1 ,
	`visits` BIGINT(20) UNSIGNED ,
	`remunaration` BIGINT(20) UNSIGNED ,
	`costs` BIGINT(20) UNSIGNED ,
	`policy` BIGINT(20) UNSIGNED ,
	`image_01` VARCHAR(255) ,
	`image_02` VARCHAR(255) ,
	`image_03` VARCHAR(255) ,
	`image_04` VARCHAR(255) ,
	`image_05` VARCHAR(255) ,
	`created_by` BIGINT(20) UNSIGNED ,
	`creation_date` DATETIME ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATETIME ,
	`hits` INT(11) NOT NULL DEFAULT 0 ,
	`ordering` INT(11) ,
	`published` TINYINT(11) ,

	PRIMARY KEY  (`id`),
	KEY `private_tour` (`private_tour`),
	KEY `entrance_fees` (`entrance_fees`),
	KEY `company` (`company`),
	KEY `country` (`country`),
	KEY `state` (`state`),
	KEY `kid_friendly` (`kid_friendly`),
	KEY `disabled_friendly` (`disabled_friendly`),
	KEY `activity_level` (`activity_level`),
	KEY `remunaration` (`remunaration`),
	KEY `costs` (`costs`),
	KEY `policy` (`policy`),
	KEY `created_by` (`created_by`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Contacts
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_contacts` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`type` VARCHAR(1) NOT NULL ,
	`catid` BIGINT(20) UNSIGNED ,
	`user_id` INT(11) ,
	`name` VARCHAR(100) ,
	`surname` VARCHAR(155) ,
	`alias` VARCHAR(255) ,
	`company_id` BIGINT(20) UNSIGNED ,
	`business_type` BIGINT(20) UNSIGNED ,
	`con_position` VARCHAR(255) ,
	`gender` VARCHAR(1) ,
	`driverguide` VARCHAR(1) ,
	`image` VARCHAR(255) ,
	`email` VARCHAR(255) ,
	`birthdate` DATE ,
	`nationality` BIGINT(20) UNSIGNED ,
	`country_id` BIGINT(20) UNSIGNED ,
	`state_id` BIGINT(20) UNSIGNED ,
	`ce_details_id` INT(11) ,
	`progress` INT(11) DEFAULT 0 ,
	`visits_id` BIGINT(20) UNSIGNED ,
	`creation_date` DATE ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATE ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`ordering` INT(11) ,
	`hits` INT(11) NOT NULL DEFAULT 0 ,
	`published` TINYINT(11) NOT NULL ,
	`my_joomla_access` BIGINT(20) UNSIGNED ,
	`my_joomla_user` BIGINT(20) UNSIGNED ,
	`settings` TEXT ,

	PRIMARY KEY  (`id`),
	UNIQUE KEY(alias),
	KEY `catid` (`catid`),
	KEY `user_id` (`user_id`),
	KEY `company_id` (`company_id`),
	KEY `driverguide` (`driverguide`),
	KEY `email` (`email`),
	KEY `country_id` (`country_id`),
	KEY `state_id` (`state_id`),
	KEY `ce_details_id` (`ce_details_id`),
	KEY `created_by` (`created_by`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Policies
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_policies` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`name` VARCHAR(50) ,
	`alias` VARCHAR(255) NOT NULL ,
	`catid` BIGINT(20) UNSIGNED ,
	`company_id` BIGINT(20) UNSIGNED ,
	`conditions` TEXT ,
	`time_1` INT(11) ,
	`percent_1` DECIMAL(2,2 ) DEFAULT 0 ,
	`time_2` INT(11) ,
	`percent_2` DECIMAL(2,2 ) DEFAULT 0 ,
	`time_3` INT(11) ,
	`percent_3` DECIMAL(2,2 ) DEFAULT 0 ,
	`creation_date` DATE ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATE ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`language` BIGINT(20) UNSIGNED ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,
	`ordering` INT(11) ,

	PRIMARY KEY  (`id`),
	UNIQUE KEY(alias),
	KEY `catid` (`catid`),
	KEY `company_id` (`company_id`),
	KEY `created_by` (`created_by`),
	KEY `language` (`language`),
	KEY `published` (`published`),
	KEY `ordering` (`ordering`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Social
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_social` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`catid` BIGINT(20) UNSIGNED ,
	`user_id` BIGINT(20) UNSIGNED NOT NULL ,
	`labelid` BIGINT(20) UNSIGNED ,
	`name` VARCHAR(255) NOT NULL ,
	`creation_date` DATE ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATE ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`ordering` INT(11) ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,

	PRIMARY KEY  (`id`),
	KEY `catid` (`catid`),
	KEY `user_id` (`user_id`),
	KEY `labelid` (`labelid`),
	KEY `created_by` (`created_by`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Social Labels
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_sociallabels` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`type` VARCHAR(50) ,
	`logo` VARCHAR(255) ,
	`link` VARCHAR(255) ,
	`language` BIGINT(20) UNSIGNED ,
	`creation_date` DATE ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATE ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`ordering` INT(11) ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,

	PRIMARY KEY  (`id`),
	KEY `type` (`type`),
	KEY `language` (`language`),
	KEY `created_by` (`created_by`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : States
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_states` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`country_id` BIGINT(20) UNSIGNED NOT NULL ,
	`state` VARCHAR(50) ,
	`abbreviation` VARCHAR(10) ,
	`capital` VARCHAR(255) ,
	`flag` VARCHAR(255) ,
	`language` BIGINT(20) UNSIGNED ,
	`ordering` INT(11) ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,

	PRIMARY KEY  (`id`),
	KEY `country_id` (`country_id`),
	KEY `language` (`language`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Vehicles
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_vehicles` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`catid` BIGINT(20) UNSIGNED ,
	`user_id` BIGINT(20) UNSIGNED ,
	`vehicle_type` VARCHAR(255) DEFAULT '1' ,
	`brand_id` BIGINT(20) UNSIGNED ,
	`model` VARCHAR(255) ,
	`color` VARCHAR(7) ,
	`pax` INT(11) NOT NULL ,
	`number_plate` VARCHAR(12) NOT NULL ,
	`year_of_build` DATE ,
	`fuel` VARCHAR(1) ,
	`car_insurance` TINYINT ,
	`insurance_for_third_parties` TINYINT ,
	`remarks` TEXT ,
	`creation_date` DATETIME ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATETIME ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`ordering` INT(11) ,
	`published` TINYINT(11) NOT NULL DEFAULT 0 ,
	`my_joomla_access` BIGINT(20) UNSIGNED ,
	`my_joomla_user` BIGINT(20) UNSIGNED ,

	PRIMARY KEY  (`id`),
	KEY `catid` (`catid`),
	KEY `user_id` (`user_id`),
	KEY `vehicle_type` (`vehicle_type`),
	KEY `brand_id` (`brand_id`),
	KEY `created_by` (`created_by`),
	KEY `modified_by` (`modified_by`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Jobs
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_jobs` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`file_number` VARCHAR(30) ,
	`file_name` VARCHAR(255) ,
	`status` VARCHAR(2) NOT NULL ,
	`company_id` BIGINT(20) UNSIGNED NOT NULL ,
	`client_id` BIGINT(20) UNSIGNED ,
	`client_reference` VARCHAR(255) ,
	`requested_language` BIGINT(20) UNSIGNED ,
	`second_language_option` BIGINT(20) UNSIGNED ,
	`operator_name` BIGINT(20) UNSIGNED ,
	`main_guide` BIGINT(20) UNSIGNED ,
	`coordination` TINYINT NOT NULL DEFAULT 0 ,
	`guide_status` VARCHAR(2) NOT NULL ,
	`trip_leader` BIGINT(20) UNSIGNED ,
	`remunerations` BIGINT(20) UNSIGNED NOT NULL ,
	`invoicing` BIGINT(20) UNSIGNED ,
	`pax` INT(11) NOT NULL DEFAULT 1 ,
	`start_date` DATE ,
	`end_date` DATE ,
	`total_debet` DECIMAL(8,2 ) ,
	`total_credit` DECIMAL(10,2 ) ,
	`creation_date` DATE ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATE ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`my_joomla_user` BIGINT(20) UNSIGNED ,
	`my_joomla_access` BIGINT(20) UNSIGNED ,
	`ordering` INT(11) ,
	`published` TINYINT(11) DEFAULT 0 ,

	PRIMARY KEY  (`id`),
	KEY `company_id` (`company_id`),
	KEY `client_id` (`client_id`),
	KEY `requested_language` (`requested_language`),
	KEY `operator_name` (`operator_name`),
	KEY `main_guide` (`main_guide`),
	KEY `guide_status` (`guide_status`),
	KEY `trip_leader` (`trip_leader`),
	KEY `remunerations` (`remunerations`),
	KEY `invoicing` (`invoicing`),
	KEY `start_date` (`start_date`),
	KEY `end_date` (`end_date`),
	KEY `created_by` (`created_by`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- - 8< - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
-- Create table : Job Items
-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - >8 -
CREATE TABLE IF NOT EXISTS `#__guideman_jobitems` (
	`id` BIGINT(20) UNSIGNED NOT NULL auto_increment,
	`job_id` BIGINT(20) UNSIGNED ,
	`type` VARCHAR(2) ,
	`item_status` VARCHAR(2) ,
	`start_date` DATE ,
	`start_time` TIMESTAMP ,
	`end_date` DATE ,
	`end_time` TIMESTAMP ,
	`service` BIGINT(20) UNSIGNED ,
	`remark` TEXT ,
	`service_provider` BIGINT(20) UNSIGNED ,
	`service_provider_status` VARCHAR(2) ,
	`guide` BIGINT(20) UNSIGNED ,
	`guide_status` VARCHAR(2) ,
	`optional` TINYINT DEFAULT 0 ,
	`transport` BIGINT(20) UNSIGNED ,
	`transport_status` VARCHAR(2) ,
	`driver` BIGINT(20) UNSIGNED ,
	`pax` INT(11) ,
	`total_debet` DECIMAL(10,2 ) ,
	`total_credit` DECIMAL(10,2 ) ,
	`creation_date` DATE ,
	`created_by` BIGINT(20) UNSIGNED ,
	`modification_date` DATE ,
	`modified_by` BIGINT(20) UNSIGNED ,
	`ordering` INT(11) ,
	`published` TINYINT(11) NOT NULL DEFAULT 1 ,
	`my_joomla_access` BIGINT(20) UNSIGNED ,
	`my_joomla_user` BIGINT(20) UNSIGNED ,

	PRIMARY KEY  (`id`),
	KEY `job_id` (`job_id`),
	KEY `type` (`type`),
	KEY `service` (`service`),
	KEY `service_provider` (`service_provider`),
	KEY `service_provider_status` (`service_provider_status`),
	KEY `guide` (`guide`),
	KEY `guide_status` (`guide_status`),
	KEY `optional` (`optional`),
	KEY `transport` (`transport`),
	KEY `transport_status` (`transport_status`),
	KEY `driver` (`driver`),
	KEY `created_by` (`created_by`),
	KEY `ordering` (`ordering`),
	KEY `published` (`published`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

