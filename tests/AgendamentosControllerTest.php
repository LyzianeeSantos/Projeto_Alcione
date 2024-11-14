<?php
// tests/AgendamentosControllerTest.php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/controllers/AgendamentosController.php';
require_once __DIR__ . '/../app/models/Agendamento.php';

class AgendamentosControllerTest extends TestCase {
    private $controller;

    protected function setUp(): void {
        $this->controller = new AgendamentosController();
    }

    public function testIndexReturnsAgendamentos() {
        // Simular a saída JSON de agendamentos
        $this->expectOutputRegex('/\[\{.*"id_cliente".*:.*\}\]/');
        $this->controller->index();
    }

    public function testStoreWithValidData() {
        // Simular a entrada de dados válidos
        $input = json_encode([
            'id_cliente' => 1,
            'data' => '2024-11-15',
            'hora' => '10:00',
            'servico' => 'Consulta',
            'duracao' => '30'
        ]);

        // Simular a entrada JSON
        file_put_contents("php://input", $input);

        // Verificar se a saída inclui sucesso
        $this->expectOutputString('{"success":"Agendamento criado com sucesso","id":1}');
        $this->controller->store();
    }

    public function testStoreWithInvalidDate() {
        $input = json_encode([
            'id_cliente' => 1,
            'data' => 'invalid-date',
            'hora' => '10:00',
            'servico' => 'Consulta'
        ]);

        file_put_contents("php://input", $input);

        $this->expectOutputString('{"error":"Formato de data ou hora inválido"}');
        $this->controller->store();
    }

    public function testStoreWithMissingFields() {
        $input = json_encode([
            'id_cliente' => 1,
            'data' => '2024-11-15'
        ]);

        file_put_contents("php://input", $input);

        $this->expectOutputString('{"error":"Campos obrigatórios ausentes"}');
        $this->controller->store();
    }
}
