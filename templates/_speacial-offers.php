<!-- get unique and sorted brand array for speacial offers section -->
<!-- if we add new brand to database, we do not need to change any data -->
<?php
$brand = array_map(function ($product) {
  return $product['item_brand'];
}, $product_shuffle);

$unique = array_unique($brand); //get unique brand

sort($unique); //sort  
shuffle($product_shuffle); //shuffle data that get from database

//request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['special_offers_submit'])) {
    //call method addToCart
    $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
  }
}

$in_cart = $Cart->getCartId($product->getData('cart'));

?>

<!-- !Special Offer -->
<section id="special-offer">
  <div class="container bg-light mt-sm-5">
    <h4 class="font-rubik font-size-20 biggerFont">Special Offers</h4>
    <div id="filters" class="button-group text-right font-baloo font-size-20">

      <?php
      array_map(function ($brand) {
        printf('<button class="btn btn-dark my-1 mr-1" data-filter=".%s">%s</button>', $brand, $brand);
      }, $unique);
      ?>

    </div>

    <div class="grid">
      <?php array_map(function ($item) use ($in_cart) { ?>
        <div class="grid-item <?php echo $item["item_brand"] ?? "Brand"; ?>  border mr-3 mt-sm-3">
          <div class="item py-2" style="width: 200px">
            <div class="product font-rale">
              <a href="<?php printf("%s?item_id=%s", 'product.php', $item['item_id']); ?>">
                <img src=<?php echo $item["item_image"] ?? "./assets/products/k.jpg" ?> alt="product1" class="img-fluid" />
              </a>
              <div class="text-center">
                <h6><?php echo $item["item_name"] ?? "item title"; ?></h6>
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
                    <?php echo $item["item_price"] ?? "price"; ?>
                  </span>
                </div>
                <form method="POST">
                  <input type="hidden" name="item_id" value="
                      <?php echo $item['item_id'] ?? "1"; ?>
                    ">
                  <input type="hidden" name="user_id" value="
                      <?php echo 1 ?>
                    ">
                  <?php
                  if (in_array($item['item_id'], $in_cart ?? [])) {
                    echo '<button type="submit" disabled class="btn btn-success font-size-12">
                    <i class="fas fa-cart-arrow-down"></i> In the Cart
                      </button>';
                  } else {
                    echo '<button type="submit" name="most_popular_submit" class="btn btn-warning font-size-12">
                    <i class="fas fa-plus"></i> Add to Cart
                    </button>';
                  }
                  ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php }, $product_shuffle) ?>

    </div>
  </div>
</section>
<!-- Special Offer -->