<?php require "partials/header.php"?>
<?php require "partials/nav.php"?>
<html>
    <body>
        <form  method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter product name..." pattern="^[A-Za-z\s]*$" 
            required value="<?= $_POST["name"] ?? '' ?>">
            <p class="error"><?=$errors["name"] ?? ''?></p>
            </br>
            <label for="price">Price</label>
            <input type="number" name="price" step="0.00001" id="price" placeholder="0" required value="<?= $_POST["price"] ?? '' ?>">
            <p class="error"><?=$errors["price"] ?? ''?></p>
            </br>
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" placeholder="0" required value="<?= $_POST["quantity"] ?? '' ?>">
            <p class="error"><?=$errors["quantity"] ?? ''?></p>
            </br>
            <p>
                <button type="submit">Create</button>
            </p>
        </form>
    </body>
</html>