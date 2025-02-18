<?php
require 'config.php';

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Boutique</title>
    <link rel="stylesheet" href="boutique.css">
</head>
<body>
    <h1>Nos Produits</h1>
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <h2><?php echo $product['name']; ?></h2>
                <p><?php echo $product['description']; ?></p>
                <p>Prix: <?php echo $product['price']; ?> €</p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
