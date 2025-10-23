<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\CallbackCompletionBatchRequest;
use HubspotSDK\Automation\Actions\Callbacks\CallbackCompleteBatchParams;
use HubspotSDK\Automation\Actions\Callbacks\CallbackCompleteParams;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\CallbacksContract;

final class CallbacksService implements CallbacksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Complete a specific blocked action execution by ID.
     *
     * @param array<string, string> $outputFields
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        $outputFields,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['outputFields' => $outputFields];

        return $this->completeRaw($callbackID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = CallbackCompleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['automation/v4/actions/callbacks/%1$s/complete', $callbackID],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Complete a batch of blocked action executions.
     *
     * @param list<CallbackCompletionBatchRequest> $inputs
     *
     * @throws APIException
     */
    public function completeBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->completeBatchRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = CallbackCompleteBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'automation/v4/actions/callbacks/complete',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
