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

        $this->apiUrl = config(sprintf('autum.%s.endpoints.accounts', config('app.env', 'local')));
    }


    /**
     * @var string
     */
    protected $resource = 'user';

    public function account()
    {
        $response = $this->sendRequest('get', 'api/account', []);

        return $this->response($response);
    }

    public function checkPassword($password)
    {
        $response = $this->sendRequest('post', 'api/account/check-password', [
            'form_params' => [
                'password' => $password
            ]
        ]);

        return $response->ok();
    }

    public function profile()
    {
        $response = $this->sendRequest('get', $this->resource . '/profile', []);

        return $this->response($response);
    }
    

}
