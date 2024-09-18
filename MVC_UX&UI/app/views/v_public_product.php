<?php
include("includes/public_header.php")
?>
    <main class="main">

        <div class = "main-wrapper">

            <div class = "container">

                <div class = "product-div">

                    <div class = "product-div-left">
                        <div class = "img-container">
                            <img src = "<?php $this->getData('prod_image'); ?>" alt="product">
                        </div>
                        <div class = "hover-container">
                            <div><img alt="image" src="<?php $this->getData('prod_image'); ?>"></div>
                            <div><img alt="image" src="<?php $this->getData('prod_image'); ?>"></div>
                            <div><img alt="image" src="<?php $this->getData('prod_image'); ?>"></div>
                            <div><img alt="image" src="<?php $this->getData('prod_image'); ?>"></div>
                            <div><img alt="image" src="<?php $this->getData('prod_image'); ?>"></div>
                        </div>
                    </div>

                    <div class = "product-div-right">
                        <span class = "product-name"><?php $this->getData('prod_mainName'); ?></span>
                        <span class = "product-price"><?php $this->getData('prod_price'); ?></span>
                        <div class = "product-rating">
                            <span><i class="ri-star-fill"></i></span>
                            <span><i class="ri-star-fill"></i></span>
                            <span><i class="ri-star-fill"></i></span>
                            <span><i class="ri-star-fill"></i></span>
                            <span><i class="ri-star-half-fill"></i></span>
                            <span>(350 ratings)</span>
                        </div>
                        <p class = "product-description"><?php $this->getData('prod_subName'); ?></p>
                        <div class = "btn-groups">
                            <button type = "button" class = "add-cart-btn"><i class="ri-add-box-fill"></i>
                            <a href="cart.php?id=<?php $this->getData('prod_id');?>" class="button">ADD TO CART</a>
                            </button>
                            <button type = "button" class = "buy-now-btn"><i class="ri-shopping-cart-fill"></i> BUY NOW</button>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </main>

<?php
include("includes/public_footer.php")
?>