<?php
require 'db_connect.php';

// Buscar produtos
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
$produtos = [];
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $produtos[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
    <title>Comanda do Restaurante</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h1>Cardápio</h1>
    <div class="cardapio">
        <?php foreach($produtos as $p): ?>
        <div class="item">
            <h2><?php echo htmlspecialchars($p['nome']); ?></h2>
            <p><?php echo htmlspecialchars($p['descricao']); ?></p>
            <p>Preço: R$ <?php echo number_format($p['preco'], 2, ',', '.'); ?></p>
            <button onclick="adicionarAoCarrinho(<?php echo $p['id']; ?>, '<?php echo htmlspecialchars($p['nome']); ?>', <?php echo $p['preco']; ?>)">Adicionar</button>
        </div>
        <?php endforeach; ?>
    </div>

    <h2>Sua Comanda</h2>
    <div id="carrinho"></div>
    <button id="finalizarBtn" onclick="finalizarPedido()">Finalizar Pedido</button>

    <script src="script.js"></script>
</body>
</html>
