<?php
//Include controller to display products
require_once "../../controller/products/home_products_controller.php";
//Include main Headers
require_once "../elements/headers.php";
?>

    <!-- Define Page Name -->
    <title>MagBuy | Home</title>

<?php
//Include Header
require_once "../elements/header.php";
//Include Navigation
require_once "../elements/navigation.php";
?>
    <!-- Most Sold Products -->
    <div class="main_filtered_products-section">
        <div class="container">
            <h3 class="title">Most Sold</h3>
            <div class="main_filtered_product-info">

                <?php foreach ($mostSold as $product) {
                    if ($product['percent'] != null) {
                        $promotedPrice = round($product['price'] - (($product['price'] *
                                    $product['percent']) / 100), 2);
                    } else {
                        unset($promotedPrice);
                    } ?>
                    <div class="products-grd" id='responsiveProductsDiv'>
                        <div class="p-one">
                            <a href="single.php?pid=<?= $product['id']; ?>">
                                <img src="<?= $product['image_url'] ?>"
                                     alt="Product Image" class="img-responsive"/></a>
                            <h4><?= $product['title']; ?></h4>

                            <?php if ($product['average'] === null) {
                                $product['average'] = 0;
                            } else {
                                $product['average'] = round($product['average'], 0);
                            } ?>

                            <img class="ratingCatDiv media-object img"
                                 src="../../web/assets/images/rating<?= $product['average'] ?>.png">
                            <span>(<?= $product['reviewsCount'] ?>)</span>
                            <br/><br/>
                            <p><a id="addButtonBlock" class="btn btn-default btn-sm"
                                  onclick="addToCart(<?= $product['id'] . "," . $product['price'] ?>)">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>&nbspAdd
                                </a>&nbsp&nbsp
                                <?php
                                if (isset($promotedPrice)) {
                                    ?>
                                    <span class="item_price valsa"
                                          style="color: red;">$<?= $promotedPrice; ?></span>
                                    <span class="item_price promoValsa">$<?= $product['price']; ?></span>
                                    <?php
                                } else {
                                    ?>
                                    <span class="item_price valsa">$<?= $product['price']; ?></span>
                                    <?php
                                }
                                ?></p><br/>
                            <div class="pro-grd">
                                <a href="single.php?pid=<?= $product['id']; ?>">View</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- Top Rated Products -->
    <div class="main_filtered_products-section">
        <div class="container">
            <h3 class="title">TOP RATED</h3>
            <div class="main_filtered_product-info">

                <?php foreach ($topRated as $product) {
                    if ($product['percent'] != null) {
                        $promotedPrice = round($product['price'] - (($product['price'] *
                                    $product['percent']) / 100), 2);
                    } else {
                        unset($promotedPrice);
                    } ?>
                    <div class="products-grd" id='responsiveProductsDiv'>
                        <div class="p-one">
                            <a href="single.php?pid=<?= $product['id']; ?>">
                                <img src="<?= $product['image_url'] ?>"
                                     alt="Product Image" class="img-responsive"/></a>
                            <h4><?= $product['title']; ?></h4>

                            <?php if ($product['average'] === null) {
                                $product['average'] = 0;
                            } else {
                                $product['average'] = round($product['average'], 0);
                            } ?>

                            <img class="ratingCatDiv media-object img"
                                 src="../../web/assets/images/rating<?= $product['average'] ?>.png">
                            <span>(<?= $product['reviewsCount'] ?>)</span>
                            <br/><br/>
                            <p><a id="addButtonBlock" class="btn btn-default btn-sm"
                                  onclick="addToCart(<?= $product['id'] . "," . $product['price'] ?>)">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>&nbspAdd
                                </a>&nbsp&nbsp
                                <?php
                                if (isset($promotedPrice)) {
                                    ?>
                                    <span class="item_price valsa"
                                          style="color: red;">$<?= $promotedPrice; ?></span>
                                    <span class="item_price promoValsa">$<?= $product['price']; ?></span>
                                    <?php
                                } else {
                                    ?>
                                    <span class="item_price valsa">$<?= $product['price']; ?></span>
                                    <?php
                                }
                                ?></p><br/>
                            <div class="pro-grd">
                                <a href="single.php?pid=<?= $product['id']; ?>">View</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- Most Recent Products -->
    <div class="main_filtered_products-section">
        <div class="container">
            <h3 class="title">MOST RECENT</h3>
            <div class="main_filtered_product-info">

                <?php foreach ($mostRecent as $product) {
                    if ($product['percent'] != null) {
                        $promotedPrice = round($product['price'] - (($product['price'] *
                                    $product['percent']) / 100), 2);
                    } else {
                        unset($promotedPrice);
                    } ?>
                    <div class="products-grd" id='responsiveProductsDiv'>
                        <div class="p-one">
                            <a href="single.php?pid=<?= $product['id']; ?>">
                                <img src="<?= $product['image_url'] ?>"
                                     alt="Product Image" class="img-responsive"/></a>
                            <h4><?= $product['title']; ?></h4>

                            <?php if ($product['average'] === null) {
                                $product['average'] = 0;
                            } else {
                                $product['average'] = round($product['average'], 0);
                            } ?>

                            <img class="ratingCatDiv media-object img"
                                 src="../../web/assets/images/rating<?= $product['average'] ?>.png">
                            <span>(<?= $product['reviewsCount'] ?>)</span>
                            <br/><br/>
                            <p><a id="addButtonBlock" class="btn btn-default btn-sm"
                                  onclick="addToCart(<?= $product['id'] . "," . $product['price'] ?>)">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>&nbspAdd
                                </a>&nbsp&nbsp
                                <?php
                                if (isset($promotedPrice)) {
                                    ?>
                                    <span class="item_price valsa"
                                          style="color: red;">$<?= $promotedPrice; ?></span>
                                    <span class="item_price promoValsa">$<?= $product['price']; ?></span>
                                    <?php
                                } else {
                                    ?>
                                    <span class="item_price valsa">$<?= $product['price']; ?></span>
                                    <?php
                                }
                                ?></p><br/>
                            <div class="pro-grd">
                                <a href="single.php?pid=<?= $product['id']; ?>">View</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

<?php
//Include footer
require_once "../elements/footer.php";
?>