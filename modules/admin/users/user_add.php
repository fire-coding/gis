<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 13.12.2015
 * Time: 10:42
 */

Class Module_User_add extends Module_Base {

  function render() {
    $smarty = $this->registry->get("smarty");
    $user_model = DB::loadModel("users/groups");
    $user_groups = $user_model->getGroups();
    $smarty->assign('user_groups', $user_groups);

    return $smarty->fetch(TMPL_PATH . "admin/users/user_add.tpl");
  }

}