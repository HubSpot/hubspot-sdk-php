<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\MarketingEventDefaultResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\EventsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class EventsService implements EventsContract
{
    /**
     * @api
     */
    public EventsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EventsRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancelByExternalEventID(
        string $externalEventID,
        string $externalAccountID,
        RequestOptions|array|null $requestOptions = null,
    ): MarketingEventDefaultResponse {
        $params = Util::removeNulls(['externalAccountID' => $externalAccountID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancelByExternalEventID($externalEventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $externalEventID Path param
     * @param string $externalAccountID Query param
     * @param \DateTimeInterface $endDateTime Body param: The end date and time of the marketing event in ISO 8601 format
     * @param \DateTimeInterface $startDateTime Body param: The start date and time of the marketing event in ISO 8601 format
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function completeByExternalEventID(
        string $externalEventID,
        string $externalAccountID,
        \DateTimeInterface $endDateTime,
        \DateTimeInterface $startDateTime,
        RequestOptions|array|null $requestOptions = null,
    ): MarketingEventDefaultResponse {
        $params = Util::removeNulls(
            [
                'externalAccountID' => $externalAccountID,
                'endDateTime' => $endDateTime,
                'startDateTime' => $startDateTime,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->completeByExternalEventID($externalEventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
