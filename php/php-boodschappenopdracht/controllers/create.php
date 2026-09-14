<?php

$config = require('config.php');

$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $db->query("INSERT INTO groceries(name, price, quantity) VALUES(:name, :price, :quantity)", [
        "name" => $_POST["name"],
        "price" => $_POST["price"],
        "quantity" => $_POST["quantity"],
    ]);
}

require "views/create.view.php";