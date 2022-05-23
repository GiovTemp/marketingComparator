<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstimateRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'iva' => $this->iva,
            'cf' => $this->cf,
            'email' => $this->email,
            'results' => $this->results,
            'name_promo' => $this->name_promo,
            'created_at' => $this->created_at->toFormattedDateString()
        ];
    }
}
