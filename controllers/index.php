<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 08.12.2015
 * Time: 11:27
 */

Class Controller_Index Extends Controller_Base {


  function index() {
    global $registry;
    $smarty = $registry->get("smarty");

    //$smarty->assign('test', 'Zerg Solution');
    $smarty->display(TMPL_PATH . "index.html");

  }


}
