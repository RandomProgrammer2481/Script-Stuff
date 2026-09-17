<?php
require 'Validator.php';
$config = require('config.php');

$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $errors = [];

    if (! Validator::string($_POST["name"], 1, 256)) {
        $errors["name"] = "*A name of no more than 256 characters is required";
    }

    if (! Validator::decimal($_POST["price"], 0, 2)) {
        $errors["price"] = "*Price should not have more than 2 decimals";
    }

    if (! Validator::integer($_POST["price"], 0, INF)) {
        $errors["price"] = "*Price should be greater than zero";
    }

    if (! Validator::integer($_POST["quantity"], 1, INF)) {
        $errors["quantity"] = "*Quantity should be greater than zero";
    }


    
    if (empty($errors)) {
        $db->query("INSERT INTO groceries(name, price, quantity) VALUES(:name, :price, :quantity)", [
        "name" => htmlspecialchars($_POST["name"]),
        "price" => htmlspecialchars($_POST["price"]),
        "quantity" => htmlspecialchars($_POST["quantity"]),
        ]);
        header("Location: /");
    } 
}

require "views/create.view.php";