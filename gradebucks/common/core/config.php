<?php
error_reporting(0);
class db{
    
  private $host     = 'localhost';
  private $db       = 'gradebucks';
  private $user     = 'root';
  private $pass     = '';
  private $charset  = 'utf8';
  public  $pdo      ='';
  private $dsn;
  private $opt;
  private $dbh;
  
    function __construct() {
        
   $this->dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
   $this->opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $this->pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
    
    // $this->dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}



    
}
