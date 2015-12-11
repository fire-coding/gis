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
  $user = new User();
  $user->fromArray($_SESSION['user']);
  $registry->set('user', $user);
}

$router->setPath (SITE_PATH . 'controllers');
$router->getController($file, $controller, $action, $args);
$registry->set("controller", array(
  "file" => $file,
  "controller" => $controller,
  "action" => $action,
  "args" => $args
));

$smarty->assign("controller", $registry->get("controller"));

$router->delegate();