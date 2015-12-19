<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 19.12.2015
 * Time: 22:32
 */

Class Controller_Maps_Search extends Controller_Base {

  function index() {
    $user = $this->registry->get("user");
    if(!$user->has_permission("client/maps/search")) { Http::redirect('/'); exit; }

    $this->registerModule("client/common/client_menu", "left_side");
    $this->registerModule("client/maps/search/maps_search", "center_side");

    $smarty = $this->registry->get("smarty");
    $smarty->assign("page", "maps_search");

    $this->display();
  }

}