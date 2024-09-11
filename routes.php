<?php

//inclui arquivos de controlador necessarios para lidar com diferentes ações 
require 'controllers/AuthController.php'; //inclui o controlador de autenticação
require 'controllers/UserController.php'; //inclui o controlador de usuarios
require 'controllers/DashboardController.php';//inclui o controlador de dashboard

//Cria instancias dos controladores para utilizar seus métodos
$authController = new AuthController(); //instancia o controlador de autenticação

?>