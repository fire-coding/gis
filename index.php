<?php
session_start();

require "config.php";
require SITE_PATH . "includes/startup.php";
require SITE_PATH . "ldap/adLDAP.php";
require SITE_PATH . 'smarty/Smarty.class.php';

$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->debugging = false;
$registry->set ('smarty', $smarty);

$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
$registry->set ('db', $db);

$template = new Template($registry);
$registry->set ('template', $template);

$router = new Router($registry);
$registry->set ('router', $router);

if(isset($_SESSION['user'])) {
  $registry->set('user', $_SESSION['user']);
  print_r($_SESSION['user']);
}

$router->setPath (SITE_PATH . 'controllers');
$router->delegate();