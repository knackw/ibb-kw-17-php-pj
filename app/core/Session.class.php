<?php

declare (strict_types=1);

namespace Core;
/**
 * Class Session
 * @package Core
 *
 */
class Session
{
    /**
     * @var Session|null
     *
     * Singleton Pattern
     *
     */
    private static ?Session $instance = null;

    /**
     * @return Session
     *
     * Fabrik Methode der Session Klasse
     *
     */
    public static function getInstance(): Session
    {
        if (self::$instance == null) {
            self::$instance = new Session();
        }
        return self::$instance;
    }
    // Singleton - Ende!

    /**
     * Constructor
     */
    private function __construct()
    {
        session_start();
    }

    /**
     * @param $name
     * @return bool
     *
     * Überprüft die Session ob sie vorhanden ist
     *
     */
    public function checkSession($name): bool
    {
        if (isset($_SESSION[$name])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $name
     * @param $value
     * @return bool
     *
     * Session wird erstellt
     *
     */
    public function createSession($name, $value): bool
    {
        if (!isset($_SESSION[$name])) {
            $_SESSION[$name] = $value;
            return true;
        }
        return false;
    }

    /**
     * @param $name
     * @return mixed
     *
     * Holt sich den Wert einer Session
     *
     */
    public function getSession($name): mixed
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return false;
    }

    /**
     * @param $name
     * @return bool
     *
     * Löscht die Session
     *
     */
    public function removeSession($name): bool
    {
        if ($this->sessionCheck($name)) {
            unset($_SESSION[$name]);
            return true;
        }
        return false;
    }

    /**
     * @return bool
     *
     * Überprüft das Warenkorb Guthaben
     *
     */
    public function checkUserWalletBalance(): bool
    {
        if (isset($_SESSION[USER_WALLET_TAG])) {
            return true;
        }
        return false;
    }

    /**
     * @return float
     *
     * Holt sich den Wert des Warenkorbguthabens
     *
     */
    public function getUserWalletBalance(): float
    {
        return (float)$_SESSION[USER_WALLET_TAG];

    }

    /**
     * @return float
     *
     * Initialisert das Warenkorbguthaben
     *
     */
    public function createUserWalletBalance(): int
    {
        $_SESSION[USER_WALLET_TAG] = DEFAULT_WALLET_BALANCE;
        return DEFAULT_WALLET_BALANCE;
    }

    /**
     * @param $newBalance
     * @return bool
     *
     * Update Warenkorbguthaben
     *
     */
    public function updateUserWalletBalance($newBalance): bool
    {
        $_SESSION[USER_WALLET_TAG] = $newBalance;
        return true;
    }

    /**
     * @param $product_Id
     * @param $user_Rating
     * @return bool
     *
     * Sichert die Benutzerbewertung
     *
     */
    public function saveUserRatings($product_Id, $user_Rating): bool
    {
        if ($_SESSION[PRODUCT_RATING_ARR][$product_Id] = $user_Rating) {
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     *
     * Holt sich den Wert der Benutzerbewertung
     *
     */
    public function getUserRatings(): mixed
    {
        if (isset($_SESSION[PRODUCT_RATING_ARR])) {
            return $_SESSION[PRODUCT_RATING_ARR];
        }
        return false;
    }

    /**
     * @param $product_Id
     *
     * Warenkorb sichern
     *
     */
    public function saveCart($product_Id)
    {
        if (!isset($_SESSION[USER_CART_TAG])) {
            $_SESSION[USER_CART_TAG] = array();
        }
        $_SESSION[USER_CART_TAG][$product_Id] = 1;
    }

    /**
     * @param $product_Id
     *
     * Warenkorb holen
     *
     */
    public function getCart(): mixed
    {
        if (isset($_SESSION[USER_CART_TAG])) {
            return $_SESSION[USER_CART_TAG];
        }
        return false;
    }

    /**
     * @param $product_Id
     * @param $quantity
     * @return bool
     *
     * Warenkorb aktualisieren
     *
     */
    public function updateCart($product_Id, $quantity): bool
    {
        if (array_key_exists($product_Id, $_SESSION[USER_CART_TAG])) {
            $_SESSION[USER_CART_TAG][$product_Id] = $quantity;
            return true;
        }
        return false;
    }

    /**
     * @param $product_Id
     * @return bool
     *
     * Warenkorb überprüfen
     *
     */
    public function checkCart($product_Id): bool
    {
        if (isset($_SESSION[USER_CART_TAG][$product_Id])) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     *
     * Warenkorb löschen
     *
     */
    public function removeAllCarts(): bool
    {
        unset($_SESSION[USER_CART_TAG]);
        return true;
    }

    /**
     * @return false|mixed
     *
     * Alle Produkte in den Warenkorb
     *
     */
    public function getAllCarts(): mixed
    {
        if (isset($_SESSION[USER_CART_TAG])) {
            return $_SESSION[USER_CART_TAG];
        }
        return false;
    }

    /**
     * @param $product_Id
     * @return bool
     *
     * Löscht Produkt aus dem Warenkorb
     *
     */
    public function removeCartItem($product_Id): bool
    {
        unset($_SESSION[USER_CART_TAG][$product_Id]);
        return true;
    }

    /**
     * @return int
     *
     */
    public function countUniqueCarts(): int
    {
        if (isset($_SESSION[USER_CART_TAG])) {
            return count($_SESSION[USER_CART_TAG]);
        }
        return 0;
    }

    /**
     * @return int|mixed
     *
     * Anzahl der Produkte im Warenkorb
     *
     */
    public function countAllCarts(): mixed
    {
        if (isset($_SESSION[USER_CART_TAG])) {
            $total = 0;
            foreach ($_SESSION[USER_CART_TAG] as $key => $value) {
                $total += $value;
            }
            return $total;
        }
        return 0;
    }

    /**
     * @param $product_Id
     * @return mixed
     */
    public function countUniqueCartQty($product_Id): mixed
    {
        if (isset($_SESSION[USER_CART_TAG][$product_Id])) {
            return $_SESSION[USER_CART_TAG][$product_Id];
        }
        return 0;
    }
}