
# AI Chef - Gerador de Receitas.

Este projeto é uma aplicação web para gerar receitas criativas com base nos ingredientes cadastrados pelo usuário.

## Funcionalidades

- Cadastro e organização de ingredientes (dispensa virtual)
- Geração automática de receitas usando IA
- Visualização, salvamento e exclusão de receitas
- Interface moderna com suporte a dark mode

## Pré-requisitos

- PHP >= 8.1
- Composer
- Node.js e npm (para assets front-end)
- Banco de dados (MySQL, SQLite, etc.)

## Instalação

1. Clone o repositório:
	```bash
	git clone https://github.com/proz-marcelo/ai.chef.git
	cd ai.chef
	```
2. Instale as dependências PHP:
	```bash
	composer install
	```
3. Instale as dependências front-end:
	```bash
	npm install && npm run build
	```
4. Copie o arquivo de exemplo de ambiente:
	```bash
	cp .env.example .env
	```
5. Gere a chave da aplicação:
	```bash
	php artisan key:generate
	```
6. Configure o banco de dados no arquivo `.env`:
	```env
	DB_CONNECTION=mysql # ou sqlite/postgres
	DB_DATABASE=nome_do_banco
	DB_USERNAME=usuario
	DB_PASSWORD=senha
	```
7. Execute as migrations:
	```bash
	php artisan migrate
	```

## Configurando o modelo e token Hugging Face

1. Crie uma conta em https://huggingface.co e gere um Access Token com permissão de leitura.
2. No arquivo `.env`, adicione:
	```env
	HUGGINGFACE_API_TOKEN=seu_token_aqui
	```
3. O modelo padrão utilizado está definido no controller como:
	```php
	$model = 'meta-llama/Llama-3.1-8B-Instruct';
	```
	Para trocar, basta alterar o nome do modelo na variável `$model` em `ReceitaController.php`.

## Executando o projeto

1. Inicie o servidor de desenvolvimento:
	```bash
	php artisan serve
	```
2. Acesse no navegador: [http://localhost:8000](http://localhost:8000)
