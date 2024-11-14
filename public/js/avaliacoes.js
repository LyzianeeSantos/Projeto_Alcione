// avaliacoes.js

// Função para renderizar as avaliações salvas
function renderAvaliacoes() {
    const avaliacoesLista = document.getElementById('avaliacoes-lista');
    const avaliacoes = JSON.parse(localStorage.getItem('avaliacoes')) || [];

    avaliacoesLista.innerHTML = '';

    avaliacoes.forEach(avaliacao => {
        const avaliacaoDiv = document.createElement('div');
        avaliacaoDiv.classList.add('avaliacao');

        avaliacaoDiv.innerHTML = `
            <h3>${avaliacao.nome}</h3>
            <div class="estrelas">${'<i class="fas fa-star"></i>'.repeat(avaliacao.estrelas)}</div>
            <p>"${avaliacao.comentario}"</p>
        `;

        avaliacoesLista.appendChild(avaliacaoDiv);
    });
}

// Função para adicionar nova avaliação
document.getElementById('avaliacao-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const nome = document.getElementById('nome').value;
    const estrelas = parseInt(document.getElementById('estrelas').value);
    const comentario = document.getElementById('comentario').value;

    const novaAvaliacao = { nome, estrelas, comentario };

    let avaliacoes = JSON.parse(localStorage.getItem('avaliacoes')) || [];
    avaliacoes.push(novaAvaliacao);
    localStorage.setItem('avaliacoes', JSON.stringify(avaliacoes));

    renderAvaliacoes();
    this.reset();
});

// Carregar as avaliações ao iniciar a página
document.addEventListener('DOMContentLoaded', renderAvaliacoes);
