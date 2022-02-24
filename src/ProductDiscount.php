<?php

namespace App;

class ProductDiscount {
    private $pcount;
    private $discount;

    public function __construct($pcount, $discount)
    {
        $this->pcount = $pcount;
        $this->discount      = $discount;
    }

    public function discountFor($count)
    {
        return $this->discount * intval($count / $this->pcount);
    }

    public function getProductsCount()
    {
        return $this->pcount;
    }
}