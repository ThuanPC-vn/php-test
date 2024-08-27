<?php


class Categories
{
    private $Database;
    private $db_table = 'categories';

    function __construct($Database)
    {
        $this->Database = $Database;
    }


    public function getCategories($id = null)
    {
        $data = array();
        if ($id != null) {
            $id = mysqli_real_escape_string($this->Database, $id);

            $result = $this->Database->query("SELECT id_category, name_category FROM " . $this->db_table . " WHERE id_category IN ($id) LIMIT 1");

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $data = array('id' => $row['id_category'], 'name_category' => $row['name_category']);
                }
                $result->close();
            }
        } else {
            $result = $this->Database->query("SELECT id_category, name_category FROM " . $this->db_table);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = array('id' => $row['id_category'], 'name' => $row['name_category']);
                    }
                }
            }
        }

        return $data;
    }

    public function getCategoryNav($active)
    {   
        print_r($active);
        $categories = $this->getCategories();

        $data = '<li><button class="pro__all__item ';
        if (strtolower($active) === 'all') {
            $data .= 'active-pro-all" ';
        }
        $data .= 'data-filter="' . SITE_PATH . '><span>ALL</span>';

        if (!empty($categories)) {
            foreach ($categories as $category) {
                $data = '<li><button class="pro__all__item ';
                if (strtolower($active) === strtolower($active['name_category'])) {
                    $data .= 'active-pro-all" ';
                }
                $data .= 'data-filter="' . SITE_PATH . '><span>' . htmlspecialchars($category['name']) . '</span>';
            }
        }

        return $data;
    }

    // <li>
    //                        <button class="pro__all__item active-pro-all" data-filter="all">
    //                           <span>ALL</span>
    //                        </button>
    //                     </li>

    //                     <li>
    //                        <button class="pro__all__item">
    //                           <span><i class="ri-computer-line"></i> PC</span>
    //                        </button>
    //                     </li>


    //                     <li>
    //                        <button class="pro__all__item">
    //                           <span><i class="ri-macbook-line"></i> LAPTOP</span>
    //                        </button>
    //                     </li>

    //                     <li>
    //                        <button class="pro__all__item">
    //                           <span><i class="ri-gamepad-line"></i> GAMING</span>
    //                        </button>
    //                     </li>


    //                     <li>
    //                        <button class="pro__all__item">
    //                           <span><i class="ri-home-office-line"></i> OFFCIE</span>
    //                        </button>
    //                     </li>
}
