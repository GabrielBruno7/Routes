**![logo](https://github.com/GabrielBruno7/backend/assets/114627827/64f0d858-9575-47ce-9b82-bb3ac83554dd)**

# Teste Desenvolvedor Backend


## Sobre o projeto

O projeto poligonos é um projeto focado em backend que tem o objetivo de calcular as áreas dos poligonos.

Ele possui as seguintes funcionalidades:

* Rota para cadastro de retângulos.
* Rota para cadastro de triângulos.
* Rota para visualizar a soma das áreas dos poligonos.

Como executar o projeto:

  - Faça download do postman --> https://www.postman.com/downloads/
  - Clone o repositório https://github.com/GabrielBruno7/emcash.git
  - Inicie o servidor : php -S localhost:5000 -t public
  - Teste as rotas pelo postman ou qualquer outro testador de API's

Erros:
Configure o banco de dados de acordo com o projeto.
Caso dê erro quando solicitar a rota, troque no projeto o caminho do include do banco de dados.


 ## Rotas

| HTTP    |Rota                           |
|----------------|-------------------------------|
|POST|`/triangle` - body : width e length|
|GET|`/triangle`|
|DELETE|`/triangle` - body : id|
||
|POST|`/rectangle` - body : width e length|
|GET|`/rectangle`|
|DELETE|`/rectangle` - body : id|
