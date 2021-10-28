<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MembersResource extends JsonResource
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
            'id' => $this->id,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'oname' => $this->oname,
            'idnum' => $this->idnum,
            'phonenum' => $this->phonenum,
            'dob' => $this->dob,
            'location' => $this->location,
            'mstatus' => $this->mstatus,
            'nok' => $this->nok,
            'email' => $this->email
        ];
    }
}
