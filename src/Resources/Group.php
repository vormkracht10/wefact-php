<?php

namespace Vormkracht10\WeFact\Resources;

class Group extends Resource
{
    final public const CONTROLLER_NAME = 'group';

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    public function getPluralResourceName(): string
    {
        return self::CONTROLLER_NAME.'s';
    }
}
