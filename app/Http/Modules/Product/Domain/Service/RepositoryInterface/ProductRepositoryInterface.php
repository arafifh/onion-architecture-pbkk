<?php

namespace App\Http\Modules\Product\Domain\Service\RepositoryInterface;

use App\Http\Modules\Product\Domain\Models\Product;

interface ProductRepositoryInterface {
    public function persist(Product $product);
}