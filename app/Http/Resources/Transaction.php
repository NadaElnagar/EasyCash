<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Transaction extends JsonResource
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
            "id"=> $this->id,
            "amount"=>  $this->amount,
            "currency"=> $this->currency,
            "status"=> $this->status,
            "phone"=>$this->phone,
            "provider"=>$this->provider,
            "created_at"=>$this->created_at,
        ];
    }
}
