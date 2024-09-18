<?php

$servername = 'localhost';
$username= 'root';
$password = 'root';
$dataname = 'ttan_store';
$port = 8889;

$Database = mysqli_connect($servername, $username, $password, $dataname, $port);


mysqli_report(MYSQLI_REPORT_ERROR);
ini_set('display_errors', 1);

define('SITE_NAME', 'Titan Store');
define('SITE_PATH', 'http://localhost:8080/');
define('IMAGE_PATH', 'resources/img/');

include('app/models/m_product.php');
include('app/models/m_categories.php');
include('app/models/m_template.php');
include('app/models/m_cart.php');


$Template = new Template();
$Categories = new Categories($Database);
$Products = new Products($Database);
$Cart = new Cart();

session_start();

?>