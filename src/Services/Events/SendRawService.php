<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Events;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Events\BehavioralEventHTTPCompletionRequest;
use HubSpotSDK\Events\Send\SendBatchSendParams;
use HubSpotSDK\Events\Send\SendSendParams;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Events\SendRawContract;

/**
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubSpotSDK\Events\BehavioralEventHTTPCompletionRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class SendRawService implements SendRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send multiple event occurrences at once.
     *
     * @param array{
     *   inputs: list<BehavioralEventHTTPCompletionRequest|BehavioralEventHTTPCompletionRequestShape>,
     * }|SendBatchSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function batchSend(
        array|SendBatchSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SendBatchSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'events/2026-03/send/batch',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Send data for a single custom event occurrence.
     *
     * @param array{
     *   eventName: string,
     *   properties: array<string,string>,
     *   email?: string,
     *   objectID?: string,
     *   occurredAt?: \DateTimeInterface,
     *   utk?: string,
     *   uuid?: string,
     * }|SendSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function send(
        array|SendSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SendSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'events/2026-03/send',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
