<?php
// app/models/Agendamento.php

require_once __DIR__ . '/../../config/database.php';

class Agendamento {
    public $id_agendamento;
    public $id_cliente;
    public $data;
    public $hora;
    public $servico;
    public $duracao;

    // Listar todos os agendamentos
    public static function all() {
        try {
            $db = (new Database())->getConnection();
            $query = $db->query("SELECT * FROM Agendamentos");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erro ao buscar agendamentos: " . $e->getMessage());
        }
    }

    // Salvar um novo agendamento
    public function save() {
        try {
            $db = (new Database())->getConnection();
            $stmt = $db->prepare("INSERT INTO Agendamentos (id_cliente, data, hora, servico, duracao) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$this->id_cliente, $this->data, $this->hora, $this->servico, $this->duracao]);
            return $db->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Erro ao salvar agendamento: " . $e->getMessage());
        }
    }
}
