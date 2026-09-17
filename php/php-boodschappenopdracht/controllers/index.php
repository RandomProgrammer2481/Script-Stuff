<?php

$config = require('config.php');

$db = new Database($config['database']);
$groceries = $db->query("SELECT * FROM groceries")->fetchAll();

$totalPrice = array_reduce(
    $groceries,
    function ($carry, $item) {
        return $carry + ($item['price'] * $item['quantity']);
    },
    0  //startwaarde van $carry
);

require "views/index.view.php";

