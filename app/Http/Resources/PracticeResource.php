<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PracticeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "name" => $this->name,
            "email" => $this->email ?? null,
            "website_url" => $this->website_url ?? null,
            "employees" => EmployeeResource::collection($this->employees),
            "fields_of_practice" => FieldResource::collection($this->fields)
        ];
    }
}
