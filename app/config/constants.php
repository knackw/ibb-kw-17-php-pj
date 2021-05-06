<?php
define('MODE', 'DEVELOPMENT');

//define("APP_ROOT", dirname(__FILE__) . '/');

define("APP_ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR);
define("DEVELOPMENT_PUBLIC_FOLDER", "");

define("URL_ROOT", "http://localhost/");
define('VIEW_ROOT', APP_ROOT . DIRECTORY_SEPARATOR . 'mvc' . DIRECTORY_SEPARATOR . 'views/');
define("SITE_NAME", "Demo Store");

// DATABASE
define("SERVER", "127.0.0.1");
define("USERNAME", "root");
define("PASSWORD", "");
define("DB", "ibb-kw-17-php-pj");

// SEO
define("META_DESC", " Ein Demo Shop  ");
define("META_KEYWORDS", "shop, einkaufen, produkte");

// CURRENCIES IN USE
define("CURRENCY", "€");

// USER
define("USER_ID_TAG", "user_id");
define("USER_WALLET_TAG", "user_wallet");

//PRODUCT
define("PRODUCT_RATING_ARR", "product_rate_arr");

//cart
define("USER_CART_TAG", "cart_id");

// check out defaults
define("PICK_UP_COST", 0);
define("UPS_SHIPPING_COST", 5);

define("DEFAULT_WALLET_BALANCE", 100);