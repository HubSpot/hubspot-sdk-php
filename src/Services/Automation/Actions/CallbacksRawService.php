<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Automation\Actions;

use HubSpotSDK\Automation\Actions\CallbackCompletionBatchRequest;
use HubSpotSDK\Automation\Actions\Callbacks\CallbackCompleteBatchParams;
use HubSpotSDK\Automation\Actions\Callbacks\CallbackCompleteParams;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Automation\Actions\CallbacksRawContract;

/**
 * @phpstan-import-type RequestContextShape from \HubSpotSDK\Automation\Actions\Callbacks\CallbackCompleteParams\RequestContext
 * @phpstan-import-type CallbackCompletionBatchRequestShape from \HubSpotSDK\Automation\Actions\CallbackCompletionBatchRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
     * @param array{
     *   outputFields: array<string,string>,
     *   typedOutputs: mixed,
     *   failureReasonType?: string,
     *   requestContext?: RequestContextShape,
     * }|CallbackCompleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function complete(
        string $callbackID,
        array|CallbackCompleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallbackCompleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['automation/actions/callbacks/2026-03/%1$s/complete', $callbackID],
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
     *   inputs: list<CallbackCompletionBatchRequest|CallbackCompletionBatchRequestShape>,
     * }|CallbackCompleteBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function completeBatch(
        array|CallbackCompleteBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallbackCompleteBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'automation/actions/callbacks/2026-03/complete',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
