<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogDetailResource extends JsonResource
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
          'translate'    => $this->converting($this->translations),
          'translations' => $this->translations,
          'image'        => config('app.url').$this->image,
          'author'       => $this->author,
          'created_at'   => $this->created_at->format('d M, Y')
        ];
    }

    protected function converting($translations) {

      return collect($translations)->mapWithKeys(function ($item) {
          return [$item['locale'] => [
            'slug' => $item['slug']
            ]];
      })->all();
    }
}
