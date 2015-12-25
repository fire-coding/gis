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
    $this->registerModule("map/map", "center_side");
    $this->registerModule("client/maps/search/maps_search_filter", "right_side");

    $regions_model = DB::loadModel("maps/regions");
    $regions = $regions_model->getAll();

    $smarty = $this->registry->get("smarty");
    $smarty->assign("regions", $regions);
    $smarty->assign("page", "maps_search");
    $smarty->assign("title", "Адміністративний пошук");

    $this->display();
  }

}