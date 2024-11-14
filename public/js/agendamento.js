// agendamento.js

document.querySelector(".agendamento-form").addEventListener("submit", function (e) {
    e.preventDefault();

    // Captura os valores dos campos de entrada
    const service = document.querySelector("#service").value;
    const date = document.querySelector("#date").value;
    const time = document.querySelector("#time").value;

    // Validação simples
    if (service && date && time) {
        alert(`Agendamento confirmado para ${service} em ${date} às ${time}.`);
    } else {
        alert("Por favor, preencha todos os campos.");
    }
});
