<?php 

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ProductInterface
{
    public function GetPaginatedProduct(string $search, string $sortBy, string $sortDirection, int $perPage = 10, int $currentPage = 1, string $categoryId) : LengthAwarePaginator;
}

?>