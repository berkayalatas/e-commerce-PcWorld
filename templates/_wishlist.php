<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-cart-submit'])) {
        $deletedItem = $Cart->deleteCart($_POST['item_id']);
    }


    if (isset($_POST['cart-submit'])) {
        $Cart->addToWishlist($_POST['item_id'], 'cart', 'wishlist');
    }
}


?>

<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo biggerFont">Wishlist</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-md-9">
                <?php
                foreach ($product->getData('wishlist') as $item) : $cart =
                        $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item) { ?>
                        <!-- cart item -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-lg-2">
                                <img src="<?php echo $item['item_image'] ?? "./assets/products/d.jpg"; ?>" style="height: 120px" alt="cart1" class="img-fluid" />
                            </div>
                            <div class="col-lg-8">
                                <h5 class="font-baloo font-size-20">
                                    <?php echo $item['item_name'] ?? "Unknown name"; ?>
                                </h5>
                                <small>by
                                    <?php echo $item['item_brand'] ?? "Unknown Brand"; ?></small>
                                <!-- product rating -->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <a href="#" class="px-2 font-rale font-size-14">18,574 ratings</a>
                                </div>
                                <!--  !product rating-->

                                <!-- product qty -->
                                <div class="qty d-flex pt-2">
                                    <form method="POST">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id" />
                                        <button type="submit" name="delete-cart-submit" class="btn font-baloo btn-danger border-right">
                                            Delete
                                        </button>
                                    </form>

                                    <form method="POST">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id" />
                                        <button type="submit" name="cart-submit" class="btn font-baloo ml-sm-1 btn-success">
                                            Add to Cart
                                        </button>
                                    </form>


                                </div>
                                <!-- !product qty -->
                            </div>

                            <div class="col-lg-2 text-md-right">
                                <div class="font-size-20 text-danger font-baloo">
                                    $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>">
                                        <?php echo $item['item_price'] ?? "Unknown price"; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- !cart item -->
                <?php
                        return $item['item_price'];
                    }, $cart); //close array_map function
                endforeach;
                ?>
            </div>
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>