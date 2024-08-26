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
        $categories = $this->getCategories();

        $data = '<li><button class="pro__all__item ';
        if (strtolower($active) === 'all') {
            $data .= 'active-pro-all" ';
        }
        $data .= 'data-filter="' . SITE_PATH . '"><span>ALL</span></button></li>';

        if (!empty($categories)) {
            foreach ($categories as $category) {
                $data .= '<li><button class="pro__all__item ';
                if (strtolower($active) === strtolower($category['name'])) {
                    $data .= 'active-pro-all" ';
                }
                $data .= 'data-filter="' . SITE_PATH . 'index.php?id=' . $category['id'] . '"><span>' . htmlspecialchars($category['name']) . '</span></button></li>';
            }
        }

        return $data;
    }
}
