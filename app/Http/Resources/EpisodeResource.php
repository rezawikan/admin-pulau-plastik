<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeResource extends JsonResource
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
          'id'       => $this->id,
          'order'    => $this->order,
          'title'    => $this->translate($request->locale)->title,
          'summary'  => $this->translate($request->locale)->summary
        ];
    }
}
