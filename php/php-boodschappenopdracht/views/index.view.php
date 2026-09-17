<?php require "partials/header.php"?>
<?php require "partials/nav.php"?>
<html>
<body>
    <div >
        <table id="groceryList">
            <thead>
                <th>Product</th>
                <th>Prijs</th>
                <th>Hoeveelheid</th>
                <th>Subtotaal</th>
            </thead>
            <tbody>
                <?php foreach ($groceries as $grocery => $details) : ?>
                    <tr>
                        <td><?=$details["name"]?></td>
                        <td class="price"><?=$details["price"]?></td>
                        <td><input  class="price type="number" name="amount" placeholder="<?=$details["quantity"]?>"></td>
                        <td class="price"><?=$details["price"] * $details["quantity"]?></td>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <td colspan="3"> Totaal prijs </td>
                    <td class="price"><?=$totalPrice?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>