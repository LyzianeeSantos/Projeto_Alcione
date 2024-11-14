<?php
// app/controllers/AgendamentosController.php

require_once __DIR__ . '/../models/Agendamento.php';

class AgendamentosController {

    // Listar todos os agendamentos
    public function index() {
        try {
            $agendamentos = Agendamento::all();
            echo json_encode($agendamentos);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao listar agendamentos', 'details' => $e->getMessage()]);
        }
    }

    // Criar um novo agendamento
    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);

        // Validação de dados recebidos
        if (empty($data['id_cliente']) || empty($data['data']) || empty($data['hora']) || empty($data['servico'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Campos obrigatórios ausentes']);
            return;
        }

        // Validação adicional (formato de data/hora, etc.)
        if (!strtotime($data['data']) || !preg_match('/^\d{2}:\d{2}$/', $data['hora'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Formato de data ou hora inválido']);
            return;
        }

        try {
            $agendamento = new Agendamento();
            $agendamento->id_cliente = $data['id_cliente'];
            $agendamento->data = $data['data'];
            $agendamento->hora = $data['hora'];
            $agendamento->servico = $data['servico'];
            $agendamento->duracao = $data['duracao'] ?? null;

            $result = $agendamento->save();
            echo json_encode(['success' => 'Agendamento criado com sucesso', 'id' => $result]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao criar agendamento', 'details' => $e->getMessage()]);
        }
    }
}
