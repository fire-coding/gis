<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 19.12.2015
 * Time: 22:09
 */

Class Module_Client_Menu extends Module_Base {

  function render() {
    $smarty = $this->registry->get("smarty");
    return $smarty->fetch(TMPL_PATH . "client/common/client_menu.tpl");
  }

}