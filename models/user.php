<?php 
require_once 'models/database.php';
 
class User
{
    //função para encontrar um usuário pelo email
    public static function findByEmail ($email){

        //obter conexão com o banco de dados
        $conn = Database:: getConnection();

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");

        $stmt->execute(['email'=>$email]);

        //retorno de dados do usuario encontrado como um array associativo
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    //função para encontrar um usuário pelo id
    public static function find($id){

        //obter conexão com o banco de dados
        $conn = Database::getConnection();
        $smts = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
        $smts->execute(['id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    //função para criar usuarios na base de dados
    public static function create($data){
        $conn = Database::getConnection();

        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, perfil) VALUES (:nome, :email, :senha, :perfil)");

        $stmt->execute($data);


    }
}

?>