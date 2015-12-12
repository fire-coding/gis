<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 12.12.2015
 * Time: 20:09
 */

Class Module_System extends Module_Base {

  function render() {
    $smarty = $this->registry->get("smarty");

    $config = new Config();
    $smarty->assign("database_host", $config->get("/settings/database/host"));
    $smarty->assign("database_name", $config->get("/settings/database/name"));
    $smarty->assign("database_user", $config->get("/settings/database/user"));
    $smarty->assign("database_pass", $config->get("/settings/database/pass"));

    $smarty->assign("database_external_host", $config->get("/settings/database_external/host"));
    $smarty->assign("database_external_name", $config->get("/settings/database_external/name"));
    $smarty->assign("database_external_user", $config->get("/settings/database_external/user"));
    $smarty->assign("database_external_pass", $config->get("/settings/database_external/pass"));

    $smarty->assign("auth_mode", $config->get("/settings/auth/mode"));

    $smarty->assign("ad_server_address", $config->get("/settings/ad_server/address"));
    $smarty->assign("ad_server_account_sufix", $config->get("/settings/ad_server/account_sufix"));
    $smarty->assign("ad_server_base_dn", $config->get("/settings/ad_server/base_dn"));

    return $smarty->fetch(TMPL_PATH . "admin/system/system.tpl");
  }

}