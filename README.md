# Projeto CRUD de Produtos em Laravel

Este projeto é um CRUD (Create, Read, Update, Delete) simples de produtos, desenvolvido como trabalho final da disciplina de Introdução a Laravel.

## [cite_start]Funcionalidades Implementadas

* Autenticação de usuários (o CRUD é protegido).
* CRUD completo para Produtos (Listar, Criar, Ver, Editar, Apagar).
* Uso de Rotas Resource.
* Validação no servidor com feedback claro para o usuário.
* Mensagens de sessão (flash) para feedback de ações.
* Telas responsivas utilizando Bootstrap (fornecido pelo starter kit).

## [cite_start]Como Instalar e Rodar

1.  Clone este repositório: `git clone https://github.com/Victortramontine/crud-produtos.git`
2.  Acesse a pasta do projeto: `cd crud-produtos`
3.  Instale as dependências: `composer install`
4.  Copie o arquivo de ambiente: `cp .env.example .env`
5.  Gere a chave da aplicação: `php artisan key:generate`
6.  Configure o arquivo `.env` com seu banco de dados (o projeto foi feito com SQLite, basta criar o arquivo `database/database.sqlite`).
7.  Execute as migrações: `php artisan migrate`
8.  Inicie o servidor: `php artisan serve`
9.  Acesse `http://127.0.0.1:8000` no seu navegador.

## [cite_start]Usuário de Teste

Para testar, você pode se registrar com qualquer e-mail/senha na página de registro da aplicação.