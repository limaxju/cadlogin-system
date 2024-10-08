<?php
 
// Inclui arquivos de controlador nescessários para lidar com diferentes ações
require 'controllers/AuthController.php'; // Inclui o controlador de autenticação
require 'controllers/UserController.php'; // Inclui o controlador de usuários
require 'controllers/DashboardController'; // Inclui o controlador de dashboard
 
// Cria instancias dos controladores para utilizar seus métados
$authController = new AuthController(); // Instancia controlador de autenticação
$userController = new UserController(); // Instancia controlador de usuário
$dashboarController = new DashboardController(); // Instancia  controlador de dashboard
 
// Coleta a ação de URL, se não houver ação definida, usa 'login' como padrão
$action = $_GET['action'] ?? 'login'; // Usa operador de coalescência nula (??) para definir 'login' se 'action' não estiver presente
 
switch($action){
    case 'login':
        $authController->login(); // chama o métado de login do contoller de autentoicação
        break;
    case 'register':
        $userController->register();
        break;
    case 'dashboard':
        $dashboarController->index();
        break;
    case 'logout':
        $authController->logout();
        break;
    default:
        $authController->login();
    break;
 
}
?>