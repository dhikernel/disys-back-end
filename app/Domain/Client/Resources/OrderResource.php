<?php

namespace App\Domain\Client\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_id' => $this->id,
            'product_code' => $this->product_code,
            'order_client_code' => $this->client_code,
        ];
    }
}
