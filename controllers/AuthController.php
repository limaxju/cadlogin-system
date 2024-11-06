<?php
// Requer o arquivo user que contém o model user com as funções de manipulação de dados de usuários
require_once 'models/user.php';
 
class AuthController
{
    // Função responsável processo de login
    public function login()
    {
        // Verifica se a requisição HTTP é do topo POST, ou seja, se o formulário foi enviado
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // Obter os valores do formulário
            $email = $_POST['email'];
            $senha = $_POST['senha'];
 
            // Chama o métado do model para encontrar o usuário pelo email
            $user = User::findByEmail($email);

            if($user && password_verify($senha, $user['senha'])){ // Verifica se a senha corresponde a um hash
                session_start();
                // Armazena na sessão o ID do usuário que está logado e seu perfil
                $_SESSION['usuario_id'] = $user ['id'];
                $_SESSION['perfil']     = $user ['perfil'];
 
                header('Location: index.php?action=dashboard');
            }else{
                echo "Email ou senha incorretos";
            }
        }else{
            include 'views/login.php';
        }
    }
        
          // Função responsável por fazer o logout (encerrar a sessão do usuário)
        public function logout(){
            // Indicar a sessão para destrui-la
            session_start();
            // Destroi todas as informações da sessão
            session_destroy();
            // Redirenciou o usuário para a página inicical
            header('Location: index.php');
        }
    
}
 
 
 
?>