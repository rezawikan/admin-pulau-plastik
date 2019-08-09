<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id'          => $this->id,
          'image'       => config('app.url').$this->image,
          'title'       => $this->translate($request->locale)->title,
          'slug'        => $this->translate($request->locale)->slug,
          'author'      => $this->author->name,
          'created_at'  => $this->created_at->format('d M, Y')
        ];
    }
}
