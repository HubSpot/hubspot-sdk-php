<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts;

use HubspotSDK\AppWebhooks\AppWebhookCreateSubscriptionParams\EventType;
use HubspotSDK\AppWebhooks\BatchResponseSubscriptionResponse;
use HubspotSDK\AppWebhooks\SubscriptionBatchUpdateRequest;
use HubspotSDK\AppWebhooks\SubscriptionListResponse;
use HubspotSDK\AppWebhooks\SubscriptionResponse;
use HubspotSDK\AppWebhooks\ThrottlingSettings;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\SettingsResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubspotSDK\AppWebhooks\SubscriptionBatchUpdateRequest
 * @phpstan-import-type ThrottlingSettingsShape from \HubspotSDK\AppWebhooks\ThrottlingSettings
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AppWebhooksContract
{
    /**
     * @api
     *
     * @param list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchUpdateSubscriptions(
        int $appID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseSubscriptionResponse;

    /**
     * @api
     *
     * @param bool $active Determines if the subscription is active or paused. Defaults to false.
     * @param EventType|value-of<EventType> $eventType Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     * @param string $propertyName The internal name of the property to monitor for changes. Only applies when `eventType` is `propertyChange`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createSubscription(
        int $appID,
        bool $active,
        EventType|string $eventType,
        ?string $eventTypeName = null,
        ?string $objectTypeID = null,
        ?string $propertyName = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSubscription(
        int $subscriptionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SettingsResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSubscription(
        int $subscriptionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSubscriptions(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionListResponse;

    /**
     * @api
     *
     * @param string $targetURL a publicly available URL for HubSpot to call where event payloads will be delivered
     * @param ThrottlingSettings|ThrottlingSettingsShape $throttling
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        string $targetURL,
        ThrottlingSettings|array $throttling,
        RequestOptions|array|null $requestOptions = null,
    ): SettingsResponse;

    /**
     * @api
     *
     * @param int $subscriptionID Path param
     * @param int $appID Path param
     * @param bool $active body param: Determines if the subscription is active or paused
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateSubscription(
        int $subscriptionID,
        int $appID,
        ?bool $active = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;
}
