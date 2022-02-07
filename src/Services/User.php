<?php

namespace Autum\SDK\Services;

use App\Models\Request;
use Autum\SDK\Client;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class User extends Client
{

    public function __construct()
    {
        parent::__construct();

        $this->apiUrl = config(sprintf('autum.%.endpoints.accounts', config('app.env', 'local')));
    }


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
