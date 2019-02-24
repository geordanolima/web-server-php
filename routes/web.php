<?php

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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });
$router->group(['middleware' => 'apiauth'], function() use ($router){
                                                        
    $router->get('/', 'PokemonController@index');
    //cadastrar bixo
    $router->post('/pokemon','PokemonController@insertPokemon');
    $router->patch('/pokemon/{id}/','PokemonController@updatePokemon');

    // tuto os pokemão
    $router->get('/pokemon/json', 'PokemonController@allAsJson');
    $router->get('/pokemon/xml', 'PokemonController@allAsXml');

    // um unico pokemão
    $router->get('/pokemon/{id}/json', 'PokemonController@showAsJson');
    $router->get('/pokemon/{id}/xml', 'PokemonController@showAsXml');

    // tuto os vivente
    $router->get('/jogador/json', 'JogadorController@allAsJson');
    $router->get('/jogador/xml', 'JogadorController@allAsXml');

    // um unico vivente
    $router->get('/jogador/{id}/json', 'JogadorController@showAsJson');
    $router->get('/jogador/{id}/xml', 'JogadorController@showAsXml');

    // tuto os item
    $router->get('/item', 'ItemController@buscaitens');
    $router->get('/item/json', 'ItemController@allAsJson');
    $router->get('/item/xml', 'ItemController@allAsXml');

    // uma só coisa
    $router->get('/item/{id}/json', 'ItemController@showAsJson');
    $router->get('/item/{id}/xml', 'ItemController@showAsXml');

    //$router->post('/pokemon/search', 'PokemonController@search');
    $router->post('/pokemon/search', 'PokemonController@search');

    
});

