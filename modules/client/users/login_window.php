<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 13.12.2015
 * Time: 18:07
 */

Class Module_Login_window extends Module_Base {

  function render() {
    $smarty = $this->registry->get("smarty");
    return $smarty->fetch(TMPL_PATH . "client/users/login_window.tpl");
  }

}