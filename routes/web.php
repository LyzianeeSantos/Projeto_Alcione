<?php
// routes/web.php

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
