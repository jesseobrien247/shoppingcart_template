<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the product id exists, for example update.php?id=1 will get the product with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $rrp = isset($_POST['rrp']) ? $_POST['rrp'] : '';
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
        $img = isset($_POST['img']) ? $_POST['img'] : '';
        // Update the record
        $stmt = $pdo->prepare('UPDATE products SET id = ?, name = ?, price = ?, rrp = ?, quantity = ?, img = ? WHERE id = ?');
        $stmt->execute([$id, $name, $price, $rrp, $quantity, $img, $_GET['id']]);
        $msg = 'Updated Successfully!';
        header('Location: ../phpcrud');
        exit;
    }
    // Get the product from the products table
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$product) {
        exit('product doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Update')?>

<div class="content update">
	<h2>Update product #<?=$product['id']?></h2>
    <form action="update.php?id=<?=$product['id']?>" method="post">
        <label for="id">ID</label>
        <label for="name">Name</label>
        <input type="text" name="id" placeholder="1" value="<?=$product['id']?>" id="id">
        <input type="text" name="name" placeholder="Assassin's Creed Ezio" value="<?=$product['name']?>" id="name">
        <label for="price">Price</label>
        <label for="rrp">RRP</label>
        <input type="text" name="price" placeholder="$100" value="<?=$product['price']?>" id="price">
        <input type="text" name="rrp" placeholder="$120" value="<?=$product['rrp']?>" id="rrp">
        <label for="quantity">Quantity</label>
        <label for="img">File</label>
        <input type="text" name="quantity" placeholder="10" value="<?=$product['quantity']?>" id="quantity">
        <input type="text" name="img" placeholder="ezio.jpg" value="<?=$product['img']?>" id="img">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
