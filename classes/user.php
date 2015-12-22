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
    $user_model = DB::loadModel("users/user");

    if(AUTH_MODE == AUTH_ADDB) {
      $user_row = $user_model->getByLogin($this->login);
      if(is_null($user_row) && $this->logged === true) {
        $user_model->add(array(
          "login" => $this->login,
          "password" => $this->password,
          "is_admin" => $this->is_admin() ? 1: 0,
          "display_name" => $this->display_name
        ));

      }
    } elseif(AUTH_MODE == AUTH_DB && $this->login != "" && $this->password != "") {
      $user_row = $user_model->getByLogin($this->login);

      if(md5($this->password) == $user_row["pass"]) {
        $this->is_admin = $user_row["su"] == 1;
        $this->display_name = $user_row["display_name"];
        $this->logged = true;
      }
    }
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
          return 1;
        }
      }
    } else {
      return 0;
    }
  }

  public function is_admin() {
    return $this->is_admin === true || $this->is_admin == 1 ? true : null;
  }

  public function is_logged() {
    return $this->logged === true || $this->logged == 1 ? true : null;
  }

  public function has_permission($path) {
    // Реализовать проверку прав доступа к разделам сайта
    return true;
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