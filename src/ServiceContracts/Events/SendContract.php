<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Events;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Events\BehavioralEventHTTPCompletionRequest;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type BehavioralEventHTTPCompletionRequestShape from \HubSpotSDK\Events\BehavioralEventHTTPCompletionRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SendContract
{
    /**
     * @api
     *
     * @param list<BehavioralEventHTTPCompletionRequest|BehavioralEventHTTPCompletionRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchSend(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): mixed;
}
