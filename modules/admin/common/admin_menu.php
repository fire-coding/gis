<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 12.12.2015
 * Time: 15:45
 */
Class Module_Admin_Menu extends Module_Base {

  function render() {
    $smarty = $this->registry->get("smarty");
    return $smarty->fetch(TMPL_PATH . "admin/common/admin_menu.tpl");
  }

}