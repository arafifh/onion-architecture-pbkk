<?php

namespace App\Http\Product\Presentation\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Product\Domain\Enum\StatusProduct;
use App\Http\Product\Application\Service\CreateProduct\CreateProductRequest;
use App\Http\Product\Application\Service\CreateProduct\CreateProductService;

class ProductController extends Controller {
    public function __construct(
        private CreateProductService $createProductService
    ){}

    public function createProduct(Request $request) {
        $request = new CreateProductRequest(
            $request->input('name'),
            $request->input('stok'),
            StatusProduct::tryFrom($request->input('status')),
        );

        return $this->executeService($this->createProductService, $request);
    }
}