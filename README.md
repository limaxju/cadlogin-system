# Sistema de Gerenciamento de Usuários

Este projeto é um sistema de gerenciamento de usuários com autenticação, cadastro, edição e visualização de dados, criado com PHP e MySQL. Ele suporta três tipos de perfis de usuário (Admin, Gestor e Colaborador), cada um com diferentes permissões de acesso.

## Funcionalidades

- **Autenticação**: Login seguro com sessões.
- **Cadastro de Usuário**: Criação de novos usuários com perfis de acesso.
- **Gerenciamento de Usuários**: Funções de listar, editar e excluir usuários, dependendo das permissões do perfil.
- **Painel de Controle**: Interface personalizada com permissões específicas para cada perfil.

## Estrutura do Projeto

- **controllers/**: Controladores que manipulam a lógica de autenticação e gerenciamento de usuários.
  - `AuthController.php`: Controlador para login e logout.
  - `UserController.php`: Controlador para registro, edição e listagem de usuários.
  - `DashboardController.php`: Controlador para exibir o painel de controle.
- **models/**: Classe de conexão ao banco de dados.
  - `Database.php`: Configuração de conexão ao banco de dados usando o padrão Singleton.
- **views/**: Páginas de interface com o usuário.
  - `login.php`: Página de login.
  - `register.php`: Página de cadastro.
  - `dashboard.php`: Página de boas-vindas ao usuário logado.
  - `edit.php`: Página de edição de informações do usuário.
  - `list.php`: Página de listagem de usuários.
- **database.sql**: Script SQL para criação do banco de dados e da tabela de usuários.
- **index.php** e **logout.php**: Arquivos principais de entrada do sistema.
- **routes.php**: Arquivo de rotas que direciona as ações para os métodos adequados dos controladores.

## Configuração do Banco de Dados

Execute o script `database.sql` para criar o banco de dados e a tabela necessária:

```sql
CREATE DATABASE sistema_usuario;

USE sistema_usuario;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL, 
    perfil ENUM('admin', 'gestor', 'colaborador') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
