<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\WebhookCreateParams\EventType;
use HubspotSDK\Webhooks\WebhooksBatchResponseSubscriptionResponse;
use HubspotSDK\Webhooks\WebhooksSettingsResponse;
use HubspotSDK\Webhooks\WebhooksSubscriptionBatchUpdateRequest;
use HubspotSDK\Webhooks\WebhooksSubscriptionListResponse;
use HubspotSDK\Webhooks\WebhooksSubscriptionResponse;
use HubspotSDK\Webhooks\WebhooksThrottlingSettings;

use const HubspotSDK\Core\OMIT as omit;

interface WebhooksContract
{
    /**
     * @api
     *
     * @param EventType|value-of<EventType> $eventType
     * @param bool $active
     * @param string $objectTypeID
     * @param string $propertyName
     *
     * @return WebhooksSubscriptionResponse<HasRawResponse>
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
    ): WebhooksSubscriptionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WebhooksSubscriptionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): WebhooksSubscriptionResponse;

    /**
     * @api
     *
     * @param int $appID
     * @param bool $active
     *
     * @return WebhooksSubscriptionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        int $subscriptionID,
        $appID,
        $active = omit,
        ?RequestOptions $requestOptions = null,
    ): WebhooksSubscriptionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WebhooksSubscriptionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        int $subscriptionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): WebhooksSubscriptionResponse;

    /**
     * @api
     *
     * @return WebhooksSubscriptionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): WebhooksSubscriptionListResponse;

    /**
     * @api
     *
     * @return WebhooksSubscriptionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        int $appID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): WebhooksSubscriptionListResponse;

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
     * @throws APIException
     */
    public function clear(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function clearRaw(
        int $appID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $targetURL
     * @param WebhooksThrottlingSettings $throttling
     *
     * @return WebhooksSettingsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function configure(
        int $appID,
        $targetURL,
        $throttling,
        ?RequestOptions $requestOptions = null,
    ): WebhooksSettingsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WebhooksSettingsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function configureRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): WebhooksSettingsResponse;

    /**
     * @api
     *
     * @param int $appID
     *
     * @return WebhooksSubscriptionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function read(
        int $subscriptionID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): WebhooksSubscriptionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WebhooksSubscriptionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function readRaw(
        int $subscriptionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): WebhooksSubscriptionResponse;

    /**
     * @api
     *
     * @param list<WebhooksSubscriptionBatchUpdateRequest> $inputs
     *
     * @return WebhooksBatchResponseSubscriptionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateBatch(
        int $appID,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): WebhooksBatchResponseSubscriptionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WebhooksBatchResponseSubscriptionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateBatchRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): WebhooksBatchResponseSubscriptionResponse;
}
