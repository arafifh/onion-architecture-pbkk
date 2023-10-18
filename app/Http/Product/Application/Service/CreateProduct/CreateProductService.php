<?php

namespace App\Http\Product\Application\Service\CreateProduct;

use App\Http\Product\Domain\Models\Product;
use App\Http\Product\Application\Service\CreateProduct\CreateProductRequest;
use App\Http\Product\Domain\Service\RepositoryInterface\ProductRepositoryInterface;

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