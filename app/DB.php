<?php
  class DB {
    public $con;
    public function __construct() {
      try {
        $this->con = new PDO("mysql: host='localhost'; dbname='gerenciador'", "root", "root");
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
    public static function executar($sql) {
      $qr = $this->con->prepare($sql);
      $qr->execute();
      return $qr;
    }
  }
