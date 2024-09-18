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

            $stmt = $this->Database->prepare("SELECT id_category, name_category FROM " . $this->db_table . " WHERE id_category IN ($id) LIMIT 1");

            if ($stmt) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $cat_id = null;
                    $cat_name = null;
                    $stmt->bind_result($cat_id, $cat_name);
                    $stmt->fetch();
                    $data = array('id' => $cat_id, 'name' => $cat_name);
                }
                $stmt->close();
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
        $categories = $this->getCategories();

        $data = '';
        // if (strtolower($active) === 'all') {
        //     $data .= 'active-pro-all" ';
        // }
        // $data .= 'data-filter="' . SITE_PATH . '"><span>ALL</span></button></li>';

        

        if (!empty($categories)) {
            foreach ($categories as $category) {

                $classNameIcon = '';
                switch (htmlspecialchars($category['name'])) {
                    case 'PC':
                        $classNameIcon = 'ri-computer-line';
                        break;
                    case 'LAPTOP':
                        $classNameIcon = 'ri-macbook-line';
                        break;
                    case 'GAMING':
                        $classNameIcon = 'ri-gamepad-line';
                        break;
                    case 'OFFICE':
                        $classNameIcon = 'ri-home-office-line';
                        break;
                    default:
                        $classNameIcon = '';
                        break;
                }

                $data .= '<li><button class="pro__all__item ';
                if (strtolower($active) === strtolower($category['name'])) {
                    $data .= 'active-pro-all" data-filter="' . SITE_PATH . 'index.php?id=' . $category['id'] . '"><span><i class="' . $classNameIcon . '"></i> ' . htmlspecialchars($category['name']) . '</span></button></li>';
                }
                else{
                    $data .= '"data-filter="' . SITE_PATH . 'index.php?id=' . $category['id'] . '"><span><i class="' . $classNameIcon . '"></i> ' . htmlspecialchars($category['name']) . '</span></button></li>';
                }
                
            }
        }

        return $data;
    }

}
