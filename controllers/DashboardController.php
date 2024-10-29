<?php
 
class DashboardController
{
    // Inicia uma sessão para vereficar se o usuário está autenticado
    public function index(){
        session_start();
       
        if(!isset($_SESSION['usuario_id'])){
            header('Location: index.php');
            exit; // Garante que o script  seja interrompido após o redireciamento
        }
        // Se o usuário estiver autenticado, sera inlcuida a View 'dashboard.php' que exibe
        include 'views/dashboard.php';
    }
 
}
?>
 