<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 08.12.2015
 * Time: 10:54
 */

if (version_compare(phpversion(), '5.1.0', '<') == true) { die ('PHP5.1 Only'); }

require "classes/config.php";
require SITE_PATH . "classes/ldap/adLDAP.php";
require SITE_PATH . 'classes/smarty/Smarty.class.php';

$config = new Config();

// DB
define ('DB_HOST', $config->get("/settings/database/host"));
define ('DB_NAME', $config->get("/settings/database/name"));
define ('DB_USER', $config->get("/settings/database/user"));
define ('DB_PASS', $config->get("/settings/database/pass"));

// DB EXTERNAL
define ('DB_HOST', $config->get("/settings/database_external/host"));
define ('DB_NAME', $config->get("/settings/database_external/name"));
define ('DB_USER', $config->get("/settings/database_external/user"));
define ('DB_PASS', $config->get("/settings/database_external/pass"));

// AUTHENTICATION MODES
define('AUTH_DB', 1);   // Аутентификация только MySQL
define('AUTH_ADDB', 2); // Аутентификация Active Directory + MySQL

// CURRENT AUTH MODE
define('AUTH_MODE', $config->get("/settings/auth/mode"));

// ACTIVE DIRECTORY NTLM AUTHENTICATION
define ('AD_DOMAIN_CONTROLLER', $config->get("/settings/ad_server/address"));
define ('AD_ACCOUNT_SUFIX', $config->get("/settings/ad_server/account_sufix"));
define ('AD_BASE_DN', $config->get("/settings/ad_server/base_dn"));

$registry = new Registry;

function __autoload($class_name) {
  $filename = strtolower($class_name) . '.php';
  $file = SITE_PATH . 'classes' . DIRSEP . $filename;

  if (file_exists($file) === false) {
    return false;
  }

  require_once($file);
}

