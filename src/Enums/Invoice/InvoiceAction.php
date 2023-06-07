<?php

namespace Vormkracht10\WeFact\Enums\Invoice;

enum InvoiceAction: string
{
    case CREDIT = 'credit';
    case PART_PAYMENT = 'partpayment';
    case MARK_AS_PAID = 'markaspaid';
    case MARK_AS_UNPAID = 'markasunpaid';
    case SEND_BY_EMAIL = 'sendbyemail';
    case SEND_REMINDER_BY_EMAIL = 'sendreminderbyemail';
    case SEND_SUMMATION_BY_EMAIL = 'sendsummationbyemail';
    case DOWNLOAD = 'download';
    case BLOCK = 'block';
    case UNBLOCK = 'unblock';
    case SCHEDULE = 'schedule';
    case CANCEL_SCHEDULE = 'cancelschedule';
    case PAYMENT_PROCESS_PAUSE = 'paymentprocesspause';
    case PAYMENT_PROCESS_REACTIVATE = 'paymentprocessreactivate';
    case SORT_LINES = 'sortlines';
    case INVOICE_LINE_ADD = 'invoicelineadd';
    case INVOICE_LINE_DELETE = 'invoicelinedelete';
    case ATTACHMENT_ADD = 'attachmentadd';
    case ATTACHMENT_DELETE = 'attachmentdelete';
    case ATTACHMENT_DOWNLOAD = 'attachmentdownload';
}
