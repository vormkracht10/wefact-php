<?php

namespace Vormkracht10\WeFact\Resources;

class Product extends Resource
{
    final public const CONTROLLER_NAME = 'product';

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    public function getPluralResourceName(): string
    {
        return self::CONTROLLER_NAME.'s';
    }
}
