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

  public $logged = false;

  public $is_admin = false;

  public function auth() {
    switch(AUTH_MODE) {
      case AUTH_DB:
        $this->authDB();
        break;
      case AUTH_ADDB:
        $this->authADDB();
        break;
    }

    if($this->logged === true) $this->setCurrent();
  }

  public function authDB() {
    //TODO: DB Auth
  }

  public function authADDB() {
    $this->authAD();
    if($this->logged === false) return;
    $this->authDB();
  }

  public function authAD() {
    $adldap = new adLDAP();
    if ($adldap->authenticate($this->login, $this->password)){
      $user_info = $adldap->user()->info($this->login);
      $this->display_name = $user_info[0]['displayname'][0];
      $this->logged = true;
      $this->is_admin = $this->isAdmin($user_info);
    } else {
      $this->logged = false;
    }
  }

  private function isAdmin($config) {
    if(isset($config[0]["memberof"])) {
      foreach($config[0]["memberof"] as $member) {
        if(mb_strpos($member, "Администраторы домена") != false) {
          return true;
        }
      }
    } else {
      return false;
    }
  }

  public function toArray() {
    return array(
      "is_admin" => $this->is_admin,
      "logged" => $this->logged,
      "login" => $this->login,
      "password" => $this->password,
      "display_name" => $this->display_name,
      "group_name" => $this->group_name
    );
  }

  public function fromArray($data) {
    $this->logged = isset($data["logged"]) ? $data["logged"] : false;
    $this->is_admin = isset($data["is_admin"]) ? $data["is_admin"] : false;
    $this->login = isset($data["login"]) ? $data["login"] : "";
    $this->password = isset($data["password"]) ? $data["password"] : "";
    $this->display_name = isset($data["display_name"]) ? $data["display_name"] : "";
    $this->group_name = isset($data["group_name"]) ? $data["group_name"] : "";
  }

  public function setCurrent() {
    global $registry;
    $registry->set('user', $this);
    $_SESSION['user'] = $this->toArray();
  }


}