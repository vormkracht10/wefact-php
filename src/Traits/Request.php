<?php

namespace Vormkracht10\WeFact\Traits;

use Vormkracht10\WeFact\Exceptions\InvalidRequestException;

trait Request
{
    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws InvalidRequestException
     */
    public function sendRequest(string $controller, string $action, array $params): array|InvalidRequestException
    {
        $params['api_key'] = $this->apiKey;
        $params['controller'] = $controller;
        $params['action'] = $action;

        $response = $this->http->post($this->apiUrl, [
            'form_params' => $params,
            'verify' => true, // Enable SSL verification (recommended for production)
        ]);

        $body = $response->getBody();
        $responseData = json_decode((string) $body, true, 512, JSON_THROW_ON_ERROR);

        if ($responseData['status'] === 'error') {
            $errors = implode(', ', $responseData['errors']);
            throw new InvalidRequestException($errors);
        }

        return $responseData;
    }
}
