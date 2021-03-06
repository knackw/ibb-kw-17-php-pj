<?php

namespace Mvc\Controllers;

use Core\Controller;
use Mvc\Models\User;
use Mvc\Models\Cart;
use Mvc\Models\Product;

/**
 * Class CartController
 * @package Mvc\Controllers
 *
 * Der Klassename ist der Controller
 * Funktion die Aktion (siehe Dispatcher Klasse)
 *
 */
class CartController extends Controller
{
    private Cart $cart;
    private Product $product;
    private User $user;

    /**
     * CartController constructor
     */
    public function __construct()
    {
        $this->user = new User();
        $this->product = new Product();
        $this->cart = new Cart();
    }

    /**
     * Aktion Warenkorb anzeigen
     */
    public function index()
    {
        /**
         * Alle Produkte laden
         */
        $all_Cart_Records = $this->cart->getAllCartRecords();
        /**
         * Anzahl Produkte im Warenkorb
         */
        $count_Carts = $this->cart->countAllCarts();
        /**
         * Produkte im Warenkorb
         */
        $cart_Products = [];

        if ($count_Carts > 0) {
            foreach ($all_Cart_Records as $key => $value) {
                $cart_Products[] = $this->product->getSingleProduct($key);
            }
        }

        $all_Product_Records = $this->product->getAllProducts();

        $total_Cart_Cost = $this->computeCartCost($all_Cart_Records);
        /**
         * Daten zum rendern des Templates
         */
        $this->render("cart", [
            'title' => 'Mein Warenkorb',
            'all_cart_products' => $cart_Products,
            'all_cart_quantity' => $all_Cart_Records,
            'count_carts' => $count_Carts,
            'user_wallet_balance' => $this->user->getUserWalletBalance(),
            'cart_cost' => $total_Cart_Cost
        ]);
    }

    /**
     * @param int $retType
     * @param int $product_Id
     * @param int $quantity
     *
     * Aktion Warenkorb aktualisierne
     *
     */
    public function updateCart(int $retType, int $product_Id, int $quantity)
    {

        if ((int)$quantity < 1 || !is_numeric($quantity)) {
            echo json_encode(array(
                'message' => 'Quantity must not be less than 1 and it must be an integer'));
            exit();
        }
        $this->cart->updateCart($product_Id, $quantity);

        echo json_encode(array(
            'message' => 'Success',
            'new_Total_Count' => $this->cart->countAllCarts(),
            'new_Unique_Count' => $this->cart->countUniqueCartQty($product_Id),
            'new_Total_Cart_Cost' => $this->computeCartCost($this->cart->getAllCartRecords()),
        ));
        exit();
    }

    /**
     * @param int $retType
     * @param int $product_Id
     * @return array
     *
     * Aktion Warenkorb l??schen
     *
     */
    public function removeCart(int $retType, int $product_Id)
    {

        if ($this->cart->removeCartItem($product_Id)) {
            echo json_encode(array(
                'message' => 'Success',
                'new_Total_Count' => $this->cart->countAllCarts(),
                'new_Unique_Count' => $this->cart->countUniqueCartQty($product_Id),
                'new_Total_Cart_Cost' => $this->computeCartCost($this->cart->getAllCartRecords()),
            ));
            exit();
        } else {
            echo json_encode(array(
                'message' => 'Failed'
            ));
            exit();
        }
    }

    /**
     * @param array $cart_Records
     * @return float
     *
     * Aktion Kosten im Warenkorb berechnen
     *
     */
    public function computeCartCost(array $cart_Records)
    {
        $total_Cost = 0;
        $i = 0;
        if (gettype($cart_Records) === "array" && count($cart_Records)) {
            foreach ($cart_Records as $key => $value) {
                $total_Cost += (float)$this->product->getSingleProductPrice($key) * (int)$value;
            }
        }

        return round((float)$total_Cost, 2);
    }

    /**
     * Aktion Warenkorb Zusammenfassung
     */
    public function summary()
    {
        $all_Cart_Records = $this->cart->getAllCartRecords();
        $total_Cart_Cost = $this->computeCartCost($all_Cart_Records);
        $this->render("summary", [
            'title' => 'Cart Summary',
            'cart_cost' => $total_Cart_Cost,
            'user_wallet_balance' => $this->user->getUserWalletBalance(),
            'count_carts' => $this->cart->countAllCarts()
        ]);
    }

    /**
     * @param int $retType
     * @param int $product_Id
     * @param string $pick_up_type
     *
     * Aktion Bezahlung
     *
     */
    public function checkout(int $retType, int $product_Id, string $pick_up_type)
    {

        $all_Cart_Records = $this->cart->getAllCartRecords();
        $total_Cart_Cost = (gettype($all_Cart_Records) === "array") ? $this->computeCartCost($all_Cart_Records) : 0;

        if ($this->cart->removeAllCarts()) {
            $shipping_Cost = $pick_up_type == "UPS" ? 5 : 0;
            $balance = $this->user->getUserWalletBalance() - ($total_Cart_Cost + $shipping_Cost);
            $newUserWalletBalance = $balance < 1 ? 0 : (float)$balance;
            $this->user->updateUserWalletBalance($newUserWalletBalance);
        }

        $this->render("checkout", [
            'title' => 'Checkout',
            'thank_you_message' => '
            <i class="fa fa-check"></i>
            We just received your order. You\'ll hear from us shortly.<br/> 
            Thank you once again.',
            'cart_cost' => $total_Cart_Cost,
            'user_wallet_balance' => $this->user->getUserWalletBalance(),
            'count_carts' => $this->cart->countAllCarts()
        ]);
    }
}