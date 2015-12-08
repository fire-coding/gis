<?php
error_reporting (E_ALL);

if (version_compare(phpversion(), '5.1.0', '<') == true) { die ('PHP5.1 Only'); }
define ('DIRSEP', DIRECTORY_SEPARATOR);
$site_path = realpath(dirname(__FILE__)) . DIRSEP;
define ('SITE_PATH', $site_path);
include(SITE_PATH."includes/startup.php");

$db = new PDO('mysql:host=localhost;dbname=gis', 'gisdb', 'gisadminpass');
$registry->set ('db', $db);

$template = new Template($registry);
$registry->set ('template', $template);

$router = new Router($registry);
$registry->set ('router', $router);

$router->setPath (SITE_PATH . 'controllers');
$router->delegate();