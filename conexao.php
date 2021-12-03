<?php

class conexao{
  private $servidor;
  private $banco;
  private $usuario;
  private $senha;
  private  static  $pdo ;
  
  public function __construct () {
    $this ->servidor = 'localhost';
    $this ->banco = 'av2';
    $this ->usuario = 'root';
    $this ->senha = '';
  }
  public function conectar() {
    try {
      if ( is_null ( self :: $pdo )) {
        self :: $pdo = new  PDO( "mysql: host =" . $this->servidor . "; dbname =" . $this->banco , $this->usuario , $this->senha );
      }
      return self :: $pdo;
    } catch ( PDOException $ex ) {
      echo $ex ->getMessage();
      }
    }
  }
?>
