<?php
    include('app/init.php');

    include 'app/views/includes/public_header.php';
    $categories = $Categories->getCategories();
    $category_nav = $Categories->getCategoryNav('all');
    include 'app/views/includes/all_products.php';
    include 'app/views/includes/public_footer.php';
?>