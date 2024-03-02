<?php 

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface CategoryInterface
{
    public function GetAllCategory() : Collection;
}

?>