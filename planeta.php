<?php
require_once 'conexao.php';

class planeta {
  private $con;
  private $nome;
  private $tamanho;
  private $distancia;

  public function __construct(){
    $this ->con = new conexao();
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }
  public function getNome() {
    return $this-> nome;
  }
  public function setTamanho($tamanho) {
    $this->tamanho = $tamanho;
  }
  public function getTamanho() {
    return $this-> tamanho;
  }
  public function setDistancia($distancia) {
    $this->distancia = $distancia;
  }
  public function getDistancia() {
    return $this-> distancia;
  }
  
  public function querySeleciona ($dado) {
    try {
        $cst = $this->con->conectar()->prepare ( "SELECT nome, tamanho, distancia FROM` planeta` where `nome` =: nome;" );
        $cst -> execute();
        return  $cst -> fetch ();
    } catch ( PDOException  $ex ) {
        return 'erro' . $ex -> getMessage ();
    }
  }

public  function  querySelect () {
    try {
        $cst = $this->con->conectar()->prepare ( "SELECT`nome`,` tamanho`, `distancia` FROM` planeta`; " );
        $cst -> execute ();
        return  $cst -> fetchAll ();
    } catch ( PDOException  $ex ) {
        return  'erro' . $ex -> getMessage ();
    }
}

public  function  queryInsert ($dados) {
    try{
        $this -> nome = $dados [ 'nome' ];
        $this -> tamanho = $dados [ 'tamanho' ];
        $this -> distancia = $dados [ 'distancia'];
        $cst = $this->con->conectar()->prepare ( "INSERT INTO` planeta` (`nome`,` tamanho`, `distancia`) VALUES (: nome,: tamanho,: distancia ); ");
        $cst -> bindParam ( ": nome" , $this -> nome , PDO :: PARAM_STR );
        $cst -> bindParam ( ": tamanho" , $this -> tamanho , PDO :: PARAM_INT );
        $cst -> bindParam ( ": distancia" , $this -> senha , PDO :: PARAM_STR );
        if ( $cst -> execute ()) {
            return 'ok' ;
        } else {
            return  'erro' ;
        }
    } catch ( PDOException  $ex ) {
        return  'erro' . $ex -> getMessage ();
    }
}

public function queryUpdate ($dados) {
    try {
        $this -> nome = $dados [ 'nome' ];
        $this -> tamanho = $dados [ 'tamanho' ];
        $this -> distancia = $dados [ 'distancia' ];
        $cst = $this->con->conectar()->prepare ( "UPDATE` planeta` SET `nome` =: nome,` tamanho` =: tamanho` distancia` =: distancia WHERE `nome` =: nome;" );
        $cst -> bindParam ( ": nome" , $this -> nome , PDO :: PARAM_STR );
        $cst -> bindParam ( ": tamanho" , $this -> tamanho , PDO :: PARAM_INT );
        $cst -> bindParam ( ": distancia" , $this -> distancia , PDO :: PARAM_STR );
        if ( $cst -> execute ()) {
            return  'ok' ;
        } else {
            return  'erro' ;
        }
    } catch ( PDOException  $ex ) {
        return 'erro' . $ex -> getMessage ();
    }
}

public  function  queryDelete ($dado) {
    try {
        $cst = $this->con->conectar()->prepare ( "DELETE FROM` planeta` WHERE `nome`=: nome;" );
        $cst -> bindParam ( ": nome" , $this->nome , PDO :: PARAM_INT );
        if ( $cst ->execute ()) {
            return  'ok' ;
        } else {
            return  'erro' ;
        }
    } catch ( PDOException  $ex ) {
        return  'erro' . $ex ->getMessage ();
    }
}
}
