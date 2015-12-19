<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 13.12.2015
 * Time: 17:18
 */
Class Controller_Import Extends Controller_Base
{

  function index()
  {
    $smarty = $this->registry->get("smarty");
    $user = $this->registry->get("user");

    if ($user->is_admin()) {
      $this->registerModule("admin/common/admin_menu", "left_side");
      $this->registerModule("admin/system/import", "center_side");
    }

    $smarty->assign('page', 'import');

    $this->display();
  }
}