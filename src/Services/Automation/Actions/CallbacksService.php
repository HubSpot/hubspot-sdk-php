<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\CallbacksContract;

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
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        array $outputFields,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['outputFields' => $outputFields];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->complete($callbackID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Complete a batch of blocked action executions.
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
    ): mixed {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->completeBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
