<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// $router->get('/lista-filmes', 'Filmes@lista'); //listar filmes home
$router->get('/lista-filmes', 'Filme@lista', function () use ($router) {
    echo view('/templates/header');
    echo view('/pages/moviegrid');
    echo view('/templates/footer');
});

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

