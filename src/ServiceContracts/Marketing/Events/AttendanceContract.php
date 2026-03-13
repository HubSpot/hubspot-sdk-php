<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberVidResponse;
use HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\Events\MarketingEventSubscriber;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type MarketingEventSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventSubscriber
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type MarketingEventEmailSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber
 */
interface AttendanceContract
{
    /**
     * @api
     *
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param string $objectID Path param: The internal id of the marketing event in HubSpot
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
    ): BatchResponseSubscriberVidResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param: The attendance state value. It may be 'register', 'attend' or 'cancel'
     * @param string $objectID Path param: The internal ID of the marketing event in HubSpot
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
    ): BatchResponseSubscriberEmailResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param string $externalEventID Path param: The id of the marketing event in the external event application
     * @param list<MarketingEventSubscriber|MarketingEventSubscriberShape> $inputs Body param: List of HubSpot contacts to subscribe to the marketing event
     * @param string $externalAccountID Query param: The accountId that is associated with this marketing event in the external event application
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
    ): BatchResponseSubscriberVidResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param string $externalEventID Path param: The id of the marketing event in the external event application
     * @param list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape> $inputs Body param: List of marketing event details to create or update
     * @param string $externalAccountID Query param: The accountId that is associated with this marketing event in the external event application
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
    ): BatchResponseSubscriberEmailResponse;
}
