<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InitiativeResource extends JsonResource
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
          'image'       => config('app.url').$this->image,
          'title'       => $this->translate($request->locale)->title,
          'summary'     => $this->translate($request->locale)->summary,
          'link'        => $this->link
        ];
    }
}
