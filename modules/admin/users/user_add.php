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
    $groups_model = DB::loadModel("users/groups");
    $user_groups = $groups_model->getGroups();
    $smarty->assign('user_groups', $user_groups);

    return $smarty->fetch(TMPL_PATH . "admin/users/user_add.tpl");
  }

}