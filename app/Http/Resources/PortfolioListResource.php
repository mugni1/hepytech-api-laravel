<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'categori' => $this->categori,
            'image' => $this->image,
            'created_at' => $this->created_at->translatedFormat('l, j F Y - H:i'),
            'updated_at' => $this->updated_at->translatedFormat('l, j F Y - H:i'),
        ];
    }
}