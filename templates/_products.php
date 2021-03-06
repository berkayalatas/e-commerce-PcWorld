<?php
$item_id = $_GET['item_id'] ?? 1;

foreach ($product->getData() as $item) :
  if ($item['item_id'] == $item_id) :

?>

    <section id="product" class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <img src="<?php echo $item['item_image'] ?? "./assets/products/f.jpg" ?>" alt="product" class="img-fluid" style="max-height: 550px" />
            <div class="form-row pt-4 font-size-16 font-baloo">
              <div class="col-10">
                <form method="POST">
                  <input type="hidden" name="item_id" value="
                      <?php echo $item['item_id'] ?? "1"; ?>
                    ">
                  <input type="hidden" name="user_id" value="
                      <?php echo 1 ?>
                    ">
                  <?php
                  if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])) {
                    echo '<button type="submit" disabled class="btn btn-warning font-size-16 form-control">
                          <i class="fas fa-cart-arrow-down"></i>  In Cart  
                      </button>';
                  } else {
                    echo '<button type="submit"
                       name="most_popular_submit" class="btn form-control btn-warning font-size-16">
                       <i class="fas fa-plus"></i>  Add to Cart
                    </button>';
                  }
                  ?>
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-6 py-5">
            <h5 class="font-baloo biggerFont"> <?php echo $item['item_name'] ?? "Unknown Product"  ?> </h5>
            <small>by <?php echo $item['item_brand'] ?? "Unknown Brand"  ?></small>
            <div class="d-flex">
              <div class="rating text-warning font-size-12">
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="fas fa-star"></i></span>
                <span><i class="far fa-star"></i></span>
              </div>
              <a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 1000+ answered questions</a>
            </div>
            <hr class="m-0" />

            <!--- !product price -->
            <table class="my-3">
              <tr class="font-rale font-size-14">
                <td>M.R.P:</td>
                <td><strike>$<?php echo $item['item_price'] + 100 ?? "Unknown" ?></strike></td>
              </tr>
              <tr class="font-rale font-size-14">
                <td>Deal Price:</td>
                <td class="font-size-20 text-danger">
                  <i class="fas fa-dollar-sign"></i>
                  <span>
                    <?php echo $item['item_price'] ??
                      "Unknown Price"  ?>
                  </span>
                  <small class="text-dark font-size-12">
                  </small>
                </td>

              </tr>
              <tr class="font-rale font-size-14">
                <td>You Save:</td>
                <td><span class="font-size-16 text-danger">$100</span></td>
              </tr>
            </table>
            <!---    !product price       -->

            <!--    !#policy -->
            <div id="policy">
              <div class="d-flex">
                <div class="return text-center mr-5">
                  <div class="font-size-20 my-2 color-second">
                    <span class="fas fa-retweet border p-3 rounded-pill"></span>
                  </div>
                  <a href="#" class="font-rale font-size-12">10 Days <br />
                    Replacement</a>
                </div>
                <div class="return text-center mr-5">
                  <div class="font-size-20 my-2 color-second">
                    <span class="fas fa-truck border p-3 rounded-pill"></span>
                  </div>
                  <a href="#" class="font-rale font-size-12"> <br />Deliverd</a>
                </div>
                <div class="return text-center mr-5">
                  <div class="font-size-20 my-2 color-second">
                    <span class="fas fa-check-double border p-3 rounded-pill"></span>
                  </div>
                  <a href="#" class="font-rale font-size-12">2 Year <br />Warranty</a>
                </div>
              </div>
            </div>

            <hr />
            <!--  policy -->
            <!-- order-details -->
            <div id="order-details" class="font-rale d-flex flex-column text-dark">
              <small>Delivery by:
                <?php define('SECONDS_PER_DAY', 86400);
                echo date('Y-m-d', time() + 3 * SECONDS_PER_DAY); ?>
              </small>
              <small class="mt-1">Sold by <a href="#"> <small><?php echo $item['item_brand'] ?? "Unknown Brand"  ?></small>
                </a> (4.5 out of 5 | 18,198
                ratings)</small>
              <small class="mt-1"><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
            </div>
            <!-- !order-details -->

            <div class="row">
              <div class="col-6">
                <!-- color -->
                <div class="color my-3">
                  <div class="d-flex justify-content-between">
                    <h6 class="font-baloo">Color:</h6>
                    <div class="p-2 bg-secondary rounded-circle">
                      <button class="btn font-size-14"></button>
                    </div>
                    <div class="p-2 bg-dark rounded-circle">
                      <button class="btn font-size-14"></button>
                    </div>
                    <div class="p-2 bg-light rounded-circle">
                      <button class="btn font-size-14"></button>
                    </div>
                  </div>
                </div>
                <!-- !color -->
              </div>
              <div class="col-6">
                <!-- product qty section -->
                <div class="qty d-flex">
                  <h6 class="font-baloo ml-3">Qty</h6>
                  <div class="px-4 d-flex font-rale">
                    <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>">
                      <i class="fas fa-angle-up"></i>
                    </button>
                    <input type="text" class="qty_input border px-2 w-50 bg-light" disabled data-id="<?php echo $item['item_id'] ?? '0'; ?>" value="1" placeholder="1" />
                    <button class="qty-down border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>">
                      <i class="fas fa-angle-down"></i>
                    </button>
                  </div>
                </div>
                <!-- !product qty section -->
              </div>
            </div>

            <!-- size -->
            <div class="size my-3">
              <h6 class="font-baloo">Screen :</h6>
              <div class="d-flex justify-content-between w-75">
                <div class="font-rubik border p-2">
                  <button class="btn p-0 font-size-14">13-inch</button>
                </div>
                <div class="font-rubik border p-2">
                  <button class="btn p-0 font-size-14">15-inch</button>
                </div>
                <div class="font-rubik border p-2">
                  <button class="btn p-0 font-size-14">17-inch</button>
                </div>
              </div>
            </div>
            <!-- !size -->
          </div>

          <div class="col-12 mt-4">
            <h6 class="font-rubik">Product Description</h6>
            <hr />
            <p class="font-rale font-size-14">
              Logic Pro puts a complete recording and MIDI production studio on your
              Mac, with everything you need to write, record, edit, and mix like
              never before. And with a huge collection of full-featured plug-ins
              along with thousands of sounds and loops, you’ll have everything you
              need to go from first inspiration to final master, no matter what kind
              of music you want to create.
            </p>
            <p class="font-rale font-size-14">
              Safari has innovative features that let you enjoy more of the web. In
              even more ways. Built-in privacy features help protect your
              information and keep your Mac secure. An updated start page helps you
              easily and quickly save, find, and share your favorite sites. And Siri
              suggestions surface bookmarks, links from your reading list, iCloud
              Tabs, links you receive in Messages, and more.
            </p>
          </div>
        </div>
      </div>
    </section>

<?php
  endif;
endforeach;
?>