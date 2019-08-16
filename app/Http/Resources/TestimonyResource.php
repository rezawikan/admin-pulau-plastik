<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestimonyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (empty($this->translate($request->locale)->position)) {
          return;
        }

        return [
          'id'          => $this->id,
          'name'        => $this->name,
          'position'    => $this->translate($request->locale)->position,
          'summary'     => $this->translate($request->locale)->summary
        ];
    }
}
