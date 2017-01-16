<html>
<?php include 'core/init.php';
protect_page();
?>
<?php
$role = $user_data['role'];
if ($role=="admin") {
    ?>
    <?php
}elseif ($role=="deo"){
}?>
<head>
    <link rel="stylesheet" href="css/select1.css" type="text/css">
</head>
<body>
<div class="inventory">
    <h1 id="im-name">Inventory Management</h1>
    <div class="inventory-mgt">
        <a href="InventoryManager/inventory.php">
            <img src="img/inventory.png">
        </a>
    </div>
</div>
<div class="warranty">
    <a class="mainLG" href="login.php">Logout</a>
    <h1 id="wm-name">Warranty Management</h1>
    <div class="warranty-mgt">
        <a href="WarrantyManager/enterDefect.php">
        <img src="img/warranty.png">
        </a>
    </div>
</div>
</body>
</html>