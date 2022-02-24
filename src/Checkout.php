<?php

namespace App;

class Checkout {
    private $pRules = [];
    private $icnt  = [];
    private $iprice  = [];

    public function __construct($itemsStr, $pRules)
    {
        $this->pRules = $pRules;

        foreach ($this->pRules as $type => $productPrice) {
            $this->icnt[$type]  = substr_count($itemsStr, $type);
            $this->iprice[$type]  = $productPrice->priceFor($this->icnt[$type]);
        }
    }

    public function total()
    {
        return array_sum($this->iprice);
    }
}