<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== FAVICON ===============-->
      <link rel="shortcut icon" href="resources/img/favicon_TTAN.png" type="image/x-icon">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

      <!--=============== SWIPER CSS ===============-->
      <link rel="stylesheet" href="resources/css/swiper-bundle.min.css">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" type="text/css" href="resources/css/styles.css">
      <link rel="stylesheet" type="text/css" href="resources/css/screen.css">
      <link rel="stylesheet" type="text/css" href="resources/css/cssDetailProduct.css">
      <link rel="stylesheet" type="text/css" href="resources/css/cssCheckout.css">

      <title><?php $this->getData('page_title');?></title>
   </head>
   <body class="">
      <!--==================== HEADER ====================-->
      <header class="header" id="header">
         <nav class="nav container">
            <div class="nav__data">
               <a href="#" class="nav__logo">TTAN.STORE</a>
            </div>

            <!--==================== NAV MENU ====================-->
            <div class="nav__menu" id="nav-menu">
                  <ul class="nav__list">

                     <li class="">
                        <a href="<?php echo SITE_PATH . "index.php"?>" class="nav__link">Home</a>
                     </li>

                     <!--==================== Products Dropdown ====================-->
                     <li class="dropdown__item">
                        <div href="#" class="nav__link">
                           Products<i class="ri-arrow-drop-down-line dropdown__arrow"></i>
                        </div>

                        <ul class="dropdown__menu">

                           <li class="dropdown__subitem">
                              
                              <div class="dropdown__link">
                                 <i class="ri-computer-line"></i> PC <i class="ri-add-box-line dropdown__add" ></i>
                              </div>
                              

                              <ul class="dropdown__submenu">
                                 <li>
                                    <a href="#" class="dropdown__sublink">
                                       <i class="ri-gamepad-line"></i> PC Gaming
                                    </a>
                                 </li>

                                 <li>
                                    <a href="#" class="dropdown__sublink">
                                       <i class="ri-home-office-fill"></i> PC Offcie
                                    </a>
                                 </li>

                                 <li>
                                    <a href="#" class="dropdown__sublink">
                                       <i class="ri-fire-line"></i> PC's ProPlayer Esport
                                    </a>
                                 </li>
                              </ul>
                           </li>
                           
                           <li class="dropdown__subitem">
                              <div class="dropdown__link">
                                 <i class="ri-macbook-line"></i> Laptop <i class="ri-add-box-line dropdown__add"></i>
                              </div>

                              <ul class="dropdown__submenu">
                                 <li>
                                    <a href="#" class="dropdown__sublink">
                                       <i class="ri-gamepad-fill"></i> Laptop Gaming
                                    </a>
                                 </li>

                                 <li>
                                    <a href="#" class="dropdown__sublink">
                                       <i class="ri-home-office-line"></i> Laptop Offcie
                                    </a>
                                 </li>
                              </ul>
                           </li>

                           <li class="dropdown__subitem">
                              <div class="dropdown__link">
                                 <i class="ri-mac-line"></i> Monitor Display <i class="ri-add-box-line dropdown__add"></i>
                              </div>

                              <ul class="dropdown__submenu">
                                 <li>
                                    <a href="#" class="dropdown__sublink">
                                       <i class="ri-computer-fill"></i> Monitor Gaming
                                    </a>
                                 </li>

                                 <li>
                                    <a href="#" class="dropdown__sublink">
                                       <i class="ri-tv-2-fill"></i> Monitor Offcie
                                    </a>
                                 </li>
                              </ul>
                           </li>

                           <li class="dropdown__subitem">
                              <div class="dropdown__link">
                                 <i class="ri-dashboard-2-line"></i> Device Network
                                 <i class="ri-add-box-line dropdown__add"></i>
                              </div>

                              <ul class="dropdown__submenu">
                                 <li>
                                    <a href="#" class="dropdown__sublink">
                                       <i class="ri-rfid-line"></i> Device Network Gaming
                                    </a>
                                 </li>

                                 <li>
                                    <a href="#" class="dropdown__sublink">
                                       <i class="ri-home-wifi-line"></i> Device Network Popular
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>

                     <li class="">
                        <a href="#" class="nav__link">Contact</a>
                     </li>

                     <!--==================== User Dropdown ====================-->
                     <li class="dropdown__item">
                        <div href="#" class="nav__link">
                           User<i class="ri-arrow-drop-down-line dropdown__arrow"></i>
                        </div>

                        <ul class="dropdown__menu">
                           <li>
                              <a href="<?php echo SITE_PATH . "cart.php"; ?>" class="dropdown__link">
                                 <i class="ri-shopping-basket-2-fill"></i> Shopping cart
                              </a>
                           </li>
                           <li>
                              <a href="#" class="dropdown__link">
                                 <i class="ri-user-shared-fill"></i> Login
                              </a>
                           </li>
                        </ul>
                     </li> 
                  </ul>

                  <!--Close button-->
                  <div class="nav__close" id="nav-close">
                     <i class="ri-close-fill"></i>
                  </div>
            </div>

            <div href="#" class="nav__action">
               <!--theme button
               <i class="ri-sun-line change-theme" id="theme-button"></i>-->
               <i class="ri-moon-line change-theme" id="theme-button"></i>

               <!--search button-->
               <i class="ri-menu-search-line nav__search" id="search-btn"></i>

               <!--Toggle button-->
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-2-line"></i>
               </div>
            </div>

         </nav>

      </header>

      <!--==================== seach ====================-->
      <div id="search" class="search">
         <form action="#" class="search__form">
            <i class="ri-search-line search__icon"></i>
            <input type="search" placeholder="What're you looking for?" class="search__input">
         </form>

         <i class="ri-close-line search__close" id="search-close"></i>
      </div>