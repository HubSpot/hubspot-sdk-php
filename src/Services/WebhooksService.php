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
     * Create new event subscription for the specified app.
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
     * Update an existing event subscription by ID.
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
     * Retrieve event subscriptions for the specified app.
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
     * Delete an existing event subscription by ID.
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
     * Delete the webhook settings for the specified app. Event subscriptions will not be deleted, but will be paused until another webhook is created.
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
     * Update webhook settings for the specified app.
     *
     * @param string $targetURL a publicly available URL for HubSpot to call where event payloads will be delivered
     * @param ThrottlingSettings $throttling configuration details for webhook throttling
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
     * Retrieve a specific event subscription by ID.
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
     * Batch create event subscriptions for the specified app.
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
