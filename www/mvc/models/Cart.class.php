<?php

namespace Mvc\Models;

use Core\Model;

/**
 * Class Cart
 * @package Mvc\Models
 *
 * Modell Warenkorb mit Session
 *
 */
class Cart extends Model
{
    /**
     * Constructor
     */
    private function _constructor()
    {
        //silence is golden
    }

    /**
     * @param int $product_Id
     * @return bool
     *
     */
    public function checkCart(int $product_Id)
    {
        if (!$this->session->checkCart($product_Id)) {
            return false;
        }
        return true;
    }

    /**
     * @return array
     *
     * Alle Produkte des Warenkorbes holen
     *
     */
    public function getAllCartRecords()
    {
        if ($this->countUniqueCarts() > 0) {
            return $this->session->getAllCarts();
        }
        return [];
    }

    /**
     * @param int $product_Id
     * @return bool
     *
     * Warenkorb sichern
     *
     */
    public function saveCart(int $product_Id)
    {
        if ($this->session->saveCart($product_Id)) {
            return true;
        }
        return false;
    }

    /**
     * @param int $product_Id
     * @param int $quantity
     * @return bool
     *
     * Warenkorb aktualisieren
     *
     */
    public function updateCart(int $product_Id, int $quantity)
    {

        if ($this->session->updateCart($product_Id, $quantity)) {
            return true;
        }
        return false;
    }

    /**
     * @param int $product_Id
     * @return bool
     *
     * Produkt vom Warenkorb löschen
     *
     */
    public function removeCartItem(int $product_Id)
    {
        return $this->session->removeCartItem($product_Id);
    }

    /**
     * @return bool
     *
     * Warenkorb löschen
     *
     */
    public function removeAllCarts()
    {
        return $this->session->removeAllCarts();
    }

    /**
     * @return int
     *
     */
    public function countUniqueCarts()
    {
        return $this->session->countUniqueCarts();
    }

    /**
     * @return int
     *
     * Anzahl Produkte im Warenkorb
     *
     */
    public function countAllCarts()
    {
        return $this->session->countAllCarts();
    }

    /**
     * @param int $product_Id
     * @return int
     *
     */
    public function countUniqueCartQty(int $product_Id)
    {
        return $this->session->countUniqueCartQty($product_Id);
    }


}