<?php
require_once ('../Model/ModelVO/Usuario.php');
require_once ('../Model/ModelDAO/UsuarioDao.php');
require_once ('../Model/ModelDAO/ConexaoDB.php');
require_once ('../Model/ModelDAO/Validar.php');

	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) { // aqui é onde vai decorrer a chamada se houver um       *request* POST
        $method = $_POST['method'];
        $controler = new UsuarioController();
        if(method_exists($controler, $method)) {
            $controler->$method($_POST);
        } else {
            echo 'Metodo incorreto';
        }
    }


class UsuarioController {

    public function insere() {
        
        if (!empty($_POST) AND (!empty($_POST['email']) AND !empty($_POST['login']) AND !empty($_POST['senha']) AND !empty($_POST['confirmaSenha']) AND ($_POST['tipoUsuario'] != "Selecione"))) {
            
            $email = $_POST['email'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $confirmaSenha = $_POST['confirmaSenha'];
            $tipoUsuario = $_POST['tipoUsuario'];

            $conexao = new ConexaoDB();
            $usuario = new Usuario($login, $senha, $tipoUsuario, 'ativo');        

            
            //if ($email != "" && $login != "" && $senha != "" && $confirmaSenha != "" && $tipoUsuario != "") {
            if ($senha == $confirmaSenha) {
                $usuarioDao = new UsuarioDao($conexao);

                //$teste = $usuarioDao->verificaUsuario($conexao, $login);

                if ($usuarioDao->verificaUsuario($conexao, $login) == 'false') {
                    $usuarioDao->inserir($conexao, $usuario);

                    echo "<script type='text/javascript'>  

                    alert('Usuário cadastrado com sucesso!');
                    
                    history.back()

                   </script>";
                }
                else {
                    echo "<script type='text/javascript'>  

                    alert('Usuário já existe! Tente Novamente.');
                    
                    history.back()

                   </script>";
                }

            }else {
                echo "<script type='text/javascript'>  

                alert('Senhas não conferem!');
                
                history.back()

               </script>";
            }
        }
        else {
            echo "<script type='text/javascript'>  

            alert('Existem campos vazios!');
            
            history.back()

           </script>";
            //echo "<script>alert('Senhas não conferem!');</script>";
            //$mensagem = "<span class='erro'><b>Erro</b>: As senhas não conferem!</span>";
        }
    }

    public function login(){

        if (!empty($_POST) AND !empty($_POST['login']) AND !empty($_POST['senha'])) {
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $conexao = new ConexaoDB();
            $usuarioDao = new UsuarioDao($conexao);
            $permissao = $usuarioDao->verificaPermissao($conexao, $login, $senha);

            switch ($permissao) {

                case 'Administrador':
                    header("Location:../View/area_de_trabalho.html");
                    break;

                case 'Aluno':
                    echo "<script type='text/javascript'>  

                    alert('Aluno!!');
                    
                    history.back()

                   </script>";
                    break;

                case 'Professor':
                    echo "<script type='text/javascript'>  

                    alert('Professor!!');
                    
                    history.back()

                   </script>";
                    break;

                case 'Parceiro Externo':
                    echo "<script type='text/javascript'>  

                    alert('Parceiro Externo!!');
                    
                    history.back()

                   </script>";
                    break;
                case 'Empty':
                    echo "<script type='text/javascript'>  

                    alert('Seu cadastro não foi encontrado em nossa base de dados! | $login |');
                    
                    history.back()

                   </script>";
                    break;
                
                default:
                    echo "Default: Outro";
                }
        }else{
            echo "<script type='text/javascript'>  

            alert('Existem campos vazios!');
            
            history.back()

           </script>";
        }
    }
}	

?>