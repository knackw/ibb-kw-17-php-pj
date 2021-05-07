<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ($data["title"] ?? ""); ?></title>
    <meta name="description" content="<?= META_DESC ?>">
    <meta name="keywords" content="<?= META_KEYWORDS ?>">
    <link rel="stylesheet" href="<?= URL_ROOT ?>public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= URL_ROOT ?>public/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= URL_ROOT ?>public/css/style.css" type="text/css">
</head>
<body>
<header>
    <div class="header-box">
        <div class="container">
            <div class="row">
                <div class="demo_site-nav">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary demo_navbar">
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto demo_navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= URL_ROOT; ?>"> DEMO Shop </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)">Inaktiver Link 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)">Inaktiver Link 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= URL_ROOT ?>cart">Warenkorb <i
                                                class="fa fa-shopping-cart"></i>
                                        <span class="badge badge-light demo_cart-counter"><?= $data["count_carts"] ?></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= URL_ROOT ?>cart">Guthaben <i
                                                class="fa fa-university"></i>
                                        <span class="badge badge-light demo_wallet-balance-display"><?php echo CURRENCY . ' ' . $data["user_wallet_balance"] ?></span>
                                    </a>
                                </li>
                                </span>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<section>
    <!-- Ausgabepuffer hier einfügen -->
    <?= ($main_Content ?? ""); ?>
</section>
<div class="modal fade" id="demo_modal" tabindex="-1" role="dialog" aria-labelledby="demo_modal-title"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Benachrichtigung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<footer>
    &copy; <?php echo date("Y"); ?>
    <p> Entwickelt von: Demo Shop</p>
</footer>
<script src="<?php echo URL_ROOT ?>public/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo URL_ROOT ?>public/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo URL_ROOT ?>public/js/home.js"></script>
<script src="<?php echo URL_ROOT ?>public/js/cart.js"></script>
</body>
</html>