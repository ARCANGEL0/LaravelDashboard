<p align="center"> <img src="logo.png?sanitize=true" alt="Logotype" height="250px"></p><p align="center"> <a href="https://github.com/Ryuusakii/LaravelDashboard/blob/master/README.md"><img src="https://img.shields.io/badge/EN--US-%20-brightgreen"/></a> </p>

LaravelPanel
============

Este é um projeto pessoal para realização de testes no Laravel, utilizando o modelo de desenvolvimento CRUD, manipulação de dados SQL através do Laravel Eloquent e os controladores do framework, simulando um painel de controle para ser usado como sistema de gerenciamento em um ambiente comercial de contabilidade para controlar clientes e propostas em uma empresa.

Estrutura
=========

Com a intenção de apenas realizar testes em nível back-end, o painel apresenta apenas 3 páginas.

###### A 1º página contém além das informações do projeto, indicadores para mostrar o Nº de propostas e clientes atuais, e simular o Nº de contratos pendentes e negociações solicitadas

###### A 2º contém uma tabela de dados listando os clientes da empresa, com as devidas ações para criar, apagar, editar, e ver todas as propostas atreladas ao cliente e questão

###### A 3º contém uma tabela de dados listando todas as propostas da empresa, com filtros para o nome do cliente e o status (Ativo/Inativo) da proposta, também com as ações básicas para editar, apagar e etc.

A estruturização do banco de dados foi desenvolvida seguindo o modelo CRUD, então são feitos modelos tanto para CLIENTES quanto PROPOSTAS, com as definições dos campos no modelo, e a atribuição da chave estrangeira para referenciação do cliente à proposta.

Utilização
==========

É preciso definir no arquivo .env as suas configurações do banco de dados para conexão, e as de SMTP para utilização do email. Após definir o seu Banco de dados no projeto, execute o comando

> $ php artisan migrate

para gerar as migrações e criar as tabelas.

Depois execute

> $ php artisan serve

para rodar o servidor e executar o projeto
