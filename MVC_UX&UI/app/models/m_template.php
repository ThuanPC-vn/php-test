<?php

use function PHPSTORM_META\type;

class Template
{
    private $data;
    private $alert_type = array('success', 'alert', 'error');
    function __contruct() {}


    /**
     * Hiển thị 1 template cụ thể
     * @param string
     * @return url
     */
    public function load($url, $title ='')
    {
        if($title != '')
        {
            $this->setData('page_title', $title);
        }
        include($url);
    }

    /**
     * Phương thức này lưu trữ dữ liệu để sử dụng sau này trong view
     * @param string, string, boolean
     * @access public
     * @return null
     */
    public function redirect($url)  {
        header('Location: ', $url);
        exit();
    }

    /**
     * Phương thức này lưu trữ dữ liệu để sử dụng sau này trong view
     * @param string, string, boolean
     * @access public
     * @return null
     */
    public function setData($name, $value, $clean = true)  {
        if($clean == true)
        {
            $this->data[$name] = htmlentities($value, ENT_QUOTES);
        }
        else
            $this->$this[$name] = $value;
    }

    /**
     * Phương thức này truy xuất dữ liệu đã lưu để sử dụng trong view
     * @param string, boolean
     * @access public
     * @return null | string
     */
    public function getData($name, $echo =true)  {
        if(isset($this->data[$name]))
        {
            if($echo)
            {
                echo $this->data[$name];
            }
            else
            {
                return $this->data[$name];
            }
        }
        return '';
    }

    /**
     * Lưu một thông báo vào session
     * @param string, string(optional)
     * @access public
     * @return null
     */
    public function setAlert($value, $type = 'success')  {
        $_SESSION[$type][] = $value;
    }


    /**
     * Lấy một thông báo từ session
     * @param 
     * @access public
     * @return null
     */
    public function getAlert()  {
        $data = '';

        foreach($this->alert_type as $alert)
        {
            if(isset($_SESSION[$alert]))
            {
                foreach($_SESSION[$alert] as $value)
                {
                    $data .= '<li class"'.$alert.'">'.$value.'</li>';
                }
                unset($_SESSION[$alert]);
            }
        }
        echo $data;
    }
}
