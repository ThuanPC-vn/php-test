<?php

$servername = 'localhost';
$username= 'root';
$password = 'root';
$dataname = 'ttan_shop';
$port = 8889;

$Database = mysqli_connect($servername, $username, $password, $dataname, $port);


mysqli_report(MYSQLI_REPORT_ERROR);
ini_set('display_errors', 1);

define('SITE_NAME', 'Titan Store');
define('SITE_PATH', 'http://localhost:8888/');
define('IMAGE_PATH', 'resources/img/');

include('app/models/m_categories.php');
include('app/models/m_template.php');

$Template = new Template();
$Categories = new Categories($Database);




?>