<?php

    include('app/init.php');

    include 'app/views/includes/public_header.php';
    include 'app/views/includes/all_products.php';
    include 'app/views/includes/public_footer.php';

    $categories = $Categories->getCategories(1);
    echo '<prev>';
    print_r($categories);
    echo '</prev>';
    $category_nav = $Categories->getCategoryNav($categories['name_category']);
    echo '<prev>';
    print_r($category_nav);
    echo '</prev>';
    $Template->setData('page_nav', $category_nav);
?>