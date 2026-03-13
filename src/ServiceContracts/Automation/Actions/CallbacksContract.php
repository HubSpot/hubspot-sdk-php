<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type CallbackCompletionBatchRequestShape from \HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CallbacksContract
{
    /**
     * @api
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
    ): mixed;

    /**
     * @api
     *
     * @param list<CallbackCompletionBatchRequest|CallbackCompletionBatchRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function completeBatch(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
