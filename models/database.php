<?php

//define classe Database, responsavel por gerenciar a conexão com banco de dados
class Database 
{
    //padrão singleton, cujo o objetivo é garantir que apenas uma única instancia de classe seja criada  durante a execução do programa, e que essa instancia seja reutilizada sempre que ncessario 
    private static $instance = null;

    public static function getConnection(){
        if (self::$instance == null) {
            //configurações de conexão com bd
            $host       ='localhost';
            $db         ='sistema_usuarios';
            $user       ='root';
            $password   =' ';
            //a coexão usa o driver  mysql (mysql:) e as informações  de host e bd
            self::$instance = new PDO("mysql:host=$host;dbname=$db", $user, $password);
           //define o modo de erro para execeções, facilitando a depuração e tratamento do erro
            self::$instance->setAttribute(PDO:ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
?>