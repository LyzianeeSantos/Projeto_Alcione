<?php
// app/controllers/AgendamentosController.php

require_once __DIR__ . '/../models/Agendamento.php';

class AgendamentosController {
    
    // Listar todos os agendamentos
    public function index() {
        $agendamentos = Agendamento::all();
        echo json_encode($agendamentos);
    }

    // Criar um novo agendamento
    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);

        // Validação de dados
        if (empty($data['id_cliente']) || empty($data['data']) || empty($data['hora']) || empty($data['servico'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID do cliente, data, hora e serviço são obrigatórios']);
            return;
        }

        $agendamento = new Agendamento();
        $agendamento->id_cliente = $data['id_cliente'];
        $agendamento->data = $data['data'];
        $agendamento->hora = $data['hora'];
        $agendamento->servico = $data['servico'];
        $agendamento->duracao = $data['duracao'] ?? null;

        if ($agendamento->save()) {
            http_response_code(201);
            echo json_encode(['message' => 'Agendamento criado com sucesso']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao criar agendamento']);
        }
    }

    // Atualizar um agendamento existente
    public function update() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data['id_agendamento']) || empty($data['id_cliente']) || empty($data['data']) || empty($data['hora']) || empty($data['servico'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID do agendamento, ID do cliente, data, hora e serviço são obrigatórios']);
            return;
        }

        $agendamento = Agendamento::find($data['id_agendamento']);
        if (!$agendamento) {
            http_response_code(404);
            echo json_encode(['error' => 'Agendamento não encontrado']);
            return;
        }

        $agendamento->id_cliente = $data['id_cliente'];
        $agendamento->data = $data['data'];
        $agendamento->hora = $data['hora'];
        $agendamento->servico = $data['servico'];
        $agendamento->duracao = $data['duracao'] ?? null;

        if ($agendamento->save()) {
            echo json_encode(['message' => 'Agendamento atualizado com sucesso']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao atualizar agendamento']);
        }
    }

    // Excluir um agendamento
    public function delete() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data['id_agendamento'])) {
            http_response_code(400);
            echo json_encode(['error' => 'ID do agendamento é obrigatório']);
            return;
        }

        $agendamento = Agendamento::find($data['id_agendamento']);
        if (!$agendamento) {
            http_response_code(404);
            echo json_encode(['error' => 'Agendamento não encontrado']);
            return;
        }

        if ($agendamento->delete()) {
            echo json_encode(['message' => 'Agendamento excluído com sucesso']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao excluir agendamento']);
        }
    }
}
