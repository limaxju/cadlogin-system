<?php

//inclui arquivos de controlador necessarios para lidar com diferentes ações 
require 'controllers/AuthController.php'; //inclui o controlador de autenticação
require 'controllers/UserController.php'; //inclui o controlador de usuarios
require 'controllers/DashboardController.php';//inclui o controlador de dashboard

//Cria instancias dos controladores para utilizar seus métodos
$authController = new AuthController(); //instancia o controlador de autenticação
$userController = new UserController(); //instancia o controlador de usuarios
$dashboardController = new DashboardController(); //instancia o controlador de dashboard

//Coleta a ação de URL, se não houver ação definida, usa 'login' como padrão

$acao = $_GET['acao'] ?? 'login'; //Usa operador de coalescencia nula (??) para definir 'login' se 'action' não estiver presente

switch($action){
    case 'login':
        $authController->login();//chama o método de login do controlador de autenticação
}

?>