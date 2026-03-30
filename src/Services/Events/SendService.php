<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Events\BehavioralEventHTTPCompletionRequest;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Events\SendContract;

/**
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubspotSDK\Events\BehavioralEventHTTPCompletionRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SendService implements SendContract
{
    /**
     * @api
     */
    public SendRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SendRawService($client);
    }

    /**
     * @api
     *
     * Send multiple event occurrences at once.
     *
     * @param list<BehavioralEventHTTPCompletionRequest|BehavioralEventHTTPCompletionRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchSend(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchSend(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Send data for a single custom event occurrence.
     *
     * @param string $eventName Internal name of the event-type to trigger
     * @param array<string,string> $properties Map of properties for the event in the format property internal name - property value
     * @param string $email Email of visitor
     * @param string $objectID The object id that this event occurred on. Could be a contact id or a visitor id.
     * @param \DateTimeInterface $occurredAt The time when this event occurred (if any). If this isn't set, the current time will be used
     * @param string $utk User token
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        string $eventName,
        array $properties,
        ?string $email = null,
        ?string $objectID = null,
        ?\DateTimeInterface $occurredAt = null,
        ?string $utk = null,
        ?string $uuid = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'eventName' => $eventName,
                'properties' => $properties,
                'email' => $email,
                'objectID' => $objectID,
                'occurredAt' => $occurredAt,
                'utk' => $utk,
                'uuid' => $uuid,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
