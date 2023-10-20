<?php

namespace App\Http\Modules\Product\Application\Service\CreateProduct;

use App\Http\Modules\Product\Domain\Models\Product;
use App\Http\Modules\Product\Application\Service\CreateProduct\CreateProductRequest;
use App\Http\Modules\Product\Domain\Service\RepositoryInterface\ProductRepositoryInterface;

class CreateProductService {
    public function __construct(
        private ProductRepositoryInterface $productRepositoryInterface
    ){}

    public function execute(CreateProductRequest $request) {
        $product = new Product(
            null,
            $request->getName(),
            $request->getStok(),
            $request->getStatus(),
        );

        $this->productRepositoryInterface->persist($product);
    }
}