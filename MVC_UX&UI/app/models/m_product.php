<?php

class Products{
    private $Database;
    private $db_tableProduct = 'products';


    function __construct($Database)
    {
        $this->Database = $Database;
    }

    /**
    * Retrieve product information from database
    * 
    * @access public
    * @return int (optional)
    * @return array
    */

    public function getProductData($id = null){

        $data = array();

        // if ($id != null) {
        //     $id = mysqli_real_escape_string($this->Database, $id);

        //     $result = $this->Database->query("SELECT id_product, name_product, sub_name_product, img_product, price_product FROM " . $this->db_tableProduct . " WHERE id_product IN ($id) LIMIT 1");

        //     if ($result) {
        //         if (mysqli_num_rows($result) > 0) {
        //             $row = mysqli_fetch_assoc($result);
        //             $data[] = array('id' => $row['id_product'], 'name_product' => $row['name_product'], 'sub_name_product' => $row['sub_name_product'], 'img_product' => $row['img_product'], 'price_product' => $row['price_product']);
        //         }
        //         $result->close();
        //     }
        // } else {
        //     $result = $this->Database->query("SELECT id_product, name_product, sub_name_product, img_product, price_product FROM " . $this->db_tableProduct);
        //     if ($result) {
        //         if (mysqli_num_rows($result) > 0) {
        //             while ($row = mysqli_fetch_assoc($result)) {
        //                 $data[] = array('id' => $row['id_product'], 'mainNameProduct' => $row['name_product'], 'subNameProduct' => $row['sub_name_product'], 'img' => $row['img_product'], 'price' => $row['price_product']);
        //             }
        //         }
        //     }
        // }

        /**================================================================================================== */

        if (is_array($id)) {
            // get products based on array of ids
            $items = '';
            foreach ($id as $item) {
              if ($items != '') {
                $items .= ',';
              }
              $items .= $item;
            }
            $result = $this->Database->query("SELECT id_product, name_product, sub_name_product, img_product, price_product FROM $this->db_tableProduct WHERE id_product IN ($items) ORDER BY name");
            if ($result) {
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
                  $data[] = array(
                    'id' => $row['id_product'],
                    'mainName' => $row['name_product'],
                    'subName' => $row['sub_name_product'],
                    'price' => $row['price_product'],
                    'img' => $row['img_product']
                  );
                }
              }
            }
          } else if ($id != null) {
            $stmt = $this->Database->prepare("SELECT 
            $this->db_tableProduct.id_product, 
            $this->db_tableProduct.name_product, 
            $this->db_tableProduct.sub_name_product, 
            $this->db_tableProduct.price_product,
            $this->db_tableProduct.img_product,
            categories.name_category as Category_name FROM $this->db_tableProduct 
            INNER JOIN categories ON $this->db_tableProduct.id_category = categories.id_category 
            WHERE $this->db_tableProduct.id_product = ?");
            // get one specific product
            if ($stmt) {
              $stmt->bind_param("s", $id);
              $stmt->execute();
              $stmt->store_result();
      
              if ($stmt->num_rows > 0) {
                $prod_id = null;
                $prod_name = null;
                $prod_sub_name = null;
                $prod_price = null;
                $prod_image = null;
                $cat_name = null;
                $stmt->bind_result($prod_id, $prod_name, $prod_sub_name, $prod_price, $prod_image, $cat_name);
                $stmt->fetch();
                $data = array('id' => $prod_id, 'mainName' => $prod_name, 'subName' => $prod_sub_name, 'price' => $prod_price, 'img' => $prod_image, 'category_name' => $cat_name);
              }
              $stmt->close();
            }
          } else {
            // get all products
            $result = $this->Database->query("SELECT 
                  $this->db_tableProduct.id_product, 
                  $this->db_tableProduct.name_product, 
                  $this->db_tableProduct.sub_name_product, 
                  $this->db_tableProduct.price_product,
                  $this->db_tableProduct.img_product, 
                  categories.name_category as Category_name 
                  FROM $this->db_tableProduct 
                  INNER JOIN categories ON $this->db_tableProduct.id_category = categories.id_category ");
            if ($result) {
              if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = array(
                        'id' => $row['id_product'],
                        'mainName' => $row['name_product'],
                        'subName' => $row['sub_name_product'],
                        'price' => $row['price_product'],
                        'img' => $row['img_product'],);
                }
              }
            }
          }

        return $data;
    }


    /**
    * Retrieve product information forr all products in specified category
    * 
    * @access public
    * @param int
    * return string
    */

    public function get_in_category($id)
    {
      $data = array();
      $stmt = $this->Database->prepare("SELECT 
      id_product,
      name_product,
      sub_name_product,
      img_product,
      price_product FROM " . $this->db_tableProduct . " WHERE category_id = ? ORDER BY name");

      if ($stmt) {
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
          $prod_id = null;
          $prod_name = null;
          $prod_subName = null;
          $prod_image = null;
          $prod_price = null;
          $stmt->bind_result($prod_id, $prod_name, $prod_image, $prod_price);
          while ($stmt->fetch()) {
            $data[] = array('id' => $prod_id, 'mainName' => $prod_name, 'subName' => $prod_subName, 'price' => $prod_price, 'img' => $prod_image);
          }
          $stmt->close();
        }
        return $data;
      }
      
    }


    /**
   * Return an array of price info for specified ids
   * 
   * @access public
   * @param array
   * @return array
   */

    public function get_prices($ids)
    {
      $data = [];

      // create comma separated list of ids
      $items = '';
      foreach ($ids as $id) {
        if ($items != '') {
          $items .= ',';
        }
        $items .= $id;
      }

      // get multiple product info based on list of ids
      $result = $this->Database->query("SELECT id_product, price_product, FROM $this->db_tableProduct WHERE id IN ($items) ORDER BY name");
      if ($result) {
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_array()) {
            $data[] = array('id' => $row['id_product'], 'price' => $row['price_product']);
          }
        }
       }
      
      return $data;
    }

    /**
    * Checks to ensure that product exists
    * 
    * @access public
    * @param img
    * @return boolean
    */

    public function product_exists($id)
    {
      $stmt = $this->Database->prepare("SELECT id_product FROM " . $this->db_tableProduct . " WHERE id =?");
      if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id);
        $stmt->fetch();

        if ($stmt->num_rows > 0) {
          $stmt->close();
          return true;
        }
        $stmt->close();
        return false;
      }
    }


    /**
    * Create product using info from database
    *
    * @access public
    * @param int
    * @return
    */

    public function create_product($category = NULL){

        //get products
        if ($category != NULL) {
            $products = $this->get_in_category($category);
        } else {
            $products = $this->getProductData();
        }

        $data = '';

        if (is_array($products) &&!empty($products)) {

            foreach ($products as $product) {
                $data .= '<article class="pro__all__card">
                        <div class="shape shape__smaller"></div>

                        <h1 class="pro__all__title">'. htmlspecialchars($product['mainName']) .'</h1>
                        <h3 class="pro__all__subtitle">'. htmlspecialchars($product['subName']) .'</h3>

                        <img src="'. IMAGE_PATH . $product['img'] .'" alt="image" class="proall__img">
                        <h3 class="pro__all__price">$ '. $product['price'] .'</h3>
                        
                        <button class="product__buttonview button1">
                            <i class="ri-eye-line"></i>
                            <a href="'. SITE_PATH .'product.php?id='.$product['id'].'">View</a>
                        </button>
                        
                        <button class="button1 pro__all__button">
                            <i class="ri-shopping-bag-fill"></i> 
                            <a href="'. SITE_PATH . 'cart.php?id=' . $product['id'] .'">Add</a>
                        </button>
                    </article>';
            }
        }

        return $data;
    }
}
?>

<!-- <article class="pro__all__card">
   <div class="shape shape__smaller"></div>

   <h1 class="pro__all__title">ASUS Gaming</h1>
   <h3 class="pro__all__subtitle">Streame PC</h3>

   <img src="resources/img/products_img/pc/PCGM/ASUS/PCGM0001.png" alt="image" class="proall__img">
   <h3 class="pro__all__price">$21,990</h3>

   <button class="product__buttonview button1">
      <i class="ri-eye-line"></i>
      <a href="../detail_product.php">View</a>
   </button>

   <button class="button1 pro__all__button">
      <i class="ri-shopping-bag-fill"></i> Add
   </button>
   
</article> -->