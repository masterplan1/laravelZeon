<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return $this->getMx2Frequency;
        return [
            'id' => $this->id,
            'name' => $this->gerNumberAndName(),
            'ip' => $this->base_ip,
            'district' => $this->district->name,
            'ip_s_octet' => $this->district->ip_second_octet,
            'region' => $this->region(),
            'params' => $this->params,
            'provider_id' => $this->provider_id,
            'status' => $this->status,
            'mx1_frequency' => [$this->getMx1Frequency[0], 1],
            'mx2_frequency' => [$this->getMx2Frequency[0] ?? null, 2],
            'mx3_frequency' => [$this->getMx3Frequency[0] ?? null, 3],
            'mx5_frequency' => [$this->getMx5Frequency[0] ?? null, 5]
        ];
    }
}
