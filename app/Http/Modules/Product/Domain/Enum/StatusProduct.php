<?php

namespace App\Http\Modules\Product\Domain\Enum;

enum StatusProduct : string
{
    case Legal = 'legal';
    case Ilegal = 'ilegal';
}
