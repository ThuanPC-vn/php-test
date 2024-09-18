<?php
include("includes/public_header.php")
?>

        <main class="main">
            <div class="container">
                <div class="checkoutLayout">


                    <div class="returnCart">
                        <a href="#">keep shopping</a>
                        <h1>List Product in Cart</h1>
                        <div class="list">

                            <?php $this->getData('cart_items'); ?>

                        </div>
                    </div>


                    <div class="right">
                        <h1>Checkout</h1>

                        <div class="form">
                            <div class="group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name">
                            </div>

                            <div class="group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone">
                            </div>

                            <div class="group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address">
                            </div>

                            <div class="group">
                                <label for="country">Country</label>
                                <select name="country" id="country">
                                    <option value="">Choose..</option>
                                    <option value="">Kingdom</option>
                                </select>
                            </div>

                            <div class="group">
                                <label for="city">City</label>
                                <select name="city" id="city">
                                    <option value="">Choose..</option>
                                    <option value="">London</option>
                                </select>
                            </div>
                        </div>
                        <div class="return">
                            <div class="row">
                                <div>Total Quantity</div>
                                <div class="totalQuantity"><?php $this->getData('total_quantity'); ?></div>
                            </div>
                            <div class="row">
                                <div>Total Price</div>
                                <div class="totalPrice"><?php $this->getData('total_amount'); ?></div>
                            </div>
                        </div>
                        <button class="buttonCheckout">CHECKOUT</button>
                    </div>
                </div>
            </div>
        </main>
<?php
include("includes/public_footer.php")
?>