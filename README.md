1. O que são Service Providers em Laravel e para que servem?

São classes responsáveis por registrar serviços, bindings e configurações na aplicação. Toda a inicialização de componentes (como eventos, rotas, serviços personalizados) acontece através deles.

******

2. Qual a diferença entre hasOne e hasMany no Eloquent ORM?

hasOne: Define um relacionamento um-para-um.

hasMany: Define um relacionamento um-para-muitos.

******

3. O que é Dependency Injection e como ela é usada no Laravel?

É uma técnica onde dependências são injetadas automaticamente em classes.
No Laravel, basta tipar os parâmetros no construtor ou nos métodos, e o framework injeta automaticamente.

******

4. Explique o conceito de middleware e dê um exemplo de uso.
Middleware são camadas intermediárias que processam requisições HTTP antes ou depois de chegar ao controller.
Exemplo: Autenticação (auth) – impede acesso a rotas protegidas sem login.

******

5. Como funcionam migrations e quais suas vantagens?
Migrations são arquivos PHP que controlam a estrutura do banco de dados via código.
Vantagens:

Versionamento do banco de dados

Automação de criação e rollback de tabelas

******

6. O que é Queue no Laravel e quando usá-la?
Queues permitem executar tarefas em segundo plano, de forma assíncrona.
Usos comuns: envio de e-mails, processamento de arquivos, notificações – tudo que pode ser feito fora da requisição principal.

******

7. Explique a diferença entre API Resource e um Controller tradicional.

API Resource: é usado para formatar a resposta dos dados (JSON) de forma consistente e personalizada.

Controller tradicional: cuida da lógica da requisição (armazenar, atualizar, deletar, etc).


*********************************************************************************************************************

Iniciando o projeto

Comandos no terminal:

1- composer install
2- copy .env.example .env
3- php artisan key:generate
4- php artisan migrate --seed
5- php artisan serve

*********************************************************************************************************************

Testando

Para ficar um pouco mais "clean" resumi as rotas em:
    Route::apiResource('tasks', TaskController::class);
Utilizei a Service Layer para separar a lógica de regra de negócio do controller.

No postman segue o padrão para fazer requisições

GET: http://localhost:8000/api/tasks/

GET: http://localhost:8000/api/tasks/{id}

POST: http://localhost:8000/api/tasks/ 

no body{
    
  "title": "Nova tarefa",
  "description": "Estudar Laravel",
  "status": "pendente",
  "due_date": "2025-04-15"
}

PUT: http://localhost:8000/api/tasks/{id}
no body{
    
  "title": "Título atualizado",
  "status": "em andamento"

}

DELETE: http://localhost:8000/api/tasks/{id}

*********************************************************************************************************************

