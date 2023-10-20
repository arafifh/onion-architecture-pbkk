<?php

use Illuminate\Support\Facades\Route;
use App\Http\Modules\Product\Presentation\Controller\ProductController;

Route::prefix('product')->group(function () {
    Route::post('create', [ProductController::class, 'createProduct']);
});