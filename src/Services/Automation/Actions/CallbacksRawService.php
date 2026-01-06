<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\Callbacks\CallbackCompleteBatchParams;
use HubspotSDK\Automation\Actions\Callbacks\CallbackCompleteParams;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Automation\Actions\CallbacksRawContract;

final class CallbacksRawService implements CallbacksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Complete a specific blocked action execution by ID.
     *
     * @param string $callbackID the ID of the action execution
     * @param array{outputFields: array<string,string>}|CallbackCompleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        array|CallbackCompleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallbackCompleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   inputs: list<array{callbackID: string, outputFields: array<string,string>}>
     * }|CallbackCompleteBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function completeBatch(
        array|CallbackCompleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallbackCompleteBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'automation/v4/actions/callbacks/complete',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
