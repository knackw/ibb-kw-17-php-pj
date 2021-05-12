<?php
/**
 * Seperator
 */
define("APP_ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR);
/**
 * Pfade
 */
const URL_ROOT = "http://localhost/";
const VIEW_ROOT = APP_ROOT . DIRECTORY_SEPARATOR . 'mvc' . DIRECTORY_SEPARATOR . 'views/';
const SITE_NAME = "Demo Shop";
/**
 * Datenbank
 */
const SERVER = "database";
const USERNAME = "user";
const PASSWORD = "user";
const DB = "app_db";
/**
 * SEO
 */
const META_DESC = " Ein Demo Shop  ";
const META_KEYWORDS = "shop, einkaufen, produkte";
/**
 * Währung
 */
const CURRENCY = "€";
/**
 * Benutzer Session
 */
const USER_ID_TAG = "user_id";
const USER_WALLET_TAG = "user_wallet";
/**
 * Produktbewertung
 */
const PRODUCT_RATING_ARR = "product_rate_arr";
/**
 * Warenkorb ID
 */
const USER_CART_TAG = "cart_id";
/**
 * Bezahlung
 */
const PICK_UP_COST = 0;
const UPS_SHIPPING_COST = 5;
/**
 * Guthaben
 */
const DEFAULT_WALLET_BALANCE = 100;