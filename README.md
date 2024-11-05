# Sistema de Autenticação e Gerenciamento de Usuários em PHP

Este projeto é um sistema de autenticação e gerenciamento de usuários em PHP, utilizando sessões para controle de login, com recursos de login, logout, registro, edição, listagem e exclusão de usuários. Cada funcionalidade está dividida em controllers específicos para melhor organização do código.

## Controllers

### 1. `AuthController.php`
O `AuthController` gerencia a autenticação dos usuários, com funcionalidades de login e logout.

- **Função `login()`**: 
  - Verifica se o método HTTP da requisição é `POST` (ou seja, se o formulário foi enviado).
  - Coleta os dados do formulário (`email` e `senha`).
  - Verifica o usuário no banco de dados através do método `User::findByEmail($email)`.
  - Se o usuário for encontrado e a senha for válida, inicia uma sessão e armazena o `ID` e o `perfil` do usuário.
  - Redireciona o usuário autenticado para o dashboard (`index.php?action=dashboard`).
  - Caso as credenciais estejam incorretas, exibe uma mensagem de erro.
  - Se a requisição não for `POST`, inclui a visualização de login (`views/login.php`).

- **Função `logout()`**:
  - Inicia uma sessão e a destrói, encerrando o login do usuário.
  - Redireciona o usuário para a página inicial (`index.php`).

### 2. `DashboardController.php`
O `DashboardController` gerencia o acesso ao painel de controle dos usuários.

- **Função `index()`**:
  - Inicia uma sessão e verifica se o usuário está autenticado.
  - Caso não haja uma sessão ativa, redireciona para a página de login.
  - Se a sessão estiver ativa, inclui a visualização do dashboard (`views/dashboard.php`), exibindo o painel para o usuário.

### 3. `UserController.php`
O `UserController` gerencia as operações de CRUD para os usuários, permitindo registro, listagem, edição e exclusão de contas.

- **Função `register()`**:
  - Verifica se o método HTTP é `POST`.
  - Coleta os dados do formulário de registro (`nome`, `email`, `senha` e `perfil`) e criptografa a senha.
  - Chama o método `User::create($data)` para salvar os dados do usuário no banco de dados.
  - Redireciona para a página inicial (`index.php`).
  - Se a requisição não for `POST`, inclui a visualização de registro (`views/register.php`).

- **Função `list()`**:
  - Obtém todos os usuários com `User::all()` e inclui a visualização que lista os usuários (`views/list_users.php`).

- **Função `edit($id)`**:
  - Inicia a sessão e verifica se o usuário tem permissão de `admin` ou `gestor` para editar.
  - Busca o usuário pelo `id` através de `User::find($id)`.
  - Se a requisição for `POST`, coleta e atualiza os dados do usuário (`nome`, `email` e `perfil`).
  - Redireciona para a lista de usuários após a edição (`index.php?action=list`).
  - Se a requisição não for `POST`, inclui a visualização de edição de usuário (`views/edit_user.php`).
  - Caso o usuário não tenha permissão, exibe uma mensagem de erro.

- **Função `delete($id)`**:
  - Chama `User::delete($id)` para excluir o usuário especificado.
  - Redireciona para a lista de usuários (`index.php?action=list`).

## Estrutura dos Arquivos

- **`AuthController.php`**: Controlador de autenticação, gerencia o login e logout.
- **`DashboardController.php`**: Controlador do painel de controle.
- **`UserController.php`**: Controlador para registro, listagem, edição e exclusão de usuários.
- **`views/login.php`**: Formulário de login.
- **`views/dashboard.php`**: Painel de controle do usuário autenticado.
- **`views/register.php`**: Formulário de registro de usuários.
- **`views/list_users.php`**: Lista todos os usuários cadastrados.
- **`views/edit_user.php`**: Formulário para edição de dados de um usuário.

## Pré-Requisitos

- **PHP**: Versão 7.0 ou superior.
- **Servidor Web**: Apache, Nginx ou similar.
- **Banco de Dados**: Compatível com MySQL ou MariaDB.

## Observações

- Certifique-se de que a classe `User` dentro de `models/user.php` implementa os métodos necessários (`findByEmail`, `create`, `all`, `find`, `update`, `delete`).
- Use práticas de segurança para proteger dados de usuários, como armazenamento seguro de senhas e gerenciamento seguro de sessões.
  
Este projeto serve como base para um sistema de autenticação e gerenciamento de usuários em PHP, podendo ser expandido conforme necessário.
