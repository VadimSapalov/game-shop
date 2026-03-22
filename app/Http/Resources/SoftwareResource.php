<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SoftwareResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request):array {
    return [
        'id' => $this->id,
        'title' => $this->Title,
        'content' => $this->Description,
        'price' => $this->Price,
        'discount' => $this->Discount,
        'release-date' => $this->ReleaseDate,
    ];
    }
}
