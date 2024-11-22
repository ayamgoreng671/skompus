<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    //define properti
    public $name;
    public $photo;
    public $resource;


    public function __construct($name, $photo, $resource)
    {
        parent::__construct($resource);
        $this->name  = $name;
        $this->photo = $photo;
    }
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
