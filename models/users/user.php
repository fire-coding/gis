<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 11.12.2015
 * Time: 11:22
 */

Class Model_User extends DB {

  private $table = "`tz_members`";

  public function getByLogin($login) {
    return $this->getRow("SELECT * FROM ".$this->table . " WHERE `name` = '" . $login . "'");
  }


}