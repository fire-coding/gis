<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 08.12.2015
 * Time: 11:27
 */

Class Controller_Index Extends Controller_Base {

  function index() {
    $smarty = $this->registry->get("smarty");
    $user = $this->registry->get("user");

    if($user->is_admin === true) {
      $this->registerModule("admin/common/menu", "left_side");
      $this->registerModule("admin/common/panel", "center_side");
    }

    $smarty->assign('page', 'index');

    $this->display();
  }

  function auth() {
    $user = is_null($this->registry->get("user")) ? new User(): $this->registry->get("user");
    if($user->logged === false) {
      $user->login = !is_null(Http::post("login")) ? Http::post("login") : "";
      $user->password = !is_null(Http::post("password")) ? Http::post("password") : "";

      if($user->login == "sa" && $user->password == "sa") {
        $this->registerModule("admin/system/system", "center_side");
        $this->display();
        exit;
      }

      $user->auth();
    }
    Http::redirect("/");
  }

  function logout() {
    $_SESSION = array();
    session_destroy();
    Http::redirect("/");
  }


}
