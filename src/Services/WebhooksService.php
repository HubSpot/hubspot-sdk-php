<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\WebhooksContract;
use HubspotSDK\Webhooks\BatchResponseSubscriptionResponse;
use HubspotSDK\Webhooks\SettingsResponse;
use HubspotSDK\Webhooks\SubscriptionBatchUpdateRequest;
use HubspotSDK\Webhooks\SubscriptionListResponse;
use HubspotSDK\Webhooks\SubscriptionResponse;
use HubspotSDK\Webhooks\ThrottlingSettings;
use HubspotSDK\Webhooks\WebhookConfigureParams;
use HubspotSDK\Webhooks\WebhookCreateParams;
use HubspotSDK\Webhooks\WebhookCreateParams\EventType;
use HubspotSDK\Webhooks\WebhookDeleteParams;
use HubspotSDK\Webhooks\WebhookReadParams;
use HubspotSDK\Webhooks\WebhookUpdateBatchParams;
use HubspotSDK\Webhooks\WebhookUpdateParams;

use const HubspotSDK\Core\OMIT as omit;

final class WebhooksService implements WebhooksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create an event subscription
     *
     * @param EventType|value-of<EventType> $eventType
     * @param bool $active
     * @param string $objectTypeID
     * @param string $propertyName
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
    ): SubscriptionResponse {
        $params = [
            'eventType' => $eventType,
            'active' => $active,
            'objectTypeID' => $objectTypeID,
            'propertyName' => $propertyName,
        ];

        return $this->createRaw($appID, $params, $requestOptions);
    }

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
    ): SubscriptionResponse {
        [$parsed, $options] = WebhookCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['webhooks/v3/%1$s/subscriptions', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SubscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * Update an event subscription
     *
     * @param int $appID
     * @param bool $active
     *
     * @throws APIException
     */
    public function update(
        int $subscriptionID,
        $appID,
        $active = omit,
        ?RequestOptions $requestOptions = null,
    ): SubscriptionResponse {
        $params = ['appID' => $appID, 'active' => $active];

        return $this->updateRaw($subscriptionID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): SubscriptionResponse {
        [$parsed, $options] = WebhookUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['webhooks/v3/%1$s/subscriptions/%2$s', $appID, $subscriptionID],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: SubscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * Read event subscriptions
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): SubscriptionListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['webhooks/v3/%1$s/subscriptions', $appID],
            options: $requestOptions,
            convert: SubscriptionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete event subscription
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function delete(
        int $subscriptionID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['appID' => $appID];

        return $this->deleteRaw($subscriptionID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = WebhookDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['webhooks/v3/%1$s/subscriptions/%2$s', $appID, $subscriptionID],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete webhook settings
     *
     * @throws APIException
     */
    public function clear(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['webhooks/v3/%1$s/settings', $appID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Update webhook settings
     *
     * @param string $targetURL
     * @param ThrottlingSettings $throttling
     *
     * @throws APIException
     */
    public function configure(
        int $appID,
        $targetURL,
        $throttling,
        ?RequestOptions $requestOptions = null
    ): SettingsResponse {
        $params = ['targetURL' => $targetURL, 'throttling' => $throttling];

        return $this->configureRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function configureRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SettingsResponse {
        [$parsed, $options] = WebhookConfigureParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['webhooks/v3/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Read an event subscription
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function read(
        int $subscriptionID,
        $appID,
        ?RequestOptions $requestOptions = null
    ): SubscriptionResponse {
        $params = ['appID' => $appID];

        return $this->readRaw($subscriptionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        int $subscriptionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SubscriptionResponse {
        [$parsed, $options] = WebhookReadParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['webhooks/v3/%1$s/subscriptions/%2$s', $appID, $subscriptionID],
            options: $options,
            convert: SubscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * Batch create event subscriptions
     *
     * @param list<SubscriptionBatchUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function updateBatch(
        int $appID,
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSubscriptionResponse {
        $params = ['inputs' => $inputs];

        return $this->updateBatchRaw($appID, $params, $requestOptions);
    }

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
    ): BatchResponseSubscriptionResponse {
        [$parsed, $options] = WebhookUpdateBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['webhooks/v3/%1$s/subscriptions/batch/update', $appID],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSubscriptionResponse::class,
        );
    }
}
