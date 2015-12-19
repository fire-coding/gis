<?php

Class Model_Regions extends DB {

  private $table = "`regions`";

  public function getAll() {
    return $this->getRows("SELECT * FROM " . $this->table . "ORDER BY TITLE_R");
  }

}