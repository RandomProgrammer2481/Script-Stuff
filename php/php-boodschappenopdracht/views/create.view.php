<?php require "partials/header.php"?>
<?php require "partials/nav.php"?>
<html>
    <body>
        <form  method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter product name..." pattern="^[A-Za-z\s]*$"> 
            </br>
            <label for="price">Price</label>
            <input type="number" name="price" id="price" placeholder="0">
            </br>
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" placeholder="0"> 
            <br>
            <p>
                <button type="submit">Create</button>
            </p>
        </form>
    </body>
</html>