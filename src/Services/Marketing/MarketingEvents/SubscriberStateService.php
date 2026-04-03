<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\MarketingEvents;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventSubscriber;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\MarketingEvents\SubscriberStateContract;

/**
 * @phpstan-import-type MarketingEventEmailSubscriberShape from \HubspotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber
 * @phpstan-import-type MarketingEventSubscriberShape from \HubspotSDK\Marketing\MarketingEvents\MarketingEventSubscriber
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SubscriberStateService implements SubscriberStateContract
{
    /**
     * @api
     */
    public SubscriberStateRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SubscriberStateRawService($client);
    }

    /**
     * @api
     *
     * Record a subscriber state between multiple HubSpot contacts and a marketing event, using contact email addresses. Note that the contact must already exist in HubSpot; a contact will not be created. The contactProperties field is used only when creating a new contact. These properties will not update existing contacts.
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
    ): string {
        $params = Util::removeNulls(
            [
                'externalEventID' => $externalEventID,
                'externalAccountID' => $externalAccountID,
                'inputs' => $inputs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->recordByEmail($subscriberState, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Record a subscriber state between multiple HubSpot contacts and a marketing event, using HubSpot contact IDs. Note that the contact must already exist in HubSpot; a contact will not be created.
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
    ): string {
        $params = Util::removeNulls(
            [
                'externalEventID' => $externalEventID,
                'externalAccountID' => $externalAccountID,
                'inputs' => $inputs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->recordByID($subscriberState, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
