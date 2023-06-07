<?php

namespace Vormkracht10\WeFact\Enums;

enum Action: string
{
    case LIST = 'list';
    case SHOW = 'show';
    case ADD = 'add';
    case EDIT = 'edit';
    case DELETE = 'delete';
}
