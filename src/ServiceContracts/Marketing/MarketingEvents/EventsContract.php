<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\MarketingEvents;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDefaultResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface EventsContract
{
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
    ): MarketingEventDefaultResponse;

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
    ): MarketingEventDefaultResponse;
}
