<?php

namespace App\Bric\Repositories;

use App\Base\BaseRepository;
use App\Product;

class ProductRepository extends BaseRepository
{
    public function getModel(): Product
    {
        return new Product;
    }

}
