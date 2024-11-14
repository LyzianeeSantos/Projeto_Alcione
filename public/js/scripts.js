// scripts.js

document.getElementById("agendamentoForm").addEventListener("submit", function (e) {
    e.preventDefault();
    
    const servico = document.getElementById("servico").value;
    const data = document.getElementById("data").value;
    const hora = document.getElementById("hora").value;
    
    fetch("/api/agendamentos/create", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ servico, data, hora }),
    })
    .then(response => response.json())
    .then(data => {
        alert("Agendamento realizado com sucesso!");
    })
    .catch(error => {
        alert("Erro ao realizar agendamento.");
    });
});
