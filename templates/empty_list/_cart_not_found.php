<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo biggerFont">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-md-9">
                <!--empty cart -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-12 text-center py-2">
                        <img src="https://lh3.googleusercontent.com/proxy/SPl8Jxh2pf7hPquDzroIwXW3jxw8NcU8np28vqlpGJdY_FdwBPBVvUA2oycy1XgRH-PTRPsDDy7gJK4LNAUpixWhO0YJRwprZI9YgI5xBEOh27Dznm0-a3BAQaVpQ1plZc8_ba86UqqsjBxK_slw"
                         class="img-fluid" style="height: 200px;" alt="Empty Cart">
                        <h6 class="font-baloo font-size-16 text-danger">
                            Your Cart is Empty.
                        </h6>
                    </div>
                </div>
            </div>
            <!-- subtotal section-->
            <div class="col-md-3">
                <div class="sub-total border text-center mt-3 border-secondary">
                    <h6 class="font-size-12 font-rale text-success  py-3">
                        <i class="fas fa-check"></i> FREE Delivery.
                    </h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">
                            Subtotal (
                            <strong><?php echo isset($subTotal) ? count($subTotal) : 0; ?>
                            </strong>
                            item):&nbsp;
                            <span class="text-danger">$
                                <span class="text-danger" id="deal-price">
                                    <?php echo isset($subTotal) ? $Cart->getSubtotal($subTotal) :
                                        0; ?>
                                </span>
                            </span>
                        </h5>
                        <button type="submit" class="btn btn-success mt-3">
                            Proceed to Buy
                        </button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>