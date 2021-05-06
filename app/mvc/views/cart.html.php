<div class="demo_shopping-cart-wrapper">
    <div class="container">
        <div class="demo_listing-title">
            <h2> Mein Warenkorb </h2>
        </div>
        <table class="table demo_cart-table">
            <thead>
            <tr>
                <th scope="col"></
                ></th>
                <th scope="col">Produkt</th>
                <th scope="col">Anzahl</th>
                <th scope="col">Einzelkosten (<?php echo CURRENCY; ?>)</th>
                <th scope="col">Gesamtkosten (<?php echo CURRENCY; ?>)</th>
            </tr>
            </thead>
            <?php
            if (isset($data["count_carts"]) && $data["count_carts"] > 0) {
                $i = 0;
                echo '<tbody>';
                foreach ($data["all_cart_products"] as $cart) {
                    echo ' 
                            <tr id="cart-' . $cart["id"] . '">
                            <th scope="row"> <img src="' . URL_ROOT . 'public/img/' . $cart["image"] . '" alt="' . $cart["name"] . '"> </th>
                            <td>' . $cart["name"] . '</td>
                            <td>  
                                <div class="demo_cart-qty-wrapper">    
                                    <div class="input-group">
                                        <input type="text" value="' . $data["all_cart_quantity"][$cart["id"]] . '" id="input-' . $cart["id"] . '">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary demo_cart-update-btn" type="button" 
                                            id="demo_cart-update-btn-' . $cart["id"] . '">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><span id="demo_cart-unit-cost-' . $cart["id"] . '">' . $cart["price"] . ' </td>
                            <td>
                                <span id="demo_cart-single-total-cost-' . $cart["id"] . '">' . number_format((float)$cart["price"], 2) * $data["all_cart_quantity"][$cart["id"]] . ' </span>
                                 <br/>
                                 <span class="badge badge-danger demo_cart-remove" id="demo_cart-remove' . $cart["id"] . '"> Produkt löschen </span>  
                            </td>
                            </tr>
                        ';
                    $i += 1;
                }
                echo '</tbody>';
            } else {
                echo '
                    <div class="demo_list-cart-empty">
                        <div class="alert alert-warning"> 
                            Dein Warenkorb ist leer.
                        </div>
                    </div>';
            }
            ?>
        </table>
        <?php
        if (isset($data["count_carts"]) && $data["count_carts"] > 0) {
            echo '
                    <div class="float-right"> 
                        <a href="' . URL_ROOT . 'cart/summary" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Zum bezahlen ( ' . CURRENCY . '<span class="demo_cart-total-cost">' . $data["cart_cost"] . '</span> )</a> 
                    </div>';
        }
        ?>
        <div class="clearfix"></div>
    </div>
</div>