<?php
//Liberando o acesso do back la pro front
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE, POST, GET, OPTIONS");
header('content-type: application/json; charset=utf-8');

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
      header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS, DELETE");         
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
      header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
      // header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding");
    exit(0);
  }

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// $router->get('/lista-filmes', 'Filmes@lista'); //listar filmes home
$router->get('/filme', 'Filme@lista', function () use ($router) {
});
$router->post('/filme', 'Filme@create');
$router->put('/filme/{id}', 'Filme@update');
$router->delete('/filme/{id}', 'Filme@destroy');

$router->get('/aula[/{id}]', 'AulaController@show'); //id é obrigatorio
$router->post('/aula', 'AulaController@create');
$router->put('/aula/{id}', 'AulaController@update');
$router->delete('/aula/{id}', 'AulaController@destroy'); //id é opcional 



// $router->put('/aula', function() {
//     return 'recebi put';
// });
// $router->post('/aula', function() {
//     return 'recebi post';
// });
// $router->delete('/aula', function() {
//     return 'recebi delete';
// });

