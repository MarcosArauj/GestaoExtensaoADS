<?php
	
	abstract class Pessoa{

		private $nome;
		private $data_nascimento;		
		private $cpf;
		private $rg;
		private $orgao_expeditor;
		private $data_expedicao;

		public function __construct($nome, $data_nascimento, $cpf, $rg, $orgao_expeditor, $data_expedicao){
			$this->nome = $nome;
			$this->data_nascimento = $data_nascimento;
			$this->cpf = $cpf;
			$this->rg = $rg;
			$this->orgao_expeditor = $orgao_expeditor;
			$this->data_expedicao = $data_expedicao;
		}
	
		public function getNome(){
			return $this->nome;
		}
		public function getData_nascimento(){
			return $this->data_nascimento;
		}
		public function getCpf(){
			return $this->cpf;
		}
		public function getRg(){
			return $this->rg;
		}
		public function getOrgao_expeditor(){
			return $this->orgao_expeditor;
		}
		public function getData_expedicao(){
			return $this->data_expedicao;
		}

		public function setNome($nome){
			$this->nome;
		}
		public function setData_nascimento($data_nascimento){
			$this->data_nascimento;
		}
		public function setCpf($cpf){
			$this->cpf;
		}
		public function setRg($rg){
			$this->rg;
		}
		public function setOrgao_expeditor($orgao_expeditor){
			$this->orgao_expeditor;
		}
		public function setData_expedicao($data_expedicao){
			$this->data_expedicao;
		}
	}
?>		