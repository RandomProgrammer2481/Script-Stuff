<?php

$groceries = [
    "Rijst" => ["unit price" => 1.00, "quantity" => 0],
    "Broccoli" => ["unit price" => 0.99, "quantity" => 0],
    "Koekjes" => ["unit price" => 1.20, "quantity" => 0 ],
    "Noten" => ["unit price" => 2.99, "quantity" => 0]
];

$totalPrice = array_reduce(
    $groceries,
    function ($carry, $item) {
        return $carry + ($item['unit price'] * $item['quantity']);
    },
    0  //startwaarde van $carry
);

require "views/index.view.php";

?>