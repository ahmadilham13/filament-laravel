<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;

class BaseController extends Controller
{
    public function __construct(protected CategoryInterface $category, protected ProductInterface $product) {
    }
}
