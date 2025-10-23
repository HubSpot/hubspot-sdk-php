<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\Batch\BatchSendParams;
use HubspotSDK\Events\BehavioralEventHTTPCompletionRequest;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Events\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send multiple event completions at once.
     *
     * @param list<BehavioralEventHTTPCompletionRequest> $inputs
     *
     * @throws APIException
     */
    public function send($inputs, ?RequestOptions $requestOptions = null): mixed
    {
        $params = ['inputs' => $inputs];

        return $this->sendRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function sendRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = BatchSendParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'events/v3/send/batch',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
