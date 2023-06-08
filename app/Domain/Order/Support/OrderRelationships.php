<?php

namespace App\Domain\Order\Support;

class OrderRelationships
{
    public function get(): array
    {
        return [
            'product',
        ];
    }
}
