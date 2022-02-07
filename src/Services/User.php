<?php

namespace Autum\SDK\Services;

use App\Models\Request;
use Autum\SAML\Client;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class User extends Client
{

    /**
     * @var string
     */
    protected $resource = 'user';

    public function profile()
    {
        $response = $this->sendRequest('get', $this->resourcePath($this->resource), []);

        return $this->response($response);
    }
    

}
