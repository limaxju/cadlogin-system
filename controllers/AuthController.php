<?php
//Requer arquivo o arquivo user que contem o model user com as funções de manipulação de dados de usuario
require_once 'models/user.php';

class AuthController
{
    //Função para realizar o login
    public function login()
    {
        //Verifica se a requisição HTTP é do tipo POST, ou seja, se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //obtem os dados do formulário
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            //chama a função login do model user para verificar se os dados estão corretos
            $user = User::findByEmail();

            if($user && password_verify($senha,$user['senha'])){//verifica se a senha corresponde a um hash

                session_start();
                //armazena na sessão o id do usuario que esta logado e seu perfil
                $_SESSION['id'] = $user['id'];
                $_SESSION['perfil'] = $user['perfil'];

                header('Location: index.php?action=dashboard');
     } else{
        echo 'Email ou senha incorretos';
     }
    }else{
        include 'views/login.php';
    }
  }
}
?>