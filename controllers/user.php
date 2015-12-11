<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 09.12.2015
 * Time: 12:55
 */

Class Controller_User Extends Controller_Base {

  function index() {
    global $registry;
    $smarty = $registry->get("smarty");

    $smarty->display(TMPL_PATH . "index.html");
  }


  function auth() {
    global $registry;
    $smarty = $registry->get("smarty");

    $user = is_null($registry->get("user")) ? new User(): $registry->get("user");
    if($user->logged === false) {
      $user->login = !is_null(Http::post("login")) ? Http::post("login") : "";
      $user->password = !is_null(Http::post("password")) ? Http::post("password") : "";
      $user->auth();
    }

    $smarty->assign('user', $user);
    $smarty->display(TMPL_PATH . "index.html");
  }

  function logout() {
    global $registry;
    $smarty = $registry->get("smarty");
    $_SESSION = array();
    session_destroy();
    $smarty->display(TMPL_PATH . "index.html");
  }


}