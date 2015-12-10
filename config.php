<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 09.12.2015
 * Time: 12:37
 */
if (version_compare(phpversion(), '5.1.0', '<') == true) { die ('PHP5.1 Only'); }

// PATH
define ('DIRSEP', DIRECTORY_SEPARATOR);
define ('SITE_PATH', realpath(dirname(__FILE__)) . DIRSEP);
define ('TMPL_PATH', SITE_PATH . "views" . DIRSEP);

// DB
define ('DB_HOST', 'localhost');
define ('DB_NAME', 'gis');
define ('DB_USER', 'gisdb');
define ('DB_PASS', 'gisadminpass');

// ACTIVE DIRECTORY NTLM AUTHENICATION
define ('AD_DOMAIN_CONTROLLER', '31.131.17.195');
define ('AD_ACCOUNT_SUFIX', "@test.local");
define ('AD_BASE_DN', "DC=test,DC=local");
