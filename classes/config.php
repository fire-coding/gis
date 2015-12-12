<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 12.12.2015
 * Time: 20:26
 */

Class Config {

  private $config_xml;

  function __construct() {
    if(file_exists(SITE_PATH . "config.xml"))
      $this->config_xml = simplexml_load_file(SITE_PATH . "config.xml");
  }

  function get($path) {
    $val = end(explode("/", $path));
    $path = str_replace("/".$val, "", $path);
    $res = $this->config_xml->xpath($path);
    return $res[0]->$val;
  }

  function set($path, $value) {
    $val = end(explode("/", $path));
    $path = str_replace("/".$val, "", $path);
    $res = $this->config_xml->xpath($path);
    $res[0]->$val = $value;
    $this->config_xml->saveXML(SITE_PATH . "config.xml");
  }
}