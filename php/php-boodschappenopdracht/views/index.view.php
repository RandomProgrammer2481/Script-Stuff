<?php require "partials/header.php"?>
<?php require "partials/nav.php"?>
<html>
<body>
    <div class="h-full border-2 border-gray-200 
                border-opacity-60 rounded-lg 
                overflow-hidden">
        <table id="groceryList">
            <thead>
                <th>Product</th>
                <th>Prijs</th>
                <th>Hoeveelheid</th>
                <th>Subtotaal</th>
            </thead>
            <?php foreach ($groceries as $grocery => $details) : ?>
                <tr>
                    <td><?=$grocery?></td>
                    <td><?=$details["unit price"]?></td>
                    <td><input type="number" name="amount" placeholder="<?=$details["quantity"]?>"></td>
                    <td><?=$details["unit price"] * $details["quantity"]?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="3"> Totaal prijs </td>
                <td><?=$totalPrice?></td>
            </tr>
        </table>
    </div>
</body>
</html>