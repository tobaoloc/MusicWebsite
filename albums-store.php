<?php
$getLatestProductsQuery = "SELECT * FROM `products` ORDER BY `ID` DESC"; // Lấy 6 sản phẩm mới nhất
$result = $mysql->query($getLatestProductsQuery);
// Get user ID from session if available
$userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;
?>
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="bradcumbContent">
        <p>See what’s new</p>
        <h2>Latest Albums</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Album Catagory Area Start ##### -->
<section class="album-catagory section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="browse-by-catagories catagory-menu d-flex flex-wrap align-items-center mb-70">
                    <a href="#" data-filter="*" class="active">All</a>
                    <a href="#" data-filter=".a">A</a>
                    <a href="#" data-filter=".b">B</a>
                    <a href="#" data-filter=".c">C</a>
                    <a href="#" data-filter=".d">D</a>
                    <a href="#" data-filter=".e">E</a>
                    <a href="#" data-filter=".f">F</a>
                    <a href="#" data-filter=".g">G</a>
                    <a href="#" data-filter=".h">H</a>
                    <a href="#" data-filter=".i">I</a>
                    <a href="#" data-filter=".j">J</a>
                    <a href="#" data-filter=".k">K</a>
                    <a href="#" data-filter=".l">L</a>
                    <a href="#" data-filter=".m">M</a>
                    <a href="#" data-filter=".n">N</a>
                    <a href="#" data-filter=".o">O</a>
                    <a href="#" data-filter=".p">P</a>
                    <a href="#" data-filter=".q">Q</a>
                    <a href="#" data-filter=".r">R</a>
                    <a href="#" data-filter=".s">S</a>
                    <a href="#" data-filter=".t">T</a>
                    <a href="#" data-filter=".u">U</a>
                    <a href="#" data-filter=".v">V</a>
                    <a href="#" data-filter=".w">W</a>
                    <a href="#" data-filter=".x">X</a>
                    <a href="#" data-filter=".y">Y</a>
                    <a href="#" data-filter=".z">Z</a>
                    <a href="#" data-filter=".number">0-9</a>
                </div>
            </div>
        </div>

        <div class="row oneMusic-albums">

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                <div class="single-album">
                    <img src="img/bg-img/a1.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>The Cure</h5>
                        </a>
                        <p>Second Song</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item s e q">
                <div class="single-album">
                    <img src="img/bg-img/a2.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>Sam Smith</h5>
                        </a>
                        <p>Underground</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item w f r">
                <div class="single-album">
                    <img src="img/bg-img/a3.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>Will I am</h5>
                        </a>
                        <p>First</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t g u">
                <div class="single-album">
                    <img src="img/bg-img/a4.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>The Cure</h5>
                        </a>
                        <p>Second Song</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item d h v">
                <div class="single-album">
                    <img src="img/bg-img/a5.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>DJ SMITH</h5>
                        </a>
                        <p>The Album</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t i x">
                <div class="single-album">
                    <img src="img/bg-img/a6.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>The Ustopable</h5>
                        </a>
                        <p>Unplugged</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item b j y">
                <div class="single-album">
                    <img src="img/bg-img/a7.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>Beyonce</h5>
                        </a>
                        <p>Songs</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item a k z">
                <div class="single-album">
                    <img src="img/bg-img/a8.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>Aam Smith</h5>
                        </a>
                        <p>Underground</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item w l number">
                <div class="single-album">
                    <img src="img/bg-img/a9.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>Will I am</h5>
                        </a>
                        <p>First</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item d m">
                <div class="single-album">
                    <img src="img/bg-img/a10.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>DJ SMITH</h5>
                        </a>
                        <p>The Album</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t n">
                <div class="single-album">
                    <img src="img/bg-img/a11.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>The Ustopable</h5>
                        </a>
                        <p>Unplugged</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item b o">
                <div class="single-album">
                    <img src="img/bg-img/a12.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>Beyonce</h5>
                        </a>
                        <p>Songs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ##### Album Category Area End ##### -->

<!-- ##### Buy Now Area Start ##### -->
<div id="buy-now-area" class="oneMusic-buy-now-area mb-100">
    <div class="container">
        <div class="row" id="album-container">
            <?php
            $shoppingCartItems = isset($_SESSION['shoppingCart']) ? $_SESSION['shoppingCart'] : [];
            // Fetch products from the database
            while ($product = $result->fetch_array()) {
                // Check if the current product is already in the shopping cart
                $isInCart = false;
                foreach ($shoppingCartItems as $item) {
                    if ($item[1] === $product['name']) {
                        $isInCart = true;
                        break;
                    }
                }
                $isOrdered = false;
                if ($userId) {
                    $productId = $product['id'];
                    $checkOrderItems = "SELECT COUNT(*) AS count FROM orders_items WHERE product_id = $productId AND order_id IN (SELECT id FROM orders WHERE user_id = $userId)";
                    $result2 = $mysql->query($checkOrderItems);
                    $row = mysqli_fetch_assoc($result2);
                    $isOrdered = $row['count'] > 0;
                }
                ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="700ms">
                        <div class="album-thumb">
                            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                            <!-- Album Price -->
                            <div class="album-price">
                                <p><?php echo $product['price']; ?></p>
                            </div>
                            <!-- Play Icon -->
                            <div class="play-icon">
                                <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                            </div>
                        </div>
                        <div style="padding-bottom: 30px;" class="album-info">
                            <a href="#">
                                <h5><?php echo $product['name']; ?></h5>
                            </a>
                            <p><?php echo $product['descriptions']; ?></p>
                            <?php if ($isInCart) { ?>
                                <button id="alreadyInCart" disabled="disabled">Already in Cart</button>
                            <?php } elseif ($isOrdered) { ?>
                                <button id="alreadyOrdered">Already Ordered</button>
                            <?php } else { ?>
                                <form action="shoppingcart.php" method="post">
                                    <input class="addToCartButton" type="submit" name="addtocart" value="Add to Cart">
                                    <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                                    <input type="hidden" name="albumImage" value="<?php echo $product['image']; ?>">
                                    <input type="hidden" name="albumName" value="<?php echo $product['name']; ?>">
                                    <input type="hidden" name="albumPrice" value="<?php echo $product['price']; ?>">
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- Load More Button -->
        <div class="row">
            <div class="col-12">
                <div class="load-more-btn text-center">
                    <!-- Add an ID to the load more button -->
                    <a href="#" id="load-more-btn" class="btn oneMusic-btn">Load More <i
                            class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Buy Now Area End ##### -->

<!-- ##### Add Area Start ##### -->
<div class="add-area mb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="adds">
                    <a href="#"><img src="img/bg-img/add3.gif" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Add Area End ##### -->

<!-- ##### Song Area Start ##### -->
<div class="one-music-songs-area mb-70">
    <div class="container">
        <div class="row">

            <!-- Single Song Area -->
            <div class="col-12">
                <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                    <div class="song-thumbnail">
                        <img src="img/bg-img/s1.jpg" alt="">
                    </div>
                    <div class="song-play-area">
                        <div class="song-name">
                            <p>01. Main Hit Song</p>
                        </div>
                        <audio preload="auto" controls>
                            <source src="audio/dummy-audio.mp3">
                        </audio>
                    </div>
                </div>
            </div>

            <!-- Single Song Area -->
            <div class="col-12">
                <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                    <div class="song-thumbnail">
                        <img src="img/bg-img/s2.jpg" alt="">
                    </div>
                    <div class="song-play-area">
                        <div class="song-name">
                            <p>01. Main Hit Song</p>
                        </div>
                        <audio preload="auto" controls>
                            <source src="audio/dummy-audio.mp3">
                        </audio>
                    </div>
                </div>
            </div>

            <!-- Single Song Area -->
            <div class="col-12">
                <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                    <div class="song-thumbnail">
                        <img src="img/bg-img/s3.jpg" alt="">
                    </div>
                    <div class="song-play-area">
                        <div class="song-name">
                            <p>01. Main Hit Song</p>
                        </div>
                        <audio preload="auto" controls>
                            <source src="audio/dummy-audio.mp3">
                        </audio>
                    </div>
                </div>
            </div>

            <!-- Single Song Area -->
            <div class="col-12">
                <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                    <div class="song-thumbnail">
                        <img src="img/bg-img/s4.jpg" alt="">
                    </div>
                    <div class="song-play-area">
                        <div class="song-name">
                            <p>01. Main Hit Song</p>
                        </div>
                        <audio preload="auto" controls>
                            <source src="audio/dummy-audio.mp3">
                        </audio>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ##### Song Area End ##### -->