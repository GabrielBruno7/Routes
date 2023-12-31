**![logo](https://github.com/GabrielBruno7/backend/assets/114627827/64f0d858-9575-47ce-9b82-bb3ac83554dd)**

# Teste Desenvolvedor Backend


## Sobre o projeto

O projeto poligonos é um projeto focado em backend que tem o objetivo de calcular as áreas dos poligonos.

Ele possui as seguintes funcionalidades:

* Rota para cadastro de retângulos.
* Rota para cadastro de triângulos.
* Rota para visualizar a soma das áreas dos poligonos.

Como executar o projeto:

  - Faça download do XAMP  [https://www.wampserver.com/en/](https://www.apachefriends.org/pt_br/index.html).
  - Faça download do postman.
  - Clone o repositório https://github.com/GabrielBruno7/emcash.git dentro da pasta htdocs do Xamp.
  - Abra o XAMP e inicie o Apache e Mysql.
  - Importe o arquivo emCashApi.postman_collection para o postman
  - Teste as rotas.

 ## Rotas

| HTTP    |Rota                           |
|----------------|-------------------------------|
|POST|`/routes/triangulo.php` - body : base e altura|
|GET|`/routes/areaTriangulo.php`|
|DELETE|`/routes/triangulo.php?id=0`|
||
|POST|`/routes/retangulo.php` - body : base e altura|
|GET|`/routes/areaRetangulo.php`|
|DELETE|`/routes/retangulo.php?id=0`|


