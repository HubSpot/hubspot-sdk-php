<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Webhooks;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Conversion\ListOf;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Webhooks\WebhookSubscriptionsRawContract;
use HubspotSDK\Webhooks\WebhookSubscriptions\CollectionResponseSubscriptionResponseNoPaging;
use HubspotSDK\Webhooks\WebhookSubscriptions\CrmObjectSnapshotBatchResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\CrmObjectSnapshotRequest;
use HubspotSDK\Webhooks\WebhookSubscriptions\Filter;
use HubspotSDK\Webhooks\WebhookSubscriptions\FilterCreateResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\FilterResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\SettingsResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\SnapshotStatusResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\SubscriptionListResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\SubscriptionResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\SubscriptionResponse1;
use HubspotSDK\Webhooks\WebhookSubscriptions\ThrottlingSettings;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionCreateCrmSnapshotParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionCreateSubscriptionFilterParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionCreateSubscriptionParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionCreateSubscriptionParams\EventType;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionDeleteSubscriptionParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetJournalEarliestParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetJournalLatestParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetJournalNextByOffsetParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetLocalJournalEarliestParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetLocalJournalLatestParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetLocalJournalNextByOffsetParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionGetSubscriptionParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionUpdateSettingsParams;
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionUpdateSubscriptionParams;

/**
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubspotSDK\Webhooks\WebhookSubscriptions\CrmObjectSnapshotRequest
 * @phpstan-import-type FilterShape from \HubspotSDK\Webhooks\WebhookSubscriptions\Filter
 * @phpstan-import-type ThrottlingSettingsShape from \HubspotSDK\Webhooks\WebhookSubscriptions\ThrottlingSettings
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class WebhookSubscriptionsRawService implements WebhookSubscriptionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   snapshotRequests: list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape>
     * }|WebhookSubscriptionCreateCrmSnapshotParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CrmObjectSnapshotBatchResponse>
     *
     * @throws APIException
     */
    public function createCrmSnapshot(
        array|WebhookSubscriptionCreateCrmSnapshotParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionCreateCrmSnapshotParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'webhooks-journal/snapshots/2026-03/crm',
            body: (object) $parsed,
            options: $options,
            convert: CrmObjectSnapshotBatchResponse::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse1>
     *
     * @throws APIException
     */
    public function createJournalSubscription(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'webhooks-journal/subscriptions/2026-03',
            options: $requestOptions,
            convert: SubscriptionResponse1::class,
        );
    }

    /**
     * @api
     *
     * Create new event subscription for the specified app.
     *
     * @param array{
     *   active: bool,
     *   eventType: value-of<EventType>,
     *   eventTypeName?: string,
     *   objectTypeID?: string,
     *   propertyName?: string,
     * }|WebhookSubscriptionCreateSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function createSubscription(
        int $appID,
        array|WebhookSubscriptionCreateSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionCreateSubscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['webhooks/2026-03/%1$s/subscriptions', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SubscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   filter: Filter|FilterShape, subscriptionID: int
     * }|WebhookSubscriptionCreateSubscriptionFilterParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterCreateResponse>
     *
     * @throws APIException
     */
    public function createSubscriptionFilter(
        array|WebhookSubscriptionCreateSubscriptionFilterParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionCreateSubscriptionFilterParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'webhooks-journal/subscriptions/2026-03/filters',
            body: (object) $parsed,
            options: $options,
            convert: FilterCreateResponse::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteJournalSubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['webhooks-journal/subscriptions/2026-03/%1$s', $subscriptionID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deletePortalSubscriptions(
        int $portalID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['webhooks-journal/subscriptions/2026-03/portals/%1$s', $portalID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete the webhook settings for the specified app. Event subscriptions will not be deleted, but will be paused until another webhook is created.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['webhooks/2026-03/%1$s/settings', $appID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete an existing event subscription by ID.
     *
     * @param array{appID: int}|WebhookSubscriptionDeleteSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSubscription(
        int $subscriptionID,
        array|WebhookSubscriptionDeleteSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionDeleteSubscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'webhooks/2026-03/%1$s/subscriptions/%2$s', $appID, $subscriptionID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSubscriptionFilter(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['webhooks-journal/subscriptions/2026-03/filters/%1$s', $filterID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   installPortalID?: int
     * }|WebhookSubscriptionGetJournalEarliestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getJournalEarliest(
        array|WebhookSubscriptionGetJournalEarliestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionGetJournalEarliestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'webhooks-journal/journal/2026-03/earliest',
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param array{
     *   installPortalID?: int
     * }|WebhookSubscriptionGetJournalLatestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getJournalLatest(
        array|WebhookSubscriptionGetJournalLatestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionGetJournalLatestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'webhooks-journal/journal/2026-03/latest',
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param array{
     *   installPortalID?: int
     * }|WebhookSubscriptionGetJournalNextByOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getJournalNextByOffset(
        string $offset,
        array|WebhookSubscriptionGetJournalNextByOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionGetJournalNextByOffsetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks-journal/journal/2026-03/offset/%1$s/next', $offset],
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SnapshotStatusResponse>
     *
     * @throws APIException
     */
    public function getJournalStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks-journal/journal/2026-03/status/%1$s', $statusID],
            options: $requestOptions,
            convert: SnapshotStatusResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   installPortalID?: int
     * }|WebhookSubscriptionGetLocalJournalEarliestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLocalJournalEarliest(
        array|WebhookSubscriptionGetLocalJournalEarliestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionGetLocalJournalEarliestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'webhooks-journal/journal-local/2026-03/earliest',
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param array{
     *   installPortalID?: int
     * }|WebhookSubscriptionGetLocalJournalLatestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLocalJournalLatest(
        array|WebhookSubscriptionGetLocalJournalLatestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionGetLocalJournalLatestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'webhooks-journal/journal-local/2026-03/latest',
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param array{
     *   installPortalID?: int
     * }|WebhookSubscriptionGetLocalJournalNextByOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLocalJournalNextByOffset(
        string $offset,
        array|WebhookSubscriptionGetLocalJournalNextByOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionGetLocalJournalNextByOffsetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'webhooks-journal/journal-local/2026-03/offset/%1$s/next', $offset,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SnapshotStatusResponse>
     *
     * @throws APIException
     */
    public function getLocalJournalStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks-journal/journal-local/2026-03/status/%1$s', $statusID],
            options: $requestOptions,
            convert: SnapshotStatusResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the webhook settings for the specified app, including the webhook’s target URL, throttle configuration, and create/update date.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function getSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks/2026-03/%1$s/settings', $appID],
            options: $requestOptions,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific event subscription by ID.
     *
     * @param array{appID: int}|WebhookSubscriptionGetSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function getSubscription(
        int $subscriptionID,
        array|WebhookSubscriptionGetSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionGetSubscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'webhooks/2026-03/%1$s/subscriptions/%2$s', $appID, $subscriptionID,
            ],
            options: $options,
            convert: SubscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterResponse>
     *
     * @throws APIException
     */
    public function getSubscriptionFilter(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks-journal/subscriptions/2026-03/filters/%1$s', $filterID],
            options: $requestOptions,
            convert: FilterResponse::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<FilterResponse>>
     *
     * @throws APIException
     */
    public function getSubscriptionFilterForSubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'webhooks-journal/subscriptions/2026-03/filters/subscription/%1$s',
                $subscriptionID,
            ],
            options: $requestOptions,
            convert: new ListOf(FilterResponse::class),
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseSubscriptionResponseNoPaging>
     *
     * @throws APIException
     */
    public function listJournalSubscriptions(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'webhooks-journal/subscriptions/2026-03',
            options: $requestOptions,
            convert: CollectionResponseSubscriptionResponseNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve event subscriptions for the specified app.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionListResponse>
     *
     * @throws APIException
     */
    public function listSubscriptions(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks/2026-03/%1$s/subscriptions', $appID],
            options: $requestOptions,
            convert: SubscriptionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Update webhook settings for the specified app.
     *
     * @param array{
     *   targetURL: string, throttling: ThrottlingSettings|ThrottlingSettingsShape
     * }|WebhookSubscriptionUpdateSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        array|WebhookSubscriptionUpdateSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionUpdateSettingsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['webhooks/2026-03/%1$s/settings', $appID],
            body: (object) $parsed,
            options: $options,
            convert: SettingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Update an existing event subscription by ID.
     *
     * @param int $subscriptionID Path param
     * @param array{
     *   appID: int, active?: bool
     * }|WebhookSubscriptionUpdateSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function updateSubscription(
        int $subscriptionID,
        array|WebhookSubscriptionUpdateSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookSubscriptionUpdateSubscriptionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'webhooks/2026-03/%1$s/subscriptions/%2$s', $appID, $subscriptionID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: SubscriptionResponse::class,
        );
    }
}
