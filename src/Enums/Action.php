<?php

namespace Vormkracht10\WeFact\Enums;

enum Action: string
{
    case LIST = 'list';
    case SHOW = 'show';
    case ADD = 'add';
    case EDIT = 'edit';
    case DELETE = 'delete';
    case COSTCATEGORY_LIST = 'costcategory_list';
    case COSTCATEGORY_SHOW = 'costcategory_show';
    case COSTCATEGORY_ADD = 'costcategory_add';
    case COSTCATEGORY_EDIT = 'costcategory_edit';
    case COSTCATEGORY_DELETE = 'costcategory_delete';
}
