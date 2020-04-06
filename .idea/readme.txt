--------------------------- Login - Logout --------------------------------------------------
1.watches.php || online 55
2.app/controllers/UserController.php
3.app/model/User.php
4.https://github.com/1000hz/bootstrap-validator || bootstrap Validator  || for client
5.https://packagist.org/?query=valitron         || validator            || for server

///////////////////////////// USER TABLE STRUCTURE ///////////////////////
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

////////////////////////////////////////////////////////////////////////////

6.app/controllers/UserController.php
7.app/views/User/signup.php
8.pmcore/core/base/Model.php
9.app/models/User.php