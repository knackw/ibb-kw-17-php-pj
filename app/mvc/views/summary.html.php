<div class="demo_shopping-cart-wrapper">
    <div class="container">
        <div class="demo_listing-title">
            <h2> Warenkorb </h2>
        </div>
        <div class="row">
            <div class="col-md-7 col-lg-7">
                <h4> Lieferdetails </h4>
                <div class="form-group">
                    <select class="form-control demo_shipping-type">
                        <option value="">Bitte wähle eine option</option>
                        <option value="PickUp">Pick Up (<?= PICK_UP_COST . " " . CURRENCY ?>)</option>
                        <option value="UPS"> UPS (<?= UPS_SHIPPING_COST . " " . CURRENCY ?>)</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5 col-lg-5">
                <h4 class="float-left"> Cart Review </h4>
                <button type="button" class="btn btn-primary float-right">
                    Guthaben <span class="badge badge-light">
                       <?= CURRENCY ?> <span class="demo_checkout-wallet-balance">
                           <?= ($data["user_wallet_balance"] ?? ""); ?></span> </span>
                </button>
                <div class="clearfix"></div>
                <table class="table table-striped demo_cart-summary ">
                    <tr>
                        <td> Einzelkosten</td>
                        <td> <?php echo CURRENCY ?>
                            <span class="demo_checkout-product-cost"><?= ($data["cart_cost"] ?? ""); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td> Lieferkosten</td>
                        <td> <?php echo CURRENCY ?>
                            <span class="demo_checkout-shipping-cost"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b> Gesmatkosten </b>
                        </td>
                        <td>
                            <?php echo CURRENCY ?>
                            <span class="demo_checkout-gross-total"></span>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary demo_checkout-btn">Zum bezahlen</button>
            </div>
        </div>
    </div>
</div>
</div>