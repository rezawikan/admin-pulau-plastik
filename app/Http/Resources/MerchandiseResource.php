<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MerchandiseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (empty($this->translate($request->locale)->name)) {
          return;
        }

        return [
          'name'      => $this->translate($request->locale)->name,
          'summary'   => $this->translate($request->locale)->summary,
          'price'     => $this->translate($request->locale)->price,
          'image'     => config('app.url'). $this->image
        ];
    }
}
