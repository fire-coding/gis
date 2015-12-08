<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 08.12.2015
 * Time: 10:54
 */

function __autoload($class_name) {
  $filename = strtolower($class_name) . '.php';
  $file = site_path . 'classes' . DIRSEP . $filename;

  if (file_exists($file) == false) {
    return false;
  }

  include ($file);
}

$registry = new Registry;