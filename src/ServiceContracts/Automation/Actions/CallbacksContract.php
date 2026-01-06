<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Automation\Actions;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface CallbacksContract
{
    /**
     * @api
     *
     * @param string $callbackID the ID of the action execution
     * @param array<string,string> $outputFields
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        array $outputFields,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<array{
     *   callbackID: string, outputFields: array<string,string>
     * }> $inputs
     *
     * @throws APIException
     */
    public function completeBatch(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
