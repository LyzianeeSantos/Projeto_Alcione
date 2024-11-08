# Documentação da API

## Endpoints para Clientes

### Listar todos os clientes
**GET** `/api/clientes`

### Criar um novo cliente
**POST** `/api/clientes/create`
- **Body**:
  ```json
  {
    "nome": "Nome do Cliente",
    "telefone": "Telefone do Cliente",
    "email": "Email do Cliente"
  }

### Atualizar um cliente
**PUT** `/api/clientes/update`
- **Body**:
  ```json
  {
  "id_cliente": "ID do Cliente",
  "nome": "Novo Nome",
  "telefone": "Novo Telefone",
  "email": "Novo Email"
    }

### Excluir um cliente
**DELETE** `/api/clientes/delete`
- **Body**:
  ```json
  {
  "id_cliente": "ID do Cliente"
    }


## Endpoints para Agendamentos

### Listar todos os agendamentos
**GET** `/api/agendamentos`

### Criar um novo agendamento
**POST** `/api/agendamentos/create`
- **Body**:
  ```json
    {
  "id_cliente": "ID do Cliente",
  "data": "Data do Agendamento (YYYY-MM-DD)",
  "hora": "Hora do Agendamento (HH:MM:SS)",
  "servico": "Serviço Agendado",
  "duracao": "Duração em minutos"
    }

### Atualizar um agendamento
**PUT** `/api/agendamentos/update`
- **Body**:
  ```json
    {
  "id_agendamento": "ID do Agendamento",
  "id_cliente": "ID do Cliente",
  "data": "Nova Data",
  "hora": "Nova Hora",
  "servico": "Novo Serviço",
  "duracao": "Nova Duração"
    }

### Excluir um agendamento
**DELETE** `/api/agendamentos/delete`
- **Body**:
  ```json
    {
  "id_agendamento": "ID do Agendamento"
    }




