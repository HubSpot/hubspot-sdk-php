<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Webhooks;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\BatchResponseSubscriptionResponse;
use HubspotSDK\Webhooks\SubscriptionBatchUpdateRequest;
use HubspotSDK\Webhooks\SubscriptionListResponse;
use HubspotSDK\Webhooks\SubscriptionResponse;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionCreateParams\EventType;

/**
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubspotSDK\Webhooks\SubscriptionBatchUpdateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SubscriptionsContract
{
    /**
     * @api
     *
     * @param int $appID the ID of the app
     * @param EventType|value-of<EventType> $eventType Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     * @param bool $active Determines if the subscription is active or paused. Defaults to false.
     * @param string $propertyName The internal name of the property to monitor for changes. Only applies when `eventType` is `propertyChange`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        EventType|string $eventType,
        ?bool $active = null,
        ?string $objectTypeID = null,
        ?string $propertyName = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param int $subscriptionID path param: The ID of the event subscription
     * @param int $appID path param: The ID of the app
     * @param bool $active body param: Determines if the subscription is active or paused
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $subscriptionID,
        int $appID,
        ?bool $active = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param int $appID the ID of the app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionListResponse;

    /**
     * @api
     *
     * @param int $subscriptionID the ID of the event subscription
     * @param int $appID the ID of the app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $subscriptionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param int $subscriptionID the ID of the event subscription
     * @param int $appID the ID of the app
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $subscriptionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param int $appID the ID of the app
     * @param list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateBatch(
        int $appID,
        array $inputs,
        RequestOptions|array|null $requestOptions = null,
    ): BatchResponseSubscriptionResponse;
}
