<?php

namespace App\Http\Modules\Product\Presentation\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Modules\Product\Domain\Enum\StatusProduct;
use App\Http\Modules\Product\Application\Service\CreateProduct\CreateProductRequest;
use App\Http\Modules\Product\Application\Service\CreateProduct\CreateProductService;

class ProductController extends Controller {
    public function __construct(
        private CreateProductService $createProductService
    ){}

    public function createProduct(Request $request, CreateProductService $service): JsonResponse {
        $input = new CreateProductRequest(
            $request->input('name'),
            $request->input('stok'),
            StatusProduct::tryFrom($request->input('status')),
        );

        DB::beginTransaction();
        try {
            $service->execute($input);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();
        return $this->success();

        // return $this->executeService($this->createProductService, $request);

    }
}