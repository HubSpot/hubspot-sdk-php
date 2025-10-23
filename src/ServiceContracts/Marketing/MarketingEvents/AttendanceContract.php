<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\MarketingEvents;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseSubscriberVidResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventSubscriber;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface AttendanceContract
{
    /**
     * @api
     *
     * @param string $externalEventID
     * @param list<MarketingEventSubscriber> $inputs List of HubSpot contacts to subscribe to the marketing event
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function createByContactID(
        string $subscriberState,
        $externalEventID,
        $inputs,
        $externalAccountID = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createByContactIDRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse;

    /**
     * @api
     *
     * @param string $externalEventID
     * @param list<MarketingEventEmailSubscriber> $inputs List of marketing event details to create or update
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function createByEmail(
        string $subscriberState,
        $externalEventID,
        $inputs,
        $externalAccountID = omit,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createByEmailRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse;
}
