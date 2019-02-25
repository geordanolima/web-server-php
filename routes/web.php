<?php

/* ########################### ROTAS ########################### */
//adiciona autenticação atravéz do middleware
$router->group(['middleware' => 'apiauth'], function() use ($router){
                                                        
    $router->get('/', 'PokemonController@index');
    /* ########################### POKEMÃO ########################### */
    //cadastrar pokemão
    $router->post('/pokemon','PokemonController@inserir');
    //alterar pokemão
    $router->patch('/pokemon/{id}/','PokemonController@atualizar');
    // tuto os pokemão
    $router->get('/pokemon/json', 'PokemonController@allAsJson');
    $router->get('/pokemon/xml', 'PokemonController@allAsXml');
    // um unico pokemão
    $router->get('/pokemon/{id}/json', 'PokemonController@showAsJson');
    $router->get('/pokemon/{id}/xml', 'PokemonController@showAsXml');

    //busca pokemão
    $router->post('/pokemon/search', 'PokemonController@search');

    /* ########################### VIVENTE ########################### */
    //cadastrar vivente
    $router->post('/jogador','JogadorController@inserir');
    //alterar vivente
    $router->patch('/jogador/{id}/','JogadorController@atualizar');
    // tuto os vivente
    $router->get('/jogador/json', 'JogadorController@allAsJson');
    $router->get('/jogador/xml', 'JogadorController@allAsXml');
    // um unico vivente
    $router->get('/jogador/{id}/json', 'JogadorController@showAsJson');
    $router->get('/jogador/{id}/xml', 'JogadorController@showAsXml');

    /* ########################### COISA ########################### */
    //cadastrar coisa
    $router->post('/item','ItemController@inserir');
    //alterar coisa
    $router->patch('/item/{id}/','ItemController@atualizar');
    // tuto as coisa
    $router->get('/item', 'ItemController@buscaitens');
    $router->get('/item/json', 'ItemController@allAsJson');
    $router->get('/item/xml', 'ItemController@allAsXml');
    // uma só coisa
    $router->get('/item/{id}/json', 'ItemController@showAsJson');
    $router->get('/item/{id}/xml', 'ItemController@showAsXml');

});

