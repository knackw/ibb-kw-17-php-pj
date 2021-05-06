<?php

declare (strict_types=1);

namespace Core;

class Session
{
    // Entwurfsmuster Singleton (Einzelstück) - Beginn:
    private static ?Session $instance = null;

    // Fabrik-Methode / factory-method
    public static function getInstance(): Session {
        if (self::$instance == null) {
            self::$instance = new Session();
        }
        return self::$instance;
    }
    // Singleton - Ende!

    private function __construct() {
        session_start();
    }

    public function checkSession($name): bool
    {
        if (isset($_SESSION[$name]))
        {
            return true;
        }
        else {
            return false;
        }
    }

    public function createSession($name, $value): bool
    {
        if (!isset($_SESSION[$name]))
        {
            $_SESSION[$name] = $value;
            return true;
        }
        return false;
    }

    public function getSession($name): mixed
    {
        if (isset($_SESSION[$name]))
        {
            return $_SESSION[$name];
        }
        return false;
    }

    public  function removeSession($name): bool
    {
        if ($this->sessionCheck($name)){
            unset($_SESSION[$name]);
            return true;
        }
        return false;
    }

    public function checkUserWalletBalance(): bool
    {
        if (isset($_SESSION[USER_WALLET_TAG])){
            return true;
        }
        return false;
    }

    public function getUserWalletBalance(): float
    {
        return (float) $_SESSION[USER_WALLET_TAG];

    }

    public function createUserWalletBalance(): int
    {
        $_SESSION[USER_WALLET_TAG] = DEFAULT_WALLET_BALANCE;
        return DEFAULT_WALLET_BALANCE;
    }

    public function updateUserWalletBalance($newBalance): bool
    {
        $_SESSION[USER_WALLET_TAG] = $newBalance;
        return true;
    }

    public  function saveUserRatings($product_Id, $user_Rating): bool
    {
        if ($_SESSION[PRODUCT_RATING_ARR][$product_Id] = $user_Rating)
        {
            return true;
        }
        return  false;
    }

    public  function getUserRatings()
    {
        if (isset($_SESSION[PRODUCT_RATING_ARR]))
        {
            return $_SESSION[PRODUCT_RATING_ARR];
        }
        return false;
    }

    /**
     * Array Key =  product id
     * Array Value = total quantity of that very product in cart
     */
    public function saveCart($product_Id)
    {
        if ( !isset($_SESSION[USER_CART_TAG]) )
        {
            $_SESSION[USER_CART_TAG] = array();
        }
        $_SESSION[USER_CART_TAG][$product_Id] = 1;
    }

    public function getCart(): mixed
    {
        if (isset($_SESSION[USER_CART_TAG]))
        {
            return $_SESSION[USER_CART_TAG];
        }
        return false;
    }

    public function updateCart($product_Id, $quantity): bool
    {
        if ( array_key_exists($product_Id,  $_SESSION[USER_CART_TAG] ))
        {
            $_SESSION[USER_CART_TAG][$product_Id] = $quantity;
            return true;
        }
        return false;
    }

    public function checkCart($product_Id): bool
    {
        if (isset($_SESSION[USER_CART_TAG][$product_Id]))
        {
            return true;
        }
        return false;
    }

    public function removeAllCarts(): bool
    {
        unset($_SESSION[USER_CART_TAG]);
        return true;
    }

    public function getAllCarts(): mixed
    {
        if (isset($_SESSION[USER_CART_TAG]))
        {
            return $_SESSION[USER_CART_TAG];
        }
        return false;
    }

    public function removeCartItem($product_Id): bool
    {
        unset($_SESSION[USER_CART_TAG][$product_Id]);
        return true;
    }

    public function countUniqueCarts(): int
    {
        if (isset($_SESSION[USER_CART_TAG]))
        {
            return count($_SESSION[USER_CART_TAG]);
        }
        return 0;
    }


    public function countAllCarts(): int
    {
        if ( isset($_SESSION[USER_CART_TAG]) )
        {
            $total = 0;
            foreach ($_SESSION[USER_CART_TAG] as $key => $value)
            {
                $total += $value;
            }
            return $total;
        }
        return 0;
    }

    public function countUniqueCartQty($product_Id): int
    {
        if (isset($_SESSION[USER_CART_TAG][$product_Id]))
        {
            return $_SESSION[USER_CART_TAG][$product_Id];
        }
        return 0;
    }
}