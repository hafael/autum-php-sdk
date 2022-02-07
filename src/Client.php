<?php

namespace Autum\SDK;

use App\Models\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Client
{

    /**
     * @var string
     */
    protected $apiKey;
    
    /**
     * @var string
     */
    protected $apiUrl;


    public function __construct()
    {
        $this->apiUrl = config(sprintf('autum.%.endpoints.accounts', config('app.env', 'local')));
        $this->apiKey = config(sprintf('autum.%.api_key', config('app.env', 'local')));
    }

    /**
     * Get API URL.
     *
     * @return string
     */
    public function apiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * Get API Key.
     *
     * @return bool
     */
    public function apiKey()
    {
        return $this->apiKey;
    }

    /**
     * Resource Path.
     *
     * @return string
     */
    protected function resourcePath($path)
    {
        return $this->apiUrl() . '/' . $path;
    }

    protected function sendRequest($method, $url, $options, $headers = [])
    {
        
        $response =  Http::baseUrl($this->apiUrl())
                            ->withHeaders(array_merge([
                                'Authorization' => 'Bearer ' . $this->apiKey()
                            ], $headers))
                            ->send($method, $url, $options);

        return $response;
    }
    
    protected function response(Response $response)
    {
        
        if($response->serverError() || $response->clientError()) {
            Log::error(class_basename($this) .': ' . $response->status() . ' - Request error!');
            return false;
        }

        if(!$response->successful())
        {
            Log::error(class_basename($this) .': ' . $response->status() . ' - Undefined error!');
            return false;
        }

        return $this->parseResponse($response);

    }

    protected function parseResponse(Response $response)
    {
        
        return $response->json();
    }

}
