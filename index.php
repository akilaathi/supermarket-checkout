<?php

require 'vendor/autoload.php';
use App\Checkout;
use App\ProductPrice;
use App\ProductDiscount;

// -------- Pricing Rules Static

$pricingRules = [
    'A' => new ProductPrice(50, new ProductDiscount(3, 20)),
    'B' => new ProductPrice(30, new ProductDiscount(2, 15)),
    'C' => new ProductPrice(20, [new ProductDiscount(2, 2),new ProductDiscount(3, 10)]),
    'D' => new ProductPrice(15),
    'E' => new ProductPrice(5),
];

 $checkout = new Checkout('CCC', $pricingRules);
var_dump($checkout->total()); 



