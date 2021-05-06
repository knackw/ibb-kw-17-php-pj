<section class="demo_banner">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div class="demo_banner-image-left">
                    <img src="<?= URL_ROOT ?>public/img/banner1.png" alt="Demo Store Banner">
                </div>
            </div>
            <div class="col-md-8 col-lg-8">
                <div class="demo_banner-text-right">
                    <h2> Willkommen im Shop der unbegrenzten Möglichkeiten </h2>
                    <p> "Bestprice"-Garantie - sicheres Einkaufen - keine Lieferkosten </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="demo_listing-title">
<h2> UNSERE EXKLUSIVEN PRODUKTE </h2>
    </div>
    <div class="demo_listings">
        <div class="container">
            <div class="row">
                <?php
                foreach ( $data["rows"] as $row )
                {
                    echo '
                        <div class="col-md-3">
                            <div class="demo_list" id="demo_list-'.$row["id"].'"> 
                                <div class="demo_list-container">
                                    <div class="demo_list-image">
                                        <img src="'.URL_ROOT.'public/img/'.$row["image"].'">
                                    </div>
                                    <div class="demo_list-content"> 
                                        <h6 class="float-left"> '.ucfirst($row["name"]). '    für nur  ' .$row["price"] . ' ' . CURRENCY .  '</h6>

                                        <p class="clearfix"></p>
                                        <p> '.$row["caption"].' </p> <hr/>
                                        <div class="demo_list-buttons">
                                        <span class="float-left demo_list-rating-info" >';

                    for ($i = 1; $i <= 5; $i++) {
                        echo $i <= (int) $row["average_rating"] ? '<i class="fa fa-star demo_rating-rated" title="'.$i.'"></i>':'<i class="fa fa-star demo_rating-unrated"  title="'.$i.'"></i>';
                    }
                    echo ' <br/> Durchschnittliche Bewertung <number title="">('. $row["average_rating"].')</number></span></br></br>
                                        <span class="float-left demo_list-add-cart"> 
                                            <button class="btn btn-primary demo_cart-add-btn" id="demo_cart-add-btn-'.$row["id"].'"> Zum Warenkorb hinzufügen </button> 
                                        </span>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="demo_list-my-ratings" id="demo_list-my-ratings-'.$row["id"].'">';
                    if ( count($data["prev_rated"]) > 0 && array_key_exists($row["id"], $data["prev_rated"]) )
                    {
                        echo '<span class="float-left demo_list-rating-info2" >';
                        for ($i = 1; $i <= $data["prev_rated"][$row["id"]]; $i++)
                        {
                            echo $i <= (int) $row["average_rating"] ? '<i class="fa fa-star demo_rating-rated" title="'.$i.'"></i>':'<i class="fa fa-star demo_rating-unrated"  title="'.$i.'"></i>';
                        }
                        echo ' <br/> Deine Bewertung <number title="">('. $data["prev_rated"][$row["id"]].')</number></span>
                                            <span class="float-right demo_list-add-cart"><label> <i class="fa fa-check"> </i>Vilen Dank!!! </label> </span>';
                    }
                    else {
                        echo '<span class="float-left demo_list-rating-info2"> 
                                            <br/> Deine Bewertung <number title="">('. $row["average_rating"].')</number></span>
                                            <span class="float-right demo_list-add-cart "> <label> <i class="fa fa-check"> </i>Vielen Dank!!! </label>  </span>';
                    }
                    echo '  <div class="clearfix"></div>
                                        </div>
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="demo_bottom-ad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> Genieße unsere Produkte</h2>
                <h5> in unserem DEMO Shop </h5>
                <p>
                    <a href="cart">
                        <button type="button" class="btn btn-warning btn-lg">Warenkorb ansehen</button>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>