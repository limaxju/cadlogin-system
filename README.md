# Sistema de Gerenciamento de Usuários

Um sistema de gerenciamento de usuários desenvolvido em **PHP** e **MySQL** que permite o controle de cadastro, edição e exclusão de usuários, além de autenticação e controle de acesso com diferentes perfis. Este sistema é adequado para equipes com funções administrativas, gestores e colaboradores, oferecendo uma interface segura e intuitiva para gerenciar informações de usuários.

## Índice

- [Visão Geral do Projeto](#visão-geral-do-projeto)
- [Funcionalidades](#funcionalidades)
- [Pré-requisitos](#pré-requisitos)
- [Configuração e Instalação](#configuração-e-instalação)
  - [1. Clonar o Repositório](#1-clonar-o-repositório)
  - [2. Configuração do Banco de Dados](#2-configuração-do-banco-de-dados)
  - [3. Configuração do Servidor](#3-configuração-do-servidor)
  - [4. Acessar o Sistema](#4-acessar-o-sistema)
- [Estrutura de Arquivos](#estrutura-de-arquivos)
- [Detalhes Técnicos](#detalhes-técnicos)
  - [Conexão com o Banco de Dados](#conexão-com-o-banco-de-dados)
  - [Rotas e Controladores](#rotas-e-controladores)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Contribuições](#contribuições)
- [Licença](#licença)

## Visão Geral do Projeto

O **Sistema de Gerenciamento de Usuários** permite a gestão segura de usuários através de um sistema de login e permissões de acesso. Este projeto pode ser usado como base para sistemas maiores ou adaptado para as necessidades específicas de diferentes aplicações.

## Funcionalidades

- **Login e Logout** com controle de sessão.
- **Cadastro de Usuário** com perfis de acesso diferenciados.
- **Gerenciamento de Usuários**: listagem, edição e remoção de usuários.
- **Painel de Controle**: exibe uma interface adequada conforme o perfil do usuário (Admin, Gestor, Colaborador).

## Pré-requisitos

Para executar o projeto, você precisa ter:

- **PHP** >= 7.4
- **MySQL** >= 5.7
- **Servidor Web** como Apache ou o servidor embutido do PHP
- **Git** (para clonar o repositório)

## Configuração e Instalação

### 1. Clonar o Repositório

Primeiro, clone o repositório para sua máquina local:

```bash
git clone https://github.com/usuario/sistema-gerenciamento-usuarios.git
cd sistema-gerenciamento-usuarios
