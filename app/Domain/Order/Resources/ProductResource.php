<?php

namespace App\Domain\Order\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'product_id' => $this->id,
            'product_code' => $this->code,
            'product_name' => $this->name,
            'product_price' => $this->price,
            'product_photo' => $this->photo,
        ];
    }
}
