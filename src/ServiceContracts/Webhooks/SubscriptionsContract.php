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

use const HubspotSDK\Core\OMIT as omit;

interface SubscriptionsContract
{
    /**
     * @api
     *
     * @param EventType|value-of<EventType> $eventType Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     * @param bool $active Determines if the subscription is active or paused. Defaults to false.
     * @param string $objectTypeID
     * @param string $propertyName The internal name of the property to monitor for changes. Only applies when `eventType` is `propertyChange`.
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        $eventType,
        $active = omit,
        $objectTypeID = omit,
        $propertyName = omit,
        ?RequestOptions $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param int $appID
     * @param bool $active determines if the subscription is active or paused
     *
     * @throws APIException
     */
    public function update(
        int $subscriptionID,
        $appID,
        $active = omit,
        ?RequestOptions $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        int $subscriptionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): SubscriptionListResponse;

    /**
     * @api
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function delete(
        int $subscriptionID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        int $subscriptionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function get(
        int $subscriptionID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        int $subscriptionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param list<SubscriptionBatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function updateBatch(
        int $appID,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSubscriptionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateBatchRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSubscriptionResponse;
}
