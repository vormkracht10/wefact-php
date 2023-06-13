<?php

namespace Vormkracht10\WeFact\Resources;

use GuzzleHttp\Client;
use \JsonException;
use Vormkracht10\WeFact\Enums\Invoice\InvoiceAction;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\BadResponseException;

class Invoice extends Resource
{
    final public const CONTROLLER_NAME = 'invoice';

    public function __construct(
        protected Client $http,
        protected string $apiKey,
        protected string $apiUrl
    ) {
        $this->http = $http;
    }

    public function getResourceName(): string
    {
        return self::CONTROLLER_NAME;
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     */
    public function send(string $action, array $params): array
    {
        return parent::sendRequest(
            controller: $this->getResourceName(),
            action: $action,
            params: $params
        );
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function credit(array $params = []): array
    {
        return $this->send(action: InvoiceAction::CREDIT->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function partPayment(array $params = []): array
    {
        return $this->send(action: InvoiceAction::PART_PAYMENT->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function markAsPaid(array $params = []): array
    {
        return $this->send(action: InvoiceAction::MARK_AS_PAID->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function markAsUnpaid(array $params = []): array
    {
        return $this->send(action: InvoiceAction::MARK_AS_UNPAID->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function sendByEmail(array $params = []): array
    {
        return $this->send(action: InvoiceAction::SEND_BY_EMAIL->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function sendReminderByEmail(array $params = []): array
    {
        return $this->send(action: InvoiceAction::SEND_REMINDER_BY_EMAIL->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function sendSummationByEmail(array $params = []): array
    {
        return $this->send(action: InvoiceAction::SEND_SUMMATION_BY_EMAIL->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function download(array $params = []): array
    {
        return $this->send(action: InvoiceAction::DOWNLOAD->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function block(array $params = []): array
    {
        return $this->send(action: InvoiceAction::BLOCK->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function unblock(array $params = []): array
    {
        return $this->send(action: InvoiceAction::UNBLOCK->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function schedule(array $params = []): array
    {
        return $this->send(action: InvoiceAction::SCHEDULE->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function cancelSchedule(array $params = []): array
    {
        return $this->send(action: InvoiceAction::CANCEL_SCHEDULE->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function paymentProcessPause(array $params = []): array
    {
        return $this->send(action: InvoiceAction::PAYMENT_PROCESS_PAUSE->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function paymentProcessReactivate(array $params = []): array
    {
        return $this->send(action: InvoiceAction::PAYMENT_PROCESS_REACTIVATE->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function sortLines(array $params = []): array
    {
        return $this->send(action: InvoiceAction::SORT_LINES->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function invoiceLineAdd(array $params = []): array
    {
        return $this->send(action: InvoiceAction::INVOICE_LINE_ADD->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function invoiceLineDelete(array $params = []): array
    {
        return $this->send(action: InvoiceAction::INVOICE_LINE_DELETE->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function attachmentAdd(array $params = []): array
    {
        $params['Type'] = $this->getResourceName();

        return $this->send(action: InvoiceAction::ATTACHMENT_ADD->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function attachmentDelete(array $params = []): array
    {
        $params['Type'] = $this->getResourceName();

        return $this->send(action: InvoiceAction::ATTACHMENT_DELETE->value, params: $params);
    }

    /**
     * @param  array<string, mixed>  $params
     * @return array<string, mixed>
     *
     * @throws ClientException
     * @throws ServerException
     * @throws BadResponseException
     * @throws JsonException
     */
    public function attachmentDownload(array $params = []): array
    {
        $params['Type'] = $this->getResourceName();

        return $this->send(action: InvoiceAction::ATTACHMENT_DOWNLOAD->value, params: $params);
    }
}
