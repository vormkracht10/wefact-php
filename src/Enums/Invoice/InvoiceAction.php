<?php

namespace Vormkracht10\WeFact\Enums\Invoice;

enum InvoiceAction: string
{
    case MARK_AS_PAID     = 'markaspaid';
    case MARK_AS_UNPAID   = 'markasunpaid';
}
