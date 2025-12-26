<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StandardsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'school_type' => $this->school_type->name,
            'user_id' => $this->user_id,
            'std' => $this->std,
            'section_name' => $this->section_name,
            'strength' => $this->strength,
            'image' => $this->image,
            
        ];
    }
}
