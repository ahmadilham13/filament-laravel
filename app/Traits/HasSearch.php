<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait HasSearch
{
    protected string $search = '';

    protected function setSearch(Request $request)
    {
        $this->search = $request->query('search') ?? '';
    }
}
