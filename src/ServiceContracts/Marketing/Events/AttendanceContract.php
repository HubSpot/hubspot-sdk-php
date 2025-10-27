<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

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
     * @param string $objectID
     * @param list<MarketingEventSubscriber> $inputs List of HubSpot contacts to subscribe to the marketing event
     *
     * @throws APIException
     */
    public function createByEventIDAndContactID(
        string $subscriberState,
        $objectID,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createByEventIDAndContactIDRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberVidResponse;

    /**
     * @api
     *
     * @param string $objectID
     * @param list<MarketingEventEmailSubscriber> $inputs List of marketing event details to create or update
     *
     * @throws APIException
     */
    public function createByEventIDAndEmail(
        string $subscriberState,
        $objectID,
        $inputs,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createByEventIDAndEmailRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse;

    /**
     * @api
     *
     * @param string $externalEventID
     * @param list<MarketingEventSubscriber> $inputs List of HubSpot contacts to subscribe to the marketing event
     * @param string $externalAccountID The accountId that is associated with this marketing event in the external event application
     *
     * @throws APIException
     */
    public function createByExternalEventIDAndContactID(
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
    public function createByExternalEventIDAndContactIDRaw(
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
    public function createByExternalEventIDAndEmail(
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
    public function createByExternalEventIDAndEmailRaw(
        string $subscriberState,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSubscriberEmailResponse;
}
