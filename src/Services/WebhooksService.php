<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\WebhooksContract;
use HubspotSDK\Webhooks\WebhookConfigureParams;
use HubspotSDK\Webhooks\WebhookCreateParams;
use HubspotSDK\Webhooks\WebhookCreateParams\EventType;
use HubspotSDK\Webhooks\WebhookDeleteParams;
use HubspotSDK\Webhooks\WebhookReadParams;
use HubspotSDK\Webhooks\WebhooksBatchResponseSubscriptionResponse;
use HubspotSDK\Webhooks\WebhooksSettingsResponse;
use HubspotSDK\Webhooks\WebhooksSubscriptionBatchUpdateRequest;
use HubspotSDK\Webhooks\WebhooksSubscriptionListResponse;
use HubspotSDK\Webhooks\WebhooksSubscriptionResponse;
use HubspotSDK\Webhooks\WebhooksThrottlingSettings;
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
    ): WebhooksSubscriptionResponse {
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
     * @return WebhooksSubscriptionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): WebhooksSubscriptionResponse {
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
            convert: WebhooksSubscriptionResponse::class,
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
     * @return WebhooksSubscriptionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        int $subscriptionID,
        $appID,
        $active = omit,
        ?RequestOptions $requestOptions = null,
    ): WebhooksSubscriptionResponse {
        $params = ['appID' => $appID, 'active' => $active];

        return $this->updateRaw($subscriptionID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): WebhooksSubscriptionResponse {
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
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: WebhooksSubscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * Read event subscriptions
     *
     * @return WebhooksSubscriptionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): WebhooksSubscriptionListResponse {
        $params = [];

        return $this->listRaw($appID, $params, $requestOptions);
    }

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
    ): WebhooksSubscriptionListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['webhooks/v3/%1$s/subscriptions', $appID],
            options: $requestOptions,
            convert: WebhooksSubscriptionListResponse::class,
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
        $params = [];

        return $this->clearRaw($appID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function clearRaw(
        int $appID,
        mixed $params,
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
        ?RequestOptions $requestOptions = null
    ): WebhooksSettingsResponse {
        $params = ['targetURL' => $targetURL, 'throttling' => $throttling];

        return $this->configureRaw($appID, $params, $requestOptions);
    }

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
    ): WebhooksSettingsResponse {
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
            convert: WebhooksSettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Read an event subscription
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
    ): WebhooksSubscriptionResponse {
        $params = ['appID' => $appID];

        return $this->readRaw($subscriptionID, $params, $requestOptions);
    }

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
        ?RequestOptions $requestOptions = null
    ): WebhooksSubscriptionResponse {
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
            convert: WebhooksSubscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * Batch create event subscriptions
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
    ): WebhooksBatchResponseSubscriptionResponse {
        $params = ['inputs' => $inputs];

        return $this->updateBatchRaw($appID, $params, $requestOptions);
    }

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
    ): WebhooksBatchResponseSubscriptionResponse {
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
            convert: WebhooksBatchResponseSubscriptionResponse::class,
        );
    }
}
