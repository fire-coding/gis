<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 11.12.2015
 * Time: 11:20
 */

Class DB {

  public function last_id() {
    global $registry;
    $link = $registry->get("dl");
    return mysqli_insert_id($link);
  }

  public function getRow($sql) {
    global $registry;
    $link = $registry->get("dl");
    $res = mysqli_query($link, $sql);
    if($res && $row = $res->fetch_assoc()) return $row;
    else return null;
  }

  public function getRows($sql) {
    global $registry;
    $link = $registry->get("dl");
    $res = mysqli_query($link, $sql);
    $rows = array();
    while($row = $res->fetch_assoc()) {
      $rows[] = $row;
    }
    return $rows;
  }

  public function insert($sql) {
    global $registry;
    $link = $registry->get("dl");
    $res = mysqli_query($link, $sql);
    mysqli_stmt_execute($res);
    return $this->last_id();
  }

  public function execute($sql) {
    global $registry;
    $link = $registry->get("dl");
    $res = mysqli_query($link, $sql);
    mysqli_stmt_execute($res);
  }

  public static function loadModel($model) {
    $class_name = ucfirst(end(explode("/", $model)));
    $model_file = MODELS_PATH.mb_strtolower($model).".php";
    $model_name = "Model_".$class_name;
    if(file_exists($model_file)) {
      require_once $model_file;
      return new $model_name;
    }
    return null;
  }

}