<?php

namespace Iacreative\ConsumeExternalService\Services\Traits;

use Illuminate\Support\Facades\Http;

trait CallService
{
    /**
     * Method for consuming endpoints
     *
     * @param string $endpoint
     * @param string $method
     * @param array $forParams
     * @param array $headers
     * @return Collection|Resource|null
     */
    public function requestApi(string $method, string $endpoint, array $forParams = [], array $headers = [])
    {
        return Http::withHeaders($this->setHeaders($headers))->$method($this->url . $endpoint, $forParams);
    }

    /**
     * Method to add standard headers to the received header
     *
     * @param array $headers
     * @return array
     */
    private function setHeaders($headers = [])
    {
        array_push($headers, [
            'Accept' => 'application/json',
            'Authorization' => $this->token,
        ]);

        return $headers;
    }
}
