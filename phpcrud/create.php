<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $rrp = isset($_POST['rrp']) ? $_POST['rrp'] : '';
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
    $img = isset($_POST['img']) ? $_POST['img'] : '';
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO products VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $name, $price, $rrp, $quantity, $img]);
    // Output message
    $msg = 'Product entered successfully!';
    header('Location: ../phpcrud');
    exit;
}
?>

<?=template_header('Create')?>

<div class="content update">
	<h2>Create Product</h2>
    <form action="create.php" method="post">
      <label for="id">ID</label>
      <label for="name">Name</label>
      <input type="text" name="id" placeholder="auto" value="auto" id="id">
      <input type="text" name="name" placeholder="Assassin's Creed Ezio" id="name">
      <label for="price">Price</label>
      <label for="rrp">RRP</label>
      <input type="text" name="price" placeholder="100" id="price">
      <input type="text" name="rrp" placeholder="120" id="rrp">
      <label for="quantity">Quantity</label>
      <label for="img">File</label>
      <input type="text" name="quantity" placeholder="10" id="quantity">
      <input type="text" name="img" placeholder="ezio.jpg" id="img">
      <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
