<?php

namespace Vormkracht10\WeFact\Traits;

use Psr\Http\Message\ResponseInterface;

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

        return $this->parseResponse($response);
    }

    /**
     * @return array<string, mixed>
     *
     * @throws \GuzzleHttp\Exception\ClientException;
     * @throws \GuzzleHttp\Exception\ServerException;
     * @throws \JsonException;
     * @throws \GuzzleHttp\Exception\BadResponseException;
     */
    public function parseResponse(ResponseInterface $response): array
    {
        $body = $response->getBody();
        $responseData = json_decode((string) $body, true, 512, JSON_THROW_ON_ERROR);

        return $responseData;
    }
}
