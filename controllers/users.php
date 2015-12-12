<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 12.12.2015
 * Time: 23:41
 */
Class Controller_Users extends Controller_Base
{

  public function index() {
    $smarty = $this->registry->get("smarty");
    $user = $this->registry->get("user");

    if($user->is_admin === true) {
      $this->registerModule("admin/common/menu", "left_side");
      $this->registerModule("admin/users/users", "center_side");
    }

    $smarty->assign('user', $user);
    $smarty->assign('page', 'users');

    $this->display();
  }

}