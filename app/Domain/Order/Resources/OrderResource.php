<?php

namespace App\Domain\Order\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'client_code' => $this->client_code,
            'product_code' => $this->product_code,
            'creation_date' => Carbon::parse(optional($this)->created_at)->format('Y-m-d H:i:s'),
            'product' => ProductResource::collection($this->whenLoaded('product')),

        ];
    }
}
