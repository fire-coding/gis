<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 12.12.2015
 * Time: 18:49
 */

Class Module_Panel extends Module_Base {

  function render() {
    $smarty = $this->registry->get("smarty");
    return $smarty->fetch(TMPL_PATH . "admin/common/panel.tpl");
  }

}