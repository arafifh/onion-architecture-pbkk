<?php

namespace App\Http\Modules\Product\Application\Service\CreateProduct;

use App\Http\Modules\Product\Domain\Enum\StatusProduct;

class CreateProductRequest {
    public function __construct(
        private string $name,
        private int $stok,
        private StatusProduct $status,
    ){}

    public function getName(): string {
        return $this->name;
    }

    public function getStok(): int {
        return $this->stok;
    }

    public function getStatus(): StatusProduct {
        return $this->status;
    }
}