<?php

/*
  Cart Class
  Handle all tasks related to showing or modifying the number of items in the cart

  The cart keeps track of user selected items using a session variable, $_SESSION['cart].
  The session variable holds an array that contains the ids and the number selected of the product
  in the cart

  $_SESSION['cart']['product_id] = num of specific item in the cart
*/

class Cart
{
    function __construct() {}

  /*
  Getters and Setters
  */
  /**
   * Return an array of all product info for items in the cart
   *
   * @access public
   * @param
   * @return array, null
   */
  public function get()
  {
    if (isset($_SESSION['cart'])) {
      //get all products ids of items in the cart
      $ids = $this->get_ids();
      // use list of ids to get the products info from database
      global $Products;
      return $Products->getProductData($ids);
    } 
    return null;
  }

  /**
   * Return an array of all product ids in cart
   *
   *  @access public
   * @param 
   * @return array, null
   **/
  public function get_ids()
  {
    if (isset($_SESSION['cart'])) {
      return array_keys($_SESSION['cart']);
    }
    return null;
  }


  /**
   * Add item to the cart
   * 
   * @access public
   * @param int, int
   * @return null
   */

   public function add($id, $num = 1)
   {
     //setup or restrive cart
     if (isset($_SESSION['cart'])) {
       $cart = $_SESSION['cart'];
     }
 
     // check to see if item is already in the cart
     if (isset($cart[$id])) {
       // if item is in cart
       $cart[$id] += $num;
     } else {
       // if item is not in cart
       $cart[$id] = $num;
     }
     $_SESSION['cart'] = $cart;
   }

   /**
   * Update the quantity of a specific item in the cart
   * 
   * @access public
   * @param int,int
   * @return NULL
   */
  public function update($id, $num = 1)
  {
    if ($num == 0) {
      unset($_SESSION['cart'][$id]);
      if (empty($_SESSION['cart'])) {
        unset($_SESSION['cart']);
      }
    } else {
      $_SESSION['cart'][$id] = $num;
    }
  }


  /**
   * Empties all item from the cart
   * 
   * @access public
   * @param
   * @return null
   */
  public function empty_cart()
  {
    unset($_SESSION['cart']);
  }


  /**
   * Return total number of all items in the cart
   * 
   * @access public
   * @param
   * @return int
   */
  public function getTotalItems()
  {
    $num = 0;

    if (isset($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $item) {
        $num = $num + $item;
      }
    }
    return $num;
  }



  /**
   * Return total cost of all items in the cart
   * 
   * @access public
   * @param
   * @return int
   */
  public function getTotalCost()
  {
    $num = '0.00';

    if (isset($_SESSION['cart'])) {
      // if items to display
      // foreach ($_SESSION['cart'] as $item) {
      //   $num = $num + $item;
      // }

      //get product prices
      $ids = $this->get_ids();

      global $Products;
      $prices = $Products->get_prices($ids);

      // loop through, adding the cost of each item x the number of the item in the cart to $num each time

      if ($prices != NULL) {
        foreach ($prices as $price) {
          $num += doubleval($price['price'] * $_SESSION['cart'][$price['id']]);
        }
      }
    }
    return $num;
  }



  /**
   * Return shipping cost based on cost of items
   * 
   * @access public
   * @param double
   * @return double
   */
  public function getShippingCost($total)
  {
    if ($total > 200) {
      return 40.0;
    } else if ($total > 50) {
      return 15.0;
    } else if ($total > 10) {
      return 5.0;
    } else {
      return 2.0;
    }
  }


  /*
  Create page parts
  */
  /**
   * Return a string, containing list items for each product in the cart
   * 
   * @access public
   * @param
   * @return string
   */

   public function create_cart()
   {
     // get products currently in cart
     $products = $this->get();
 
     $data = '';
     $total = 0;
     $shipping = 0;


     
     if ($products != null) {
        
        foreach ($products as $product) {
          $data .= '<div class="item">
                      <img src="'.  IMAGE_PATH . $product['img'] .'">
                      <div class="info">
                        <div class="name">'. htmlspecialchars($product['mainName']) .'</div>
                        <div class="price">$'. $product['price'] .'/1 product</div>
                      </div>
                      <div class="quantity">'. $_SESSION['cart'][$product['id']] .'</div>
                      <div class="returnPrice">$'. $product['price'] * $_SESSION['cart'][$product['id']] .'</div>
                    </div>';
          
          $shipping += ($this->getShippingCost($product['price'] * $_SESSION['cart'][$product['id']]));
          $total += $product['price'] * $_SESSION['cart'][$product['id']];
        }

     } else {
        $data .= '<p>No items in the cart!</p>';
     }

     return $data;
   }


  /**
   * Return shipping cost based on cost of items
   * 
   * @access public
   * @param null
   * @return double
   */
  public function getTotal()
  {
    $total = 0;
    $products = $this->get();

    if ($products != '') {
      foreach ($products as $product) {
        $total += $product['price'] * $_SESSION['cart'][$product['id']];
      }
    }

    return $total;
  }
}










