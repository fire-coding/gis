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

  public $displayname;

  public function setCurrent() {
    global $registry;
    $registry->set('user', $this);
    $_SESSION['user'] = $this;
  }

}