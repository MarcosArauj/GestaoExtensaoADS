<?php

class UsuarioDao {
	
	private $conecta;
	
	public function __construct(ConexaoDB $conecta) {
		$this->conecta = $conecta;
	}

	public function inserir(ConexaoDB $conecta, Usuario $usuario) {

        $query = "INSERT INTO usuarios (login, senha, tipo_usuario, status) VALUES ('{$usuario->getLogin()}', '{$usuario->getSenha()}', '{$usuario->getTipoUsuario()}', '{$usuario->getStatus()}')";    
        mysqli_query($conecta->conect(), $query);
    }

    // MÉTODO PARA VERIFICAR EXISTENCIA DE USUÁRIO ANTES DA INSERÇÃO //
    public function verificaUsuario(ConexaoDB $conecta, $login){

		$query = "SELECT * FROM usuarios WHERE login = '$login'";
		$verifica = mysqli_query($conecta->conect(), $query);
		$linhas = mysqli_num_rows($verifica);

		if($linhas == 0){
		    $existe = 'false';
		}else{
		 	$existe = 'true';
		}

		return $existe;
	}

	// MÉTODO DE VALIDAÇÃO DE LOGIN E PERMISSÕES DOS USUÁRIOS //
    public function verificaPermissao(ConexaoDB $conecta, $login, $senha){

		$query = "SELECT tipo_usuario FROM usuarios WHERE login = '$login' AND senha = '$senha'";
		$verifica = mysqli_query($conecta->conect(), $query);
		$linhas = mysqli_num_rows($verifica);

		$resultado = mysqli_fetch_assoc($verifica); // Obtem uma linha do conjunto de resultados como uma matriz associativa //

		// Se a sessão não existir, inicia uma
		//if (!isset($_SESSION)) session_start();

		// Salva os dados encontrados na sessão
		//$_SESSION['UsuarioTipo'] = $resultado['tipo_usuario'];

		if($linhas == 0){
			$permissao = "Empty";
		}else {
			$permissao = $resultado['tipo_usuario'];
		}

		return $permissao;
    }
	
}

?>