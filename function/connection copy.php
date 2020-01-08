<?php

define('DB_SERVER', "localhost");
define('DB_USER', "admin");
define('DB_PASSWORD', "asd123");
define('DB_DATABASE', "cake_house");
define('DB_DRIVER', "mysql");

$db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

date_default_timezone_set("Asia/Taipei");

 ?>


<?php

define('DB_SERVER', "sql307.byethost.com");
define('DB_USER', "b4_24636240");
define('DB_PASSWORD', "soccy7530");
define('DB_DATABASE', "b4_24636240_happycake");
define('DB_DRIVER', "mysql");

$db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

date_default_timezone_set("Asia/Taipei");

 ?>
