<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\Send\SendSendBatchParams;
use HubspotSDK\Events\Send\SendSendParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Events\SendContract;

final class SendService implements SendContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send data for a single event completion.
     *
     * @param array{
     *   eventName: string,
     *   properties: array<string,string>,
     *   email?: string,
     *   objectID?: string,
     *   occurredAt?: string|\DateTimeInterface,
     *   utk?: string,
     *   uuid?: string,
     * }|SendSendParams $params
     *
     * @throws APIException
     */
    public function send(
        array|SendSendParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = SendSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'events/v3/send',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Send multiple event completions at once.
     *
     * @param array{
     *   inputs: list<array{
     *     eventName: string,
     *     properties: array<string,string>,
     *     email?: string,
     *     objectID?: string,
     *     occurredAt?: string|\DateTimeInterface,
     *     utk?: string,
     *     uuid?: string,
     *   }>,
     * }|SendSendBatchParams $params
     *
     * @throws APIException
     */
    public function sendBatch(
        array|SendSendBatchParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = SendSendBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'events/v3/send/batch',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }
}
