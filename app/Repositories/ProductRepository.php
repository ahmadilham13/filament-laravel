<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class ProductRepository implements ProductInterface
{
    public function GetPaginatedProduct(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1, string $categoryId, array $priceRange): LengthAwarePaginator
    {
        return Product::query()
            ->when(! empty($search), fn (Builder $query) => $query->where('slug', 'like', str_replace(' ', '-', strtolower($search)) . '%'))
            ->when(! empty($sortBy) && ! empty($sortDirection), fn (Builder $query) => $query->orderBy($sortBy, $sortDirection))
            // ->when(empty($sortBy) && empty($sortDirection), fn (Builder $query) => $query->latest())
            ->when(!empty($priceRange), fn (Builder $query) => $query->where('price', '>=', $priceRange['min'])->where('price', '<=', $priceRange['max']))
            ->when(!empty($categoryId), fn (Builder $query) => $query->where('category_id', $categoryId))
            ->paginate();
    }
}
