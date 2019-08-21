<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
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
          'title'     => $this->translate($request->locale)->title,
          'summary'   => $this->translate($request->locale)->summary,
          'content'   => $this->translate($request->locale)->content,
          'image'     => config('app.url'). $this->image
        ];
    }
}
