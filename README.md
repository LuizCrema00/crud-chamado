# Gestão de Chamados

Sistema de gestão de chamados desenvolvido para a avaliação técnica do processo seletivo para desenvolvedor Júnior da PLSS Soluções.

### Build do Sistema

Siga os passos abaixo para configurar e executar o projeto localmente:

1. **Clonar o Repositório:**

   ```bash
   git clone https://github.com/LuizCrema00/crud-chamado.git

2. ### Requisitos

- PHP 8.1 ou superior
- Composer 2.2 ou superior
- Laravel 10.48.10

3. ### Instalação de Dependências

```bash
composer install

    ### Configuração do Ambiente

Copie o arquivo .env.example para .env e configure as variáveis de ambiente, como conexão com banco de dados.

### Migrations e Seeders

```bash
php artisan migrate

Execute as migrations para criar as tabelas no banco de dados.

```bash
php artisan db:seed

Execute as seeders para popular as tabelas Categorias e Situacoes

### Execução do Projeto

```bash
php artisan serve

O projeto deve estar disponível em http://localhost:8000 porta padrao.





