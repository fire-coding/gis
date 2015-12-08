<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 08.12.2015
 * Time: 11:13
 */

Abstract Class Controller_Base {

  protected $registry;

  function __construct($registry) {
    $this->registry = $registry;
  }

  abstract function index();
}
