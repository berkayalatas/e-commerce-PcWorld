<?php
shuffle($product_shuffle); //shuffle data that get from database

//request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['new_computers_submit'])) {
    //call method addToCart
    $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
  }
}

?>

<!-- !New Computers -->
<section id="new-computers">
  <div class="container bg-light mt-sm-5">
    <h4 class="font-rubik font-size-20 biggerFont">New Computers</h4>
    <hr />

    <!-- owl carousel -->
    <div class="owl-carousel owl-theme">
      <?php foreach ($product_shuffle as $item) { ?>
        <div class="item py-2 bg-light mr-sm-3">
          <div class="product font-rale">
            <a href="<?php printf("%s?item_id=%s", 'product.php', $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "product image" ?>" alt="product1" class="img-fluid" /></a>
            <div class="text-center">
              <h6> <?php echo $item['item_name'] ?? "Unknown;" ?></h6>
              <div class="rating text-warning font-size-12">
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="far fa-star"></i></span>
              </div>
              <div class="price py-2">
                <span>
                  <i class="fas fa-dollar-sign"></i>
                  <?php echo $item['item_price'] ?? '0'; ?></span>
              </div>
              <form method="POST">
                <input type="hidden" name="item_id" value="
                      <?php echo $item['item_id'] ?? "1"; ?>
                    ">
                <input type="hidden" name="user_id" value="
                      <?php echo 1 ?>
                    ">
                <?php
                if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])) {
                  echo '<button type="submit" disabled class="btn btn-success font-size-12">
                      <i class="fas fa-cart-arrow-down"></i> In the Cart
                      </button>';
                } else {
                  echo '<button type="submit" name="new_computers_submit" class="btn btn-warning font-size-12">
                      <i class="fas fa-plus"></i> Add to Cart
                    </button>';
                }
                ?>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
      <!--  close foreach -->
    </div>
    <!-- owl carousel -->
  </div>
</section>
<!-- New Computers -->