<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ZalbeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'zalbe:';
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tip_problema' => $this->resource->tip_problema,
            'opis' => $this->resource->opis,
            'status' => $this->resource->status,
            'id_prvog_nivoa' => $this->resource->obradjivanPrviNivo,
            'id_drugog_nivoa' => $this->resource->obradjivanDrugiNivo
        ];
    }
}
