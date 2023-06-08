<?php

namespace App\Domain\Client\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * @var mixed
     */

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
            'client_id' => $this->id,
            'client_name' => $this->name,
            'client_email' => $this->email,
            'client_phone' => $this->phone,
            'client_birth_date' => $this->birth_date,
            'client_address' => $this->address,
            'client_complement' => $this->complement,
            'client_neighborhood' => $this->neighborhood,
            'client_zip_code' => $this->zip_code,
            'order' => OrderResource::collection($this->whenLoaded('order')),
        ];
    }
}
