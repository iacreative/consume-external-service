<?php

namespace Iacreative\ConsumeExternalService\Services\Http;

use Iacreative\ConsumeExternalService\Services\Traits\CallService;

class ConsumeExternalService
{
    protected $token;
    protected $url;
    protected $resource = '/your_resource';

    use CallService;

    /**
     * Recebendo os recursos para acesso ao end-point
     */
    public function __construct()
    {
        $this->token = "INSERT_ENV_TOKEN_AUTHORIZATION";
        $this->url = "https://yourapplication.com";
    }

    /**
     * Get from External Service your resource
     *
     * @param string $company
     * @return Illuminate\Http\Client\Response
     */
    public function getResource(string $resource)
    {
        $response = $this->requestApi('get', $this->resource . "/{$resource}");
        return $response;
    }
}
