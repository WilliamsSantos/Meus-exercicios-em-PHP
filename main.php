<?php
  // Teste POO em PHP

class Usuario extends Conta{}

class Conta{

  protected $agencia;
  protected $banco;
  protected $contaBanco;

  protected $saldoConta;

  public function getExtrato(){
    return "\nAgencia {$this->agencia}\nBanco: {$this->banco}\nConta: {$this->contaBanco}\nSeu saldo é de R$ {$this->saldoConta}\n\n";    
  } 
  
  function __construct($agencia, $banco, $contaBanco , $saldoConta){
    $this->agencia       = $agencia;
    $this->banco         = $banco;
    $this->contaBanco    = $contaBanco;
    $this->saldoConta    = $saldoConta;
  }

  public function depositar($deposito){
    $this->saldoConta += $deposito;
    echo "\nvoce depositou {$deposito}\nSaldo atual = {$this->saldoConta} ";

  }
  public function saque($sacado){
    $this->saldoConta -= $sacado;
    echo "\nvoce sacou {$sacado}\nSaldo atual = {$this->saldoConta}\n ";
  }

} 

class Poupanca extends Conta{
  public function poupancaSaque($saque){
    if($this->saldoConta >= $saque):
       $this->saldoConta -= $saque;
      echo "\nvoce sacou {$saque}\nSaldo atual = {$this->saldoConta} \n ";
    else:
      echo "transação não permitida voce tentou sacar {$saque} porem seu saldo atual é de {$this->saldoConta}. \n";
    endif;
  }
} 

class Corrente extends Conta{
  protected $limite;

  public function __construct($agencia, $banco, $contaBanco, $saldoConta, $limite){
    parent:: __construct($agencia, $banco, $contaBanco, $saldoConta);
    $this->limite = $limite;
  }

  public function saqueCorrente($saque){
    if(($this->saldoConta + $this->limite) >= $saque):
      $this->saldoConta == $saque;
      echo "\nsaque corrente de {$saque}.\n seu saldo atual é de {$this->saldoConta}";
    else:
      echo "\nsaque de {$saque} não aprovado.\n seu saldo atual é de {$this->saldoConta} e seu limite é {$this->limite}";
    endif;  
  } 

} 

$usuario = new Corrente(2266, 25, 003333, 6000, 300);
$usuario->saque(200); 
$usuario->depositar(190);
$usuario->saqueCorrente(600);
echo $usuario->getExtrato();

?>
