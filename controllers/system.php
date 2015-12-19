<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 12.12.2015
 * Time: 19:44
 */
Class Controller_System Extends Controller_Base
{

  function index() {
    $smarty = $this->registry->get("smarty");
    $user = $this->registry->get("user");

    if($user->is_admin()) {
      $this->registerModule("admin/common/admin_menu", "left_side");
      $this->registerModule("admin/system/system", "center_side");
    }

    $smarty->assign('page', 'system');

    $this->display();
  }

  function save() {
    $database = Http::post("database");
    $database_external = Http::post("database_external");
    $auth = Http::post("auth");
    $ad_server = Http::post("ad_server");

    if(!is_null($database) &&
      !is_null($database_external) &&
      !is_null($auth) &&
      !is_null($ad_server)) {

      $config = new Config();
      $config->set("/settings/database/host", $database["host"]);
      $config->set("/settings/database/name", $database["name"]);
      $config->set("/settings/database/user", $database["user"]);
      $config->set("/settings/database/pass", $database["pass"]);

      $config->set("/settings/database_external/host", $database_external["host"]);
      $config->set("/settings/database_external/name", $database_external["name"]);
      $config->set("/settings/database_external/user", $database_external["user"]);
      $config->set("/settings/database_external/pass", $database_external["pass"]);

      $config->set("/settings/auth/mode", $auth["mode"]);

      $config->set("/settings/ad_server/address", $ad_server["address"]);
      $config->set("/settings/ad_server/account_sufix", $ad_server["account_sufix"]);
      $config->set("/settings/ad_server/base_dn", $ad_server["base_dn"]);

    }

    Http::redirect("/system");
  }



}