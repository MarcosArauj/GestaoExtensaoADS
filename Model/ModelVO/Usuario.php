<?php
	class  Usuario{

	private $login;
	private $senha;
	private $tipoUsuario;
	private $status;

	public function __construct($login, $senha, $tipoUsuario, $status){
		$this->login = $login;
		$this->senha = $senha;
		$this->tipoUsuario = $tipoUsuario;
		$this->status = $status;
	}
	
	public function getLogin(){
		return $this->login;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function getTipoUsuario(){
		return $this->tipoUsuario;
	}
	public function getStatus(){
		return $this->status;	
	}
	public function setLogin($login){
		$this->login;
	}
	public function setSenha($senha){
		$this->senha;
	}
	public function setTipoUsuario($tipoUsuario){
		$this->tipoUsuario;
	}
	public function setStatus($status){
		$this->status;
	}

	}
?>