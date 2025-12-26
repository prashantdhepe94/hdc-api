<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Route;

class StaffResource extends JsonResource
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
            'school_type_id' => $this->school_type_id,
            'staff_type_id' => $this->staff_type_id,
            'school_type' => $this->school_type ?? $this->school_type_id,
            'staff_type' => $this->staff_type ?? $this->staff_type_id,
            'name' => $this->name,
            'mobile_no' => $this->mobile_no,
            'address' => $this->address,
            'qualification' => $this->qualification,
            'teaching_as' => $this->teaching_as,
            'date_of_joining' => $this->date_of_joining,
            'is_salaried' => $this->is_salaried,
            'photo' => $this->photo,
            'photo_url' => file_exists('storage/'.$this->photo) ? URL::to('storage/'.$this->photo) : URL::to("storage/staff_photos/no-image.jpg"),
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
