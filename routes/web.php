<?php
// routes/web.php

route('/api/clientes', 'ClientesController@index');    // Listar todos os clientes (GET)
route('/api/clientes/create', 'ClientesController@store');  // Criar novo cliente (POST)
route('/api/clientes/update', 'ClientesController@update'); // Atualizar cliente (PUT)
route('/api/clientes/delete', 'ClientesController@delete'); // Excluir cliente (DELETE)

route('/api/agendamentos', 'AgendamentosController@index');    // Listar todos os agendamentos (GET)
route('/api/agendamentos/create', 'AgendamentosController@store');  // Criar novo agendamento (POST)
route('/api/agendamentos/update', 'AgendamentosController@update'); // Atualizar agendamento (PUT)
route('/api/agendamentos/delete', 'AgendamentosController@delete'); // Excluir agendamento (DELETE)


$routes = [];

function route($uri, $callback) {
    global $routes;
    $routes[$uri] = $callback;
}

// Definição de rotas
route('/', function() {
    echo "Bem-vindo ao Projeto Alcione!";
});

route('/agendamentos', function() {
    echo "Página de Agendamentos";
});

route('/servicos', function() {
    echo "Página de Serviços";
});

function resolveRoute($uri) {
    global $routes;

    if (array_key_exists($uri, $routes)) {
        $routes[$uri]();
    } else {
        echo "404 - Página não encontrada";
    }



}
