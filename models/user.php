<?php

require_once "models/database.php";

class User
{
    // Função para encontrar um usuário pelo email
    public static function findByEmail($email) {
        // Obter conexão com o banco de dados
        $conn = Database::getConnection();

        // Prepara consulta SQL para buscar usuário pelo email
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute([":email" => $email]);

        // Retorno de dados do usuário encontrado como um array associativo
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cria função que localiza usuário pelo ID
    public static function find($id) {
        // Obtém a conexão com o banco de dados
        $conn = Database::getConnection();

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->execute(["id" => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Função para criar o usuário na base de dados
    public static function create($data) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO usuarios(nome, email, senha, perfil) VALUES (:nome, :email, :senha, :perfil)");
        $stmt->execute($data);
    }

    // Função para listar todas as informações dos usuários no BD
    public static function all() {
        $conn = Database::getConnection();
        $stmt = $conn->query("SELECT * FROM usuarios");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public static function update($id, $data){
    $conn = Database::getConnection();
    //prepara a consulta SQL para atualização dos dados do usuario
    $stmt = $conn->prepare("UPDATE usuarios SET nome = :nome, email = :email, perfil = :perfil  WHERE id = :id");

    $data['id'] = $id;

    $stmt->execute($data);

}
//função para exclusão de usuario pelo id
public static function delete($id) {
    $conn = Database::getConnection();
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->execute(["id" => $id]);
}
?>