<?php

namespace App\Http\Modules\Product\Infrastructure\Repository;

use Illuminate\Support\Facades\DB;
use App\Http\Modules\Product\Domain\Models\Product;
use App\Http\Modules\Product\Domain\Service\RepositoryInterface\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function persist(Product $product) {
        $data = $this->createPayload($product);
        DB::table('products')->upsert(
            $data,
            'id'
        );
    }

    public function getById(int $topik_id): ?Product
    {
        // TODO: Implement getById() method.
    }

    private function createPayload(Product $product)
    {
        return [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'stok' => $product->getStok(),
            'status' => $product->getStatus()->value,
        ];
    }
}
