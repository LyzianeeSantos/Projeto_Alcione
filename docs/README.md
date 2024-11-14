# Projeto Alcione

Este projeto é um sistema de **agendamento** e uma **página de apresentação** desenvolvida para expor as profissões e serviços oferecidos pela Alcione. Ele visa facilitar a gestão dos agendamentos e proporcionar uma interface informativa sobre sua carreira e serviços.

---

## Funcionalidades

### Front-end
O front-end será responsável pela interface e experiência do usuário. As principais páginas incluem:

- **Página de Apresentação**: informações sobre a carreira, experiência, e certificações.
  - Local de atendimento.
  - Contato.
- **Página de Serviços**: detalhamento de serviços oferecidos, incluindo depilação, cone hindu, auriculoterapia, acupuntura, medicina chinesa e aromaterapia.
  - Tabela de preços para cada serviço.
- **Página de Avaliações**: espaço para clientes deixarem relatos e avaliações.
- **Página de Agendamento**: interface de agendamento com opção de escolha de serviço, data e horário.

**Outros recursos**
- Criação de uma logo marca personalizada.

### Back-end
O back-end será responsável pela lógica de agendamento e armazenamento de dados. Principais funcionalidades:

- **Sistema de Agendamento**
  - Calendário disponível de segunda a sábado.
  - Exibição de datas e horários disponíveis.
  - Escolha de serviço, com duração estimada automática.
  - Registro de serviço, data e horário no banco de dados MySQL.

## Tecnologias Utilizadas

- **Front-end**: HTML, CSS, JavaScript.
- **Back-end**: PHP puro.
- **Banco de Dados**: MySQL.
- **Ferramentas e Configurações**:
  - Composer para gerenciamento de dependências.
  - PHPUnit para testes.

## Estrutura do Banco de Dados

- Criação de um diagrama ER para os CRUDs principais, definindo as tabelas, relacionamentos e tipos de dados.

---

## Diagrama ER (Entidade-Relacionamento)

Abaixo está o diagrama ER para os dois CRUDs principais (Clientes e Agendamentos), detalhando as tabelas, relacionamentos e tipos de dados.

![Diagrama ER do Projeto](https://github.com/LyzianeeSantos/Projeto_Alcione/blob/58966908b0d8075dbfb793ccd1c187ff3e27a320/DigramaER.drawio.png)s

---

