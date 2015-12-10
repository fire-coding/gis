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
    $user = $registry->get("user");

    $login = !is_null(Http::post("login")) ? Http::post("login") : "";
    $password = !is_null(Http::post("password")) ? Http::post("password") : "";
    if($login !="" && $password != "" && is_null($user)) {
      try {
        $adldap = new adLDAP();
      }
      catch (adLDAPException $e) {
        echo $e;
        exit();
      }
      if ($adldap->authenticate($login, $password)){
        $user_info = $adldap->user()->info($login);
        $user = new User();
        $user->login = $login;
        $user->password = $password;
        $user->displayname = $user_info[0]['displayname'][0];
        $user->setCurrent();
      } else {
        $smarty->assign('login_err', 'Невірний логін або пароль');
      }
    }

    $smarty->assign('user', $user);
    $smarty->assign('login', $login);
    $smarty->assign('password', $password);
    $smarty->display(TMPL_PATH . "index.html");
  }

  function logout() {
    global $registry;
    $smarty = $registry->get("smarty");

    $_SESSION = array();
    session_destroy();
    $smarty->assign('user', null);
    $smarty->assign('login', "");
    $smarty->assign('password', "");
    $smarty->display(TMPL_PATH . "index.html");
  }


}