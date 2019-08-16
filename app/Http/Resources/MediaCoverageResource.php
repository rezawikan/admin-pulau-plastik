<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaCoverageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (empty($this->translate($request->locale)->title)) {
          return;
        }
        
        return [
          'id'          => $this->id,
          'image'       => config('app.url'). $this->media->image,
          'title'       => $this->translate($request->locale)->title,
          'summary'     => $this->translate($request->locale)->summary,
          'link'        => $this->link,
          'created_at'  => $this->created_at->format('d M, Y')
        ];
    }
}
