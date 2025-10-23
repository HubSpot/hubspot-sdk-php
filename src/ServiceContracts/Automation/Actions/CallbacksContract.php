<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface CallbacksContract
{
    /**
     * @api
     *
     * @param array<string, string> $outputFields
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        $outputFields,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function completeRaw(
        string $callbackID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<CallbackCompletionBatchRequest> $inputs
     *
     * @throws APIException
     */
    public function completeBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function completeBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
