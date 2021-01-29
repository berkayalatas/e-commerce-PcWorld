<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['delete-cart-submit'])) {
    $deletedItem = $Cart->deleteCart($_POST['item_id']);
  }

  //add to wishlist
  if (isset($_POST['wishlist_submit'])) {
    $Cart->addToWishlist($_POST['item_id']);
  }
}
?>

<section id="cart" class="py-3">
  <div class="container-fluid w-75">
    <h5 class="font-baloo biggerFont">Shopping Cart</h5>

    <!--  shopping cart items   -->
    <div class="row">
      <div class="col-md-9">
        <?php
        foreach ($product->getData('cart') as $item) :
          $cart = $product->getProduct($item['item_id']);
          $subTotal[] = array_map(function ($item) {
        ?>
            <!-- cart item -->
            <div class="row border-top py-3 mt-3">
              <div class="col-lg-2">
                <img src="<?php echo $item['item_image'] ?? "./assets/products/d.jpg"; ?>" style="height: 120px" alt="cart1" class="img-fluid" />
              </div>
              <div class="col-lg-8">
                <h5 class="font-baloo font-size-20"> <?php echo $item['item_name'] ?? "Unknown name"; ?> </h5>
                <small>by <?php echo $item['item_brand'] ?? "Unknown Brand"; ?></small>
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
                  <div class="d-flex font-rale w-25 forMobileleft">
                    <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>">
                      <i class="fas fa-angle-up"></i>
                    </button>
                    <input type="text" class="qty_input border px-2 w-50 bg-light" disabled data-id="<?php echo $item['item_id'] ?? '0'; ?>"
                     value="1" placeholder="1" />
                    <button class="qty-down border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>">
                      <i class="fas fa-angle-down"></i>
                    </button>
                  </div>

                  <form method="POST">
                    <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                    <button type="submit" name="delete-cart-submit" class="btn font-baloo btn-danger ml-sm-4 px-3 border-right">
                    <i class="fas fa-trash"></i>  Delete
                    </button>
                  </form>


                  <form method="POST">
                    <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                    <button type="submit" name="wishlist_submit" class="btn font-baloo ml-sm-1 btn-warning">
                    <i class="fas fa-plus"></i> Add to Wishlist
                    </button>
                  </form>

                </div>
                <!-- !product qty -->
              </div>

              <div class="col-lg-2 text-md-right">
                <div class="font-size-20 text-danger font-baloo">
                <i class="fas fa-dollar-sign"></i>
                <span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>">
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
      <!-- subtotal section-->
      <div class="col-md-3">
        <div class="sub-total border text-center mt-3 border-secondary">
          <h6 class="font-size-12 font-rale text-success py-3">
            <i class="fas fa-check"></i> FREE
            Delivery.
          </h6>
          <div class="border-top py-4">
            <h5 class="font-baloo font-size-20">
              Subtotal (
              <strong><?php echo isset($subTotal) ? count($subTotal) : 0; ?> </strong>
              item):&nbsp;
              <span class="text-danger"> <i class="fas fa-dollar-sign"></i>
                <span class="text-danger" id="deal-price">
                  <?php echo isset($subTotal) ? $Cart->getSubtotal($subTotal) : 0; ?>
                </span>
              </span>
            </h5>
            <button type="submit" class="btn btn-success mt-3">
            <i class="fas fa-shopping-bag"></i> Proceed to Buy
            </button>
          </div>
        </div>
      </div>
      <!-- !subtotal section-->
    </div>
    <!--  !shopping cart items   -->
  </div>
</section>