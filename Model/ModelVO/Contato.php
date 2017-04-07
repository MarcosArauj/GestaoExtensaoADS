<?php
	abstract class  Contato{

	private $email;
	private $telefone;
	private $celular;

	public function __construct($email, $telefone, $celular){
		$this->email = $email;
		$this->telefone = $telefone;
		$this->celular = $celular;
	}
	
	public function getEmail(){
		return $this->email;
	}
	public function getTelefone(){
		return $this->telefone;
	}
	public function getCelular(){
		return $this->celular;
	}
	public function setEmail($email){
		$this->email;
	}
	public function setTelefone($telefone){
		$this->telefone;
	}
	public function setCelular($celular){
		$this->celular;
	}

	}
?>