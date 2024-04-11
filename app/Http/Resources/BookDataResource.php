<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookDataResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'book_unique_id' => $this->book_uniq_id,
            'name' => $this->name,
            'content_owner' => $this->contentOwner->name,
            'publisher' => $this->publisher->name,
            'cover_photo' => asset('images/books/'.$this->cover_photo),
            'created_at' => $this->created_at,
        ];
    }
}
