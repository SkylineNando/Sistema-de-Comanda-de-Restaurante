let carrinho = [];

function adicionarAoCarrinho(id, nome, preco) {
    // Verifica se o produto já está no carrinho
    let existente = carrinho.find(item => item.id === id);
    if (existente) {
        existente.quantidade++;
    } else {
        carrinho.push({id, nome, preco, quantidade: 1});
    }
    renderCarrinho();
}

function renderCarrinho() {
    const container = document.getElementById('carrinho');
    container.innerHTML = '';
    let total = 0;

    carrinho.forEach((item, index) => {
        let itemDiv = document.createElement('div');
        let subtotal = item.quantidade * item.preco;
        total += subtotal;
        itemDiv.textContent = `${item.nome} (x${item.quantidade}) - R$ ${subtotal.toFixed(2)}`;
        
        let removeBtn = document.createElement('button');
        removeBtn.textContent = 'Remover';
        removeBtn.onclick = () => {
            removerDoCarrinho(item.id);
        };
        itemDiv.appendChild(removeBtn);
        container.appendChild(itemDiv);
    });

    let totalDiv = document.createElement('div');
    totalDiv.textContent = `Total: R$ ${total.toFixed(2)}`;
    container.appendChild(totalDiv);
}

function removerDoCarrinho(id) {
    carrinho = carrinho.filter(item => item.id !== id);
    renderCarrinho();
}

function finalizarPedido() {
    if (carrinho.length === 0) {
        alert('Carrinho vazio!');
        return;
    }

    // Envia o carrinho para o servidor via fetch (POST)
    fetch('process_order.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(carrinho)
    })
    .then(response => response.json())
    .then(data => {
        if (data.sucesso) {
            alert('Pedido finalizado com sucesso! ID do pedido: ' + data.pedido_id);
            carrinho = [];
            renderCarrinho();
        } else {
            alert('Ocorreu um erro ao finalizar o pedido.');
        }
    });
}
