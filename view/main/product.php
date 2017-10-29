<?php
//Include products by category controller
require_once "../../controller/products/products_by_category_controller.php";
//Include main Headers
require_once "../elements/headers.php";
?>

    <!-- Define Page Name -->
    <title>MagBuy | <?= $categoryName ?></title>
    <script>
        var loadedProducts = 0;

        $(window).scroll(function () {
                if ($(window).scrollTop() + $(window).height() > $(document).height() - 50) {
                    loadedProducts += 6;
                    var xhttp = new XMLHttpRequest();
                    var productsWindow = document.getElementById("productsWindow");
                    var loading = document.createElement("img");
                    var loaderDiv = document.getElementById("loader");
                    loading.setAttribute("src", "../../web/assets/images/ajax-loader.gif");
                    if (loaderDiv.children.length < 1) {
                        loaderDiv.appendChild(loading);
                    }
                    xhttp.onreadystatechange = function () {
                        if (this.status == 200 && this.readyState == 4) {
                            loaderDiv.removeChild(loading);
                            var products = JSON.parse(this.responseText);

                            var i = 0;
                            var content = '';
                            for (var key in products) {
                                if (products.hasOwnProperty(key)) {

                                    if (products[key]['percent'] != null) {
                                        // && $product['start_date'] < date("Y-m-d H:i:s")
                                        //&& $product['end_date'] > date("Y-m-d H:i:s")
                                        var promotedPrice = math.round((products[key]['price'] -
                                                    ((products[key]['price'] * products[key]['percent']) / 100)
                                                ) * 100) / 100;
                                    } else {
                                        promotedPrice = null;
                                    }

                                    if (key == 0) {
                                        content += '<div class="products-grid-lft">';
                                    }

                                    if (i == 3) {
                                        content +=
                                            '<div class="clearfix"></div></div>';
                                        if (key != products.length - 1) {
                                            $('#productsWindow').append(content);
                                        }
                                        content +=
                                            '<div class="products-grid-lft">';

                                        i = 0;
                                    }

                                    content +=
                                        '<div class="products-grd">' +
                                        '<div class="p-one simpleCart_shelfItem prd">' +
                                        '<a href="single.php?pid=' + products[key]['id'] + '">' +
                                        '<img src="' + products[key]['image_url'] + '"' +
                                        'alt="Product Image" class="img-responsive"/>' +
                                        '</a>' +
                                        '<h4>' + products[key]['title'] + '</h4>' +
                                        '<p><a class="btn btn-default btn-sm"' +
                                        'onclick="addToCart(' + products[key]['id'] +
                                        ',' + (promotedPrice != null ? promotedPrice : products[key]['price']) + ')">' +
                                        '<i class="glyphicon glyphicon-shopping-cart"></i>&nbspAdd' +
                                        '</a>&nbsp&nbsp';
                                    if (promotedPrice != null) {
                                        content +=
                                            '<span class="item_price valsa"' +
                                            'style="color: red;">$' + promotedPrice + '</span>' +
                                            '<span class="item_price promoValsa">$' + products[key]['price'] + '</span>';
                                    }
                                    else {
                                        content +=
                                            '<span class="item_price valsa">$' + products[key]['price'] + '</span>';
                                    }

                                    content +=
                                        '</p>' +
                                        '<div class="pro-grd">' +
                                        '<a href="single.php?pid=' + products[key]['id'] + '">View</a>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>';

                                    if (key == products.length - 1) {
                                        content +=
                                            '<div class="clearfix"></div></div>';
                                        $('#productsWindow').append(content);
                                    }

                                    i++;
                                }
                            }
                        }
                    };
                    xhttp.open("GET", "../../controller/products/infinite_scroll_controller.php?lp="
                        + loadedProducts + "&subcid=" + <?= $_GET['subcid'] ?>, true);
                    xhttp.send();
                }
            }
        );
    </script>
<?php
//Include Header
require_once "../elements/header.php";
//Include Navigation
require_once "../elements/navigation.php";
?>

    <!-- Products by category -->
    <div class="products">
        <div class="container">
            <div class="products-grids">
                <div class="col-md-8 products-grid-left" id="productsWindow">
                    <div class="products-grid-lft">
                        <?php
                        $counter = 0;
                        foreach ($products as $product) {
                            if ($product['percent'] != null && $product['start_date'] < date("Y-m-d H:i:s")
                                && $product['end_date'] > date("Y-m-d H:i:s")
                            ) {
                                $promotedPrice = round($product['price'] - (($product['price'] *
                                            $product['percent']) / 100), 2);
                            } else {
                                unset($promotedPrice);
                            }
                            $counter++;
                            if ($counter > 3) {
                                echo '<div class="clearfix"></div></div>';
                                echo '<div class="products-grid-lft">';
                                $counter = 0;
                            }
                            ?>
                            <div class="products-grd">
                                <div class="p-one simpleCart_shelfItem prd">
                                    <a href="single.php?pid=<?= $product['id']; ?>">
                                        <img src="<?= $product['image_url'] ?>"
                                             alt="Product Image" class="img-responsive"/>
                                    </a>
                                    <h4><?= $product['title']; ?></h4>
                                    <p><a class="btn btn-default btn-sm"
                                          onclick="addToCart(<?= $product['id'] . "," .
                                          (isset($promotedPrice) ? $promotedPrice : $product['price']) ?>)">
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
                                        ?></p>
                                    <div class="pro-grd">
                                        <a href="single.php?pid=<?= $product['id']; ?>">View</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div id="loader"></div>
                <div class="col-md-4 products-grid-right">
                    <div class="w_sidebar">
                        <div class="w_nav1">
                            <h4>Filters</h4>
                            <ul>
                                <li>
                                    Most sold
                                    <input id="mostSoldFilter" type="checkbox" onclick="filterProducts()">
                                </li>
                                <li>
                                    Most reviewed
                                    <input id="mostReviewedFilter" type="checkbox" onclick="filterProducts()">
                                </li>
                                <li>
                                    Newest
                                    <input id="newestFilter" type="checkbox" onclick="filterProducts()">
                                </li>
                                <li>
                                    Highest rated
                                    <input id="highestRatedFilter" type="checkbox" onclick="filterProducts()">
                                </li>
                            </ul>
                        </div>
                        <section class="sky-form">
                            <h4>Price filter</h4>
                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                            <div id="slider-range"></div>
                        </section>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

<?php
//Include Footer
require_once "../elements/footer.php";
?>