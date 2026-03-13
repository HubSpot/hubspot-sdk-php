<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\CallbacksContract;

/**
 * @phpstan-import-type CallbackCompletionBatchRequestShape from \HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CallbacksService implements CallbacksContract
{
    /**
     * @api
     */
    public CallbacksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallbacksRawService($client);
    }

    /**
     * @api
     *
     * Complete a specific blocked action execution by ID.
     *
     * @param string $callbackID the ID of the action execution
     * @param array<string,string> $outputFields
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        array $outputFields,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['outputFields' => $outputFields]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->complete($callbackID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Complete a batch of blocked action executions.
     *
     * @param list<CallbackCompletionBatchRequest|CallbackCompletionBatchRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function completeBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->completeBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
