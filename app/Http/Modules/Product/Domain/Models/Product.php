<?php

namespace App\Http\Modules\Product\Domain\Models;

use App\Http\Modules\Product\Domain\Enum\StatusProduct;

class Product
{
    public function __construct(
        private ?int $id,
        private string $name,
        private int $stok,
        private StatusProduct $status,
    ){}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStok(): string
    {
        return $this->stok;
    }

    public function getStatus(): StatusProduct
    {
        return $this->status;
    }
}
