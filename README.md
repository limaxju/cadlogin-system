# Cadlogin System
**Autora**: [Julia Lima]

## Controllers

Este projeto utiliza um sistema de controllers em PHP para lidar com a autenticação de usuários, o gerenciamento de sessões e o controle de permissões para acessar e manipular dados de usuários. Abaixo está uma visão geral de cada controller e suas funcionalidades.

### Estrutura dos Controllers

#### `AuthController`
Responsável por autenticar o usuário e gerenciar o processo de login e logout.

- **Método `login()`**
  - Verifica se a requisição HTTP é do tipo `POST` para processar o login.
  - Obtém os valores do formulário (`email` e `senha`).
  - Utiliza o model `User` para buscar o usuário pelo email fornecido.
  - Verifica se a senha fornecida corresponde ao hash armazenado no banco de dados:
    - Se a autenticação for bem-sucedida, inicia uma sessão e armazena o ID do usuário e o perfil.
    - Redireciona o usuário para o `dashboard`.
    - Exibe uma mensagem de erro caso as credenciais estejam incorretas.
  - Se a requisição não for `POST`, inclui a view de login (`views/login.php`).

- **Método `logout()`**
  - Inicia uma sessão e a destrói para encerrar a sessão do usuário.
  - Redireciona o usuário para a página inicial (`index.php`).

#### `DashboardController`
Controlador responsável por verificar se o usuário está autenticado antes de exibir o painel.

- **Método `index()`**
  - Inicia uma sessão para verificar a autenticação.
  - Se o usuário não estiver autenticado, redireciona para a página de login.
  - Inclui a view do `dashboard` (`views/dashboard.php`) caso o usuário esteja autenticado.

#### `UserController`
Este controller lida com o cadastro, listagem, edição e exclusão de usuários.

- **Método `register()`**
  - Verifica se a requisição HTTP é do tipo `POST` para processar o cadastro.
  - Obtém os dados enviados no formulário, como `nome`, `email`, `senha`, e `perfil`, e criptografa a senha.
  - Utiliza o model `User` para criar um novo usuário no banco de dados.
  - Redireciona o usuário para a página inicial (`index.php`) após o cadastro.
  - Inclui a view de cadastro (`views/register.php`) se a requisição não for `POST`.

- **Método `list()`**
  - Recupera todos os usuários utilizando o model `User` e inclui a view de listagem (`views/list_users.php`).

- **Método `edit($id)`**
  - Inicia uma sessão e verifica se o usuário tem permissão (`perfil` igual a `admin` ou `gestor`) para editar.
  - Obtém os dados do usuário específico com base no `id` e exibe o formulário de edição.
  - Se o formulário de edição for enviado, atualiza os dados do usuário com as novas informações e redireciona para a lista de usuários.
  - Caso o usuário não tenha permissão, exibe uma mensagem de erro.

- **Método `delete($id)`**
  - Exclui um usuário com base no `id` fornecido utilizando o model `User`.
  - Redireciona para a lista de usuários (`index.php?action=list`).

## Estrutura do Projeto

- **models/**: Contém o model `User` com as funções para manipulação dos dados dos usuários.
- **controllers/**: Contém os controllers (`AuthController`, `DashboardController`, `UserController`) que gerenciam as operações de autenticação, controle de sessão e gerenciamento de dados dos usuários.
- **views/**: Inclui as views para login, dashboard, cadastro, listagem, edição e exclusão de usuários.

## Requisitos

- PHP 7.4+
- Servidor de banco de dados MySQL ou outro compatível com o model `User`

# Models

Este projeto utiliza models em PHP para gerenciar a conexão com o banco de dados e realizar operações CRUD (Criar, Ler, Atualizar e Excluir) na tabela de `usuarios`. Os models seguem o padrão Singleton para garantir que apenas uma conexão com o banco de dados seja criada durante a execução da aplicação.

### Estrutura dos Models

#### `Database`
A classe `Database` é responsável pela conexão com o banco de dados e utiliza o padrão Singleton para assegurar uma única instância.

- **Propriedades**
  - `private static $instance`: Armazena a instância única da conexão com o banco de dados.

- **Método `getConnection()`**
  - Verifica se a conexão já foi estabelecida; se não, cria uma nova instância de conexão com o banco.
  - Utiliza PDO para se conectar ao banco MySQL com as credenciais e o nome do banco especificados (`localhost`, `sistema_usuarios_3b`, `root`, `''`).
  - Define o modo de erro para `PDO::ERRMODE_EXCEPTION` para facilitar a depuração.
  - Retorna a instância da conexão para ser reutilizada.

#### `User`
A classe `User` representa os usuários e possui métodos para interagir com os dados dos usuários no banco de dados.

- **Método `findByEmail($email)`**
  - Busca um usuário pelo email.
  - Obtém a conexão do banco e prepara uma consulta SQL para selecionar o usuário cujo `email` corresponde ao fornecido.
  - Retorna os dados do usuário como um array associativo.

- **Método `find($id)`**
  - Localiza um usuário pelo `id`.
  - Obtém a conexão com o banco e prepara uma consulta SQL para selecionar o usuário pelo `id`.
  - Retorna os dados do usuário encontrado como um array associativo.

- **Método `create($data)`**
  - Cria um novo usuário na base de dados.
  - Recebe um array `$data` contendo `nome`, `email`, `senha` (criptografada), e `perfil`.
  - Executa a inserção dos dados na tabela `usuarios`.

- **Método `all()`**
  - Retorna uma lista de todos os usuários.
  - Executa uma consulta SQL para selecionar todas as entradas na tabela `usuarios`.
  - Retorna os dados dos usuários como uma lista de arrays associativos.

- **Método `update($id, $data)`**
  - Atualiza os dados de um usuário pelo `id`.
  - Recebe o `id` do usuário e um array `$data` contendo os novos dados.
  - Executa uma consulta SQL para atualizar `nome`, `email` e `perfil` do usuário especificado pelo `id`.

- **Método `delete($id)`**
  - Exclui um usuário pelo `id`.
  - Obtém a conexão com o banco e executa uma consulta SQL para excluir o usuário cujo `id` corresponde ao fornecido.

## Estrutura do Projeto

- **models/database.php**: Define a classe `Database`, que gerencia a conexão com o banco de dados.
- **models/user.php**: Define a classe `User`, que manipula os dados dos usuários, incluindo métodos de CRUD.

## Requisitos

- PHP 7.4+
- Servidor de banco de dados MySQL ou outro compatível com PDO.
- PDO instalado no servidor PHP.
- Credenciais válidas para o banco de dados.
- O projeto deve ser executado em um ambiente de desenvolvimento local ou em um servidor web, com acesso ao banco de dados configurado corretamente.

# Views

- Sistema de Gerenciamento de Usuários

Esta pasta contém as páginas da interface do sistema. Cada arquivo PHP tem um papel específico, como exibir o painel de controle, gerenciar usuários, realizar login e cadastro. O acesso a determinadas funcionalidades é restrito de acordo com o perfil do usuário (Admin, Gestor ou Colaborador).

### Estrutura de Arquivos

#### `dashboard.php`
   - **Função**: Página inicial do sistema após o login. Exibe um resumo do perfil do usuário logado (Admin, Gestor ou Colaborador) e links de navegação.
   - **Características**:
     - Exibe um link para gerenciar usuários se o usuário for **Admin** ou **Gestor**.
     - Exibe uma área exclusiva para **Gestor** e **Colaborador**.
     - Link de logout.

#### `edit_user.php`
   - **Função**: Permite editar as informações de um usuário específico.
   - **Características**:
     - O formulário inclui campos para **nome**, **email** e **perfil**.
     - Somente **Admin** e **Gestor** podem editar os usuários.

#### `list_users.php`
   - **Função**: Exibe uma lista de todos os usuários cadastrados.
   - **Características**:
     - Cada usuário tem um botão para **editar** (visível para **Admin** e **Gestor**).
     - **Admin** pode também excluir usuários.
     - Exibe informações de **ID**, **nome**, **email** e **perfil**.
     - Link para voltar ao **Dashboard**.

#### `login.php`
   - **Função**: Página de login onde o usuário insere suas credenciais (email e senha).
   - **Características**:
     - Formulário de **login** com campos para **email** e **senha**.
     - Link para acessar a página de **cadastro**.

#### `register.php`
   - **Função**: Página de cadastro de novos usuários.
   - **Características**:
     - Formulário de **cadastro** com campos para **nome**, **email**, **senha** e **perfil**.
     - O perfil pode ser **Admin**, **Gestor** ou **Colaborador**.

---

## Como Usar

1. **Admin**: Acesso total ao sistema. Pode editar e excluir qualquer usuário.
2. **Gestor**: Pode editar usuários, mas não excluir.
3. **Colaborador**: Acesso restrito, apenas visualização.

### Fluxo de Navegação

1. **Login**: Acesse `login.php` para autenticar.
2. **Dashboard**: Após login, você será redirecionado para o painel principal (`dashboard.php`).
3. **Gerenciar Usuários**: O Admin pode acessar `list_users.php` para editar ou excluir usuários.
4. **Cadastro**: Novos usuários podem se registrar via `register.php`.

---

## Observações

- O sistema de login utiliza **sessões** para manter o usuário autenticado.
- O controle de permissões de acesso é feito através do valor de `$_SESSION['perfil']` para determinar as ações permitidas.
 
## Execução

https://github.com/user-attachments/assets/1c58f938-5fb9-424f-9245-bb1037b5d927
