<?php

namespace App;

class ProductPrice {
    private $sPrice;
    private $discnts;

    public function __construct($sPrice, $discnts = [])
    {
        $this->sPrice = $sPrice;

        $this->discnts =
            $discnts instanceof ProductDiscount ?
            [$discnts] : $discnts;
    }

    public function priceFor($count)
    {
        $discount = $this->_getDiscountByCount($count);
        $price    = $count * $this->sPrice;

        if ($discount)
            $price -= $discount->discountFor($count);

        return $price;
    }

    protected function _getDiscountByCount($count)
    {
        $memoDiscount = null;

        foreach ($this->discnts as $discount) {
            if ($count >= $discount->getProductsCount()) {
                $memoDiscount = $discount;
            }
        }

        return $memoDiscount;
    }
}
