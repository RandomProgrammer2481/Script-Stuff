<?php

$config = require('config.php');

$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $db->query("INSERT INTO groceries(name, price, quantity) VALUES(:name, :price, :quantity)", [
        "name" => htmlspecialchars($_POST["name"]),
        "price" => htmlspecialchars($_POST["price"]),
        "quantity" => htmlspecialchars($_POST["quantity"]),
    ]);
    header("Location: /");
}

require "views/create.view.php";