<?php

namespace Vormkracht10\WeFact\Traits;

trait Request
{
    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     */
    public function sendRequest(string $controller, string $action, array $params): array
    {
        $params['api_key'] = $this->apiKey;
        $params['controller'] = $controller;
        $params['action'] = $action;

        $response = $this->http->post($this->apiUrl, [
            'form_params' => $params,
            'verify' => true, // Enable SSL verification (recommended for production)
        ]);

        $body = $response->getBody();
        $responseData = json_decode($body, true);

        return $responseData;
    }
}
