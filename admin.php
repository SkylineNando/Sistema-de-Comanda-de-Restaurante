<?php
require 'db_connect.php';

// Busca todos os pedidos
$sql = "SELECT p.id as pedido_id, p.data_pedido, p.total, i.quantidade, i.preco_unit, pr.nome as produto_nome
        FROM pedidos p
        JOIN pedido_itens i ON p.id = i.pedido_id
        JOIN produtos pr ON i.produto_id = pr.id
        ORDER BY p.data_pedido DESC";

$result = $conn->query($sql);

$pedidos = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pedidos[$row['pedido_id']]['data_pedido'] = $row['data_pedido'];
        $pedidos[$row['pedido_id']]['total'] = $row['total'];
        $pedidos[$row['pedido_id']]['itens'][] = [
            'produto_nome' => $row['produto_nome'],
            'quantidade' => $row['quantidade'],
            'preco_unit' => $row['preco_unit']
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Administração - Pedidos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Pedidos Realizados</h1>
<?php if (!empty($pedidos)): ?>
    <?php foreach($pedidos as $pedido_id => $info): ?>
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:20px;">
            <h2>Pedido #<?php echo $pedido_id; ?></h2>
            <p>Data: <?php echo $info['data_pedido']; ?></p>
            <ul>
                <?php foreach($info['itens'] as $item): ?>
                <li><?php echo htmlspecialchars($item['produto_nome']); ?> (x<?php echo $item['quantidade']; ?>) - R$ <?php echo number_format($item['quantidade']*$item['preco_unit'], 2, ',', '.'); ?></li>
                <?php endforeach; ?>
            </ul>
            <strong>Total: R$ <?php echo number_format($info['total'], 2, ',', '.'); ?></strong>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Nenhum pedido encontrado.</p>
<?php endif; ?>
</body>
</html>
