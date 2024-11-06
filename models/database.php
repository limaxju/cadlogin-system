<?php
class Database{
    // Utiliza o padrão Singleton, cujo objetivo é garantir que apenas uma única instância de uma classe seja criada durante a execução do programa, e que essa instância seja reutilizada sempre que necessário.
    private static $instance = null;
 
    // Método público que retorna a conexão com BD
    public static function getConnection(){
        if(!self::$instance){
            $host       = 'localhost';
            $db         = 'sistema_usuario';
            $user       = 'root';
            $password   = '';
 
            // A conexão usa o drive Mysql (mysql:) e as informações de host e BD
            self::$instance = new PDO("mysql:host=$host;dbname=$db", $user, $password);
 
            // Define o modo de erro para exceções, facilitando a depuração e tratamento dos erros
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
?>