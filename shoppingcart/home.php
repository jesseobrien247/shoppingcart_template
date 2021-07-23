<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY name');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?= template_header('Home') ?>


    <div class="products">
        <?php foreach ($recently_added_products as $product) : ?>
            <a href="../shoppingcart/?page=product&id=<?= $product['id'] ?>" class="product">
                <img src="images/<?= $product['img'] ?>" width="200" height="200" alt="<?= $product['name'] ?>">
                <span class="name"><?= $product['name'] ?></span>
                <span class="price">
                    &dollar;<?= $product['price'] ?>
                    <?php if ($product['rrp'] > 0) : ?>
                        <span class="rrp">&dollar;<?= $product['rrp'] ?></span>
                    <?php endif; ?>
                </span>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?= template_footer() ?>