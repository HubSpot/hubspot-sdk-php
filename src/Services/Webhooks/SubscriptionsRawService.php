<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Webhooks;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Webhooks\SubscriptionsRawContract;
use HubspotSDK\Webhooks\BatchResponseSubscriptionResponse;
use HubspotSDK\Webhooks\SubscriptionListResponse;
use HubspotSDK\Webhooks\SubscriptionResponse;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionCreateParams;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionCreateParams\EventType;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionDeleteParams;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionGetParams;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionUpdateBatchParams;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionUpdateParams;

final class SubscriptionsRawService implements SubscriptionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create new event subscription for the specified app.
     *
     * @param int $appID the ID of the app
     * @param array{
     *   eventType: value-of<EventType>,
     *   active?: bool,
     *   objectTypeID?: string,
     *   propertyName?: string,
     * }|SubscriptionCreateParams $params
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|SubscriptionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriptionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param int $subscriptionID path param: The ID of the event subscription
     * @param array{appID: int, active?: bool}|SubscriptionUpdateParams $params
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function update(
        int $subscriptionID,
        array|SubscriptionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriptionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
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
     * @param int $appID the ID of the app
     *
     * @return BaseResponse<SubscriptionListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param int $subscriptionID the ID of the event subscription
     * @param array{appID: int}|SubscriptionDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $subscriptionID,
        array|SubscriptionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriptionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
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
     * Retrieve a specific event subscription by ID.
     *
     * @param int $subscriptionID the ID of the event subscription
     * @param array{appID: int}|SubscriptionGetParams $params
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function get(
        int $subscriptionID,
        array|SubscriptionGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriptionGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
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
     * @param int $appID the ID of the app
     * @param array{
     *   inputs: list<array{id: int, active: bool}>
     * }|SubscriptionUpdateBatchParams $params
     *
     * @return BaseResponse<BatchResponseSubscriptionResponse>
     *
     * @throws APIException
     */
    public function updateBatch(
        int $appID,
        array|SubscriptionUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriptionUpdateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['webhooks/v3/%1$s/subscriptions/batch/update', $appID],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSubscriptionResponse::class,
        );
    }
}
