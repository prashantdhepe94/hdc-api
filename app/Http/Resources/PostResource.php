<?php

namespace App\Http\Resources;


use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Route;

class PostResource extends JsonResource
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
            'post_category_id' => $this->post_category_id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'content' => $this->content,
            'published_at' => $this->published_at,
            'media_galleries' => $this->media_galleries, 
            'media_url' => file_exists('storage/'.$this->media_galleries) ? URL::to('storage/'.$this->media_galleries) : URL::to("storage/media_galleries/no-image.jpg"),
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
