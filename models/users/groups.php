<?php
/**
 * Created by PhpStorm.
 * User: Zerg
 * Date: 13.12.2015
 * Time: 11:14
 */

Class Model_Groups extends DB {

  private $table = "`tz_groups`";

  public function getGroups() {
    return $this->getRows("SELECT * FROM " . $this->table . " ORDER BY `name`");
  }

  public function setGroups($user_id, $groups_ids) {

  }

}