<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberVidResponse;
use HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\Events\MarketingEventSubscriber;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Events\AttendanceContract;

/**
 * @phpstan-import-type MarketingEventSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventSubscriber
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type MarketingEventEmailSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber
 */
final class AttendanceService implements AttendanceContract
{
    /**
     * @api
     */
    public AttendanceRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AttendanceRawService($client);
    }

    /**
     * @api
     *
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param string $objectID path param: The internal id of the marketing event in HubSpot
     * @param list<MarketingEventSubscriber|MarketingEventSubscriberShape> $inputs Body param: List of HubSpot contacts to subscribe to the marketing event
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createByEventIDAndContactID(
        string $subscriberState,
        string $objectID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseSubscriberVidResponse {
        $params = Util::removeNulls(['objectID' => $objectID, 'inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createByEventIDAndContactID($subscriberState, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param string $objectID path param: The internal id of the marketing event in HubSpot
     * @param list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape> $inputs Body param: List of marketing event details to create or update
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createByEventIDAndEmail(
        string $subscriberState,
        string $objectID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse {
        $params = Util::removeNulls(['objectID' => $objectID, 'inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createByEventIDAndEmail($subscriberState, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param string $externalEventID Path param
     * @param list<MarketingEventSubscriber|MarketingEventSubscriberShape> $inputs Body param: List of HubSpot contacts to subscribe to the marketing event
     * @param string $externalAccountID Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndContactID(
        string $subscriberState,
        string $externalEventID,
        array $inputs,
        ?string $externalAccountID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseSubscriberVidResponse {
        $params = Util::removeNulls(
            [
                'externalEventID' => $externalEventID,
                'inputs' => $inputs,
                'externalAccountID' => $externalAccountID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createByExternalEventIDAndContactID($subscriberState, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param string $externalEventID Path param
     * @param list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape> $inputs Body param: List of marketing event details to create or update
     * @param string $externalAccountID Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndEmail(
        string $subscriberState,
        string $externalEventID,
        array $inputs,
        ?string $externalAccountID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse {
        $params = Util::removeNulls(
            [
                'externalEventID' => $externalEventID,
                'inputs' => $inputs,
                'externalAccountID' => $externalAccountID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createByExternalEventIDAndEmail($subscriberState, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
