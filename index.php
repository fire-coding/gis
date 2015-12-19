<?php
session_start();

// PATH
define ('DIRSEP', DIRECTORY_SEPARATOR);
define ('SITE_PATH', realpath(dirname(__FILE__)) . DIRSEP);
define ('MODELS_PATH', SITE_PATH . "models" . DIRSEP);
define ('MODULES_PATH', SITE_PATH . "modules" . DIRSEP);
define ('TMPL_PATH', SITE_PATH . "views" . DIRSEP);
require SITE_PATH . "includes/startup.php";

$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->debugging = false;
$registry->set ('smarty', $smarty);

$template = new Template($registry);
$registry->set ('template', $template);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  $db_link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  mysqli_set_charset($db_link, "UTF8");
  $registry->set('dl', $db_link);
} catch (Exception $ex) {
  $registry->set('dl', null);
}

$router = new Router($registry);
$registry->set ('router', $router);

$user = new User();
if(isset($_SESSION['user'])) {
  $user->fromArray($_SESSION['user']);
}
$registry->set('user', $user);

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