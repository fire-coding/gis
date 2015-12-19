<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 19.12.2015
 * Time: 23:02
 */

Class Module_Maps_Search extends Module_Base {

  function render() {
    $smarty = $this->registry->get("smarty");
    return $smarty->fetch(TMPL_PATH . "client/maps/search/maps_search.tpl");
  }


}