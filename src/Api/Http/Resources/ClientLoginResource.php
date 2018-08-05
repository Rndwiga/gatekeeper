<?php
namespace Rndwiga\Authentication\Api\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ClientLoginResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => (integer)$this->id,
            'clientUid' => (string)$this->client_uid,
            'apiKey' => (string)$this->api_key,
            'clientFullName' => (string)$this->first_name . ' ' . $this->last_name,
            'clientFirstName' => (string)$this->first_name ? $this->first_name : "",
            'clientLastName' => (string)$this->last_name ? $this->last_name : "",
            'email' => (string)$this->email,

        ];
    }

/*    public function withResponse($request, $response)
    {
       // parent::withResponse($request, $response);
        $response->header('Cirembo Framework', true);
    }*/
}
