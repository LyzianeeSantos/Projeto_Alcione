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
        $db = (new Database())->getConnection();
        $query = $db->query("SELECT * FROM Agendamentos");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Localizar agendamento por ID
    public static function find($id) {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("SELECT * FROM Agendamentos WHERE id_agendamento = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject('Agendamento');
    }

    // Salvar novo agendamento ou atualizar
    public function save() {
        $db = (new Database())->getConnection();

        if ($this->id_agendamento) {
            $stmt = $db->prepare("UPDATE Agendamentos SET id_cliente = ?, data = ?, hora = ?, servico = ?, duracao = ? WHERE id_agendamento = ?");
            return $stmt->execute([$this->id_cliente, $this->data, $this->hora, $this->servico, $this->duracao, $this->id_agendamento]);
        } else {
            $stmt = $db->prepare("INSERT INTO Agendamentos (id_cliente, data, hora, servico, duracao) VALUES (?, ?, ?, ?, ?)");
            return $stmt->execute([$this->id_cliente, $this->data, $this->hora, $this->servico, $this->duracao]);
        }
    }

    // Excluir agendamento
    public function delete() {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("DELETE FROM Agendamentos WHERE id_agendamento = ?");
        return $stmt->execute([$this->id_agendamento]);
    }
}