<?php

namespace App\Http\Controllers\Product;

use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends BaseController
{
    
    public function __construct(CategoryInterface $category, ProductInterface $product)
    {
        parent::__construct($category, $product);

        $this->setSortChoices([
            'created_at-asc' => 'Oldest',
            'created_at-desc' => 'Newest',
            'name-desc' => 'Z-A',
            'name-asc' => 'A-Z',
        ]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->setSearch($request);
        $this->setPagination($request);
        $this->setSort($request);

        $categoryRequest = $request->query('category') ?? '';

        $categories = $this->category->GetAllCategory();
        $products = $this->product->GetPaginatedProduct(
            search: $this->search,
            sortBy: $this->sortBy,
            sortDirection: $this->sortDirection,
            perPage: $this->pageSize,
            currentPage: $this->page,
            categoryId: $categoryRequest
        );
        return $this->loadTheme('product.index', [
            'categories'    => $categories,
            'products'      => $products,
            'search'        => $this->search,
            'sortChoices'   => $this->sortChoices,
            'sortBy'        => $this->sortBy . '-' . $this->sortDirection,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
