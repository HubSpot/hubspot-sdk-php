<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\MarketingEvents;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventSubscriber;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type MarketingEventEmailSubscriberShape from \HubspotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber
 * @phpstan-import-type MarketingEventSubscriberShape from \HubspotSDK\Marketing\MarketingEvents\MarketingEventSubscriber
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SubscriberStateContract
{
    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param string $externalEventID Path param
     * @param string $externalAccountID Query param
     * @param list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape> $inputs Body param: List of marketing event details to create or update
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recordByEmail(
        string $subscriberState,
        string $externalEventID,
        string $externalAccountID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param string $externalEventID Path param
     * @param string $externalAccountID Query param
     * @param list<MarketingEventSubscriber|MarketingEventSubscriberShape> $inputs Body param: List of HubSpot contacts to subscribe to the marketing event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recordByID(
        string $subscriberState,
        string $externalEventID,
        string $externalAccountID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
