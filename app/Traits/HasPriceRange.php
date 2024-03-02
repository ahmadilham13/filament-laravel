<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait HasPriceRange
{
    protected int $price_min = 0;
    protected int $price_max = 10000;
    protected array $priceRange = array();

    protected function setPriceRange(Request $request)
    {
        $this->priceRange = $this->getPriceRangeFilter($request);
    }

    private function getPriceRangeFilter($request)
    {
        if (!$request->get('price')) {
            return [];
        }

        $prices = explode(' - ', $request->get('price'));
        if (count($prices) < 0) {
            return $this->defaultPriceRange;
        }

        $this->price_min = $prices[0];
        $this->price_max = $prices[1];

        return [
            'min' => (int) $prices[0],
            'max' => (int) $prices[1],
        ];
    }
}
