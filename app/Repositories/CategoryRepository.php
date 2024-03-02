<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryInterface
{

    
    public function GetAllCategory() : Collection
    {
        return Category::query()->with('product')->get();
    }
}
