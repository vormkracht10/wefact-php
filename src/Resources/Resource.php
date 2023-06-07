<?php

namespace Vormkracht10\WeFact\Resources;

use GuzzleHttp\Client;
use Vormkracht10\WeFact\Enums\Action;
use Vormkracht10\WeFact\Traits\Request;

abstract class Resource
{
    use Request;
    
    public function __construct(
        protected Client $http,
    ){
        $this->http = $http;
    }

    public function list(array $parameters = []): array
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::LIST->value,
            params: $parameters
        );
    }

    public function show(int $id, array $params = []): array
    {
        $params['Identifier'] = $id;

        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::SHOW->value,
            params: $params
        );
    }

    public function create(array $params): array
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::ADD->value,
            params: $params
        );
    }

    public function edit(array $params): array
    {
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::EDIT->value,
            params: $params
        );
    }

    public function delete(int $id, array $params = []): array
    {
        $params['Identifier'] = $id;
        
        $controller = $this->getResourceName();

        return $this->sendRequest(
            controller: $controller,
            action: Action::DELETE->value,
            params: $params
        );
    }

    abstract public function getResourceName(): string;
}