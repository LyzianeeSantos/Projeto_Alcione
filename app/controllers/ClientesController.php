<?php
// app/controllers/ClientesController.php

require_once __DIR__ . '/../models/Cliente.php';

class ClientesController {
    
    // Listar todos os clientes
    public function index() {
        $clientes = Cliente::all();
        echo json_encode($clientes);
    }

    // Criar um novo cliente
    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);

        // Validação de dados
        if (empty($data['nome']) || empty($data['telefone'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Nome e telefone são obrigatórios']);
            return;
        }

        $cliente = new Cliente();
        $cliente->nome = $data['nome'];
        $cliente->telefone = $data['telefone'];
        $cliente->email = $data['email'] ?? null;

        if ($cliente->save()) {
            http_response_code(201);
            echo json_encode(['message' => 'Cliente criado com sucesso']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao criar cliente']);
        }
    }

    // Atualizar um cliente existente
    public function update() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data['id_cliente']) || empty($data['nome']) || empty($data['telefone'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID, nome e telefone são obrigatórios']);
            return;
        }

        $cliente = Cliente::find($data['id_cliente']);
        if (!$cliente) {
            http_response_code(404);
            echo json_encode(['error' => 'Cliente não encontrado']);
            return;
        }

        $cliente->nome = $data['nome'];
        $cliente->telefone = $data['telefone'];
        $cliente->email = $data['email'] ?? null;

        if ($cliente->save()) {
            echo json_encode(['message' => 'Cliente atualizado com sucesso']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao atualizar cliente']);
        }
    }

    // Excluir um cliente
    public function delete() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data['id_cliente'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID do cliente é obrigatório']);
            return;
        }

        $cliente = Cliente::find($data['id_cliente']);
        if (!$cliente) {
            http_response_code(404);
            echo json_encode(['error' => 'Cliente não encontrado']);
            return;
        }

        if ($cliente->delete()) {
            echo json_encode(['message' => 'Cliente excluído com sucesso']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao excluir cliente']);
        }
    }
}
