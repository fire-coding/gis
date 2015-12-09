<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 09.12.2015
 * Time: 9:23
 */


Class Controller_Admin Extends Controller_Base {


  function index() {
    global $registry;
    $smarty = $registry->get("smarty");

    $user = $registry->get("user");

    if(is_null($user)) Http::redirect("admin/login");

    $smarty->display(TMPL_PATH . "admin_index.html");
  }

  function login() {
    global $registry;
    $smarty = $registry->get("smarty");
    $login = !is_null(Http::post("login")) ? Http::post("login") : "";
    $password = !is_null(Http::post("password")) ? Http::post("password") : "";
    if($login !="" && $password != "") {
      $user = new User();
      $user->auth($login, $password);
      if($user->logged) {
        Http::redirect("/admin");
        exit;
      }
    }

    $smarty->assign('login', $login);
    $smarty->assign('password', $password);
    $smarty->display(TMPL_PATH . "admin_login.html");
  }

  function logout() {
    echo "logout";
  }


}