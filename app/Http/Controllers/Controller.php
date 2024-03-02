<?php

namespace App\Http\Controllers;

use App\Traits\HasPagination;
use App\Traits\HasPriceRange;
use App\Traits\HasSearch;
use App\Traits\HasSort;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, HasPagination, HasSearch, HasSort, HasPriceRange;

    protected $data = [];

    public function __construct()
    {
        
    }

    protected function loadTheme($view, $data = [])
    {
        return view('themes.' . env('APP_THEME', 'default') . '/' . $view , $data);
    }
}
