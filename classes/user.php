<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 09.12.2015
 * Time: 12:28
 */

Class User {

  public $login;

  public $password;

  public $display_name;

  public $group_name;

  public function setCurrent() {
    global $registry;
    $registry->set('user', $this);
    $_SESSION['user'] = $this->toArray();
  }

  public function auth() {
    switch(AUTH_MODE) {
      case AUTH_DB:
        $this->authDB();
        break;
      case AUTH_ADDB:
        $this->authADDB();
        break;
    }
  }

  public function authDB() {

  }

  public function authADDB() {

  }

  public function toArray() {
    return array(
      "login" => $this->login,
      "password" => $this->password,
      "display_name" => $this->display_name,
      "group_name" => $this->group_name
    );
  }

  public function fromArray($data) {
    $this->login = isset($data["login"]) ? $data["login"] : "";
    $this->password = isset($data["password"]) ? $data["password"] : "";
    $this->display_name = isset($data["display_name"]) ? $data["display_name"] : "";
    $this->group_name = isset($data["group_name"]) ? $data["group_name"] : "";
  }

}