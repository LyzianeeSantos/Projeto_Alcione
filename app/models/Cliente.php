<?php
// app/models/Cliente.php

require_once __DIR__ . '/../../config/database.php';

class Cliente {
    public $id_cliente;
    public $nome;
    public $telefone;
    public $email;

    // Listar todos os clientes
    public static function all() {
        $db = (new Database())->getConnection();
        $query = $db->query("SELECT * FROM Clientes");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Localizar cliente por ID
    public static function find($id) {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("SELECT * FROM Clientes WHERE id_cliente = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject('Cliente');
    }

    // Salvar novo cliente ou atualizar
    public function save() {
        $db = (new Database())->getConnection();

        if ($this->id_cliente) {
            $stmt = $db->prepare("UPDATE Clientes SET nome = ?, telefone = ?, email = ? WHERE id_cliente = ?");
            return $stmt->execute([$this->nome, $this->telefone, $this->email, $this->id_cliente]);
        } else {
            $stmt = $db->prepare("INSERT INTO Clientes (nome, telefone, email) VALUES (?, ?, ?)");
            return $stmt->execute([$this->nome, $this->telefone, $this->email]);
        }
    }

    // Excluir cliente
    public function delete() {
        $db = (new Database())->getConnection();
        $stmt = $db->prepare("DELETE FROM Clientes WHERE id_cliente = ?");
        return $stmt->execute([$this->id_cliente]);
    }
}
