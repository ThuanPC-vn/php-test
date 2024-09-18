<?php
include("includes/public_header.php")
?>

<!--==================== MAIN ====================-->
<main class="main">

    <!--==================== PRODUCT ALL ====================-->
    <section class="pro__all section" id="pro__all">
       <h2 class="section__title">
          ALL PRODUCTS
       </h2>

       <div class="pro__all__container container">

          <div class="pro__all__menu">
             <ul class="pro__all__fillters">

             <?php $this->getData('page_nav');?>

             </ul>
          </div>

          <div class="pro__all__content grid">
             <!--Tiểu chuẩn pixel tất cả ảnh: 190x224px-->

             <?php $this->getData('products');?>

           </div>
       </div>
    </section>
    
</main>
<?php
include("includes/public_footer.php")
?>