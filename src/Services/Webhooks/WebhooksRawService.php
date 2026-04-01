<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Webhooks;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Conversion\ListOf;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Webhooks\WebhooksRawContract;
use HubspotSDK\Webhooks\Webhooks\CollectionResponseSubscriptionResponseNoPaging;
use HubspotSDK\Webhooks\Webhooks\CrmObjectSnapshotBatchResponse;
use HubspotSDK\Webhooks\Webhooks\CrmObjectSnapshotRequest;
use HubspotSDK\Webhooks\Webhooks\Filter;
use HubspotSDK\Webhooks\Webhooks\FilterCreateResponse;
use HubspotSDK\Webhooks\Webhooks\FilterResponse;
use HubspotSDK\Webhooks\Webhooks\SettingsResponse;
use HubspotSDK\Webhooks\Webhooks\SnapshotStatusResponse;
use HubspotSDK\Webhooks\Webhooks\SubscriptionListResponse;
use HubspotSDK\Webhooks\Webhooks\SubscriptionResponse;
use HubspotSDK\Webhooks\Webhooks\SubscriptionResponse1;
use HubspotSDK\Webhooks\Webhooks\ThrottlingSettings;
use HubspotSDK\Webhooks\Webhooks\WebhookCreateCrmSnapshotParams;
use HubspotSDK\Webhooks\Webhooks\WebhookCreateSubscriptionFilterParams;
use HubspotSDK\Webhooks\Webhooks\WebhookCreateSubscriptionParams;
use HubspotSDK\Webhooks\Webhooks\WebhookCreateSubscriptionParams\EventType;
use HubspotSDK\Webhooks\Webhooks\WebhookDeleteSubscriptionParams;
use HubspotSDK\Webhooks\Webhooks\WebhookGetJournalEarliestParams;
use HubspotSDK\Webhooks\Webhooks\WebhookGetJournalLatestParams;
use HubspotSDK\Webhooks\Webhooks\WebhookGetJournalNextByOffsetParams;
use HubspotSDK\Webhooks\Webhooks\WebhookGetLocalJournalEarliestParams;
use HubspotSDK\Webhooks\Webhooks\WebhookGetLocalJournalLatestParams;
use HubspotSDK\Webhooks\Webhooks\WebhookGetLocalJournalNextByOffsetParams;
use HubspotSDK\Webhooks\Webhooks\WebhookGetSubscriptionParams;
use HubspotSDK\Webhooks\Webhooks\WebhookUpdateSettingsParams;
use HubspotSDK\Webhooks\Webhooks\WebhookUpdateSubscriptionParams;

/**
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubspotSDK\Webhooks\Webhooks\CrmObjectSnapshotRequest
 * @phpstan-import-type FilterShape from \HubspotSDK\Webhooks\Webhooks\Filter
 * @phpstan-import-type ThrottlingSettingsShape from \HubspotSDK\Webhooks\Webhooks\ThrottlingSettings
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class WebhooksRawService implements WebhooksRawContract
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
     * }|WebhookCreateCrmSnapshotParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CrmObjectSnapshotBatchResponse>
     *
     * @throws APIException
     */
    public function createCrmSnapshot(
        array|WebhookCreateCrmSnapshotParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookCreateCrmSnapshotParams::parseRequest(
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
     * }|WebhookCreateSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function createSubscription(
        int $appID,
        array|WebhookCreateSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookCreateSubscriptionParams::parseRequest(
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
     * }|WebhookCreateSubscriptionFilterParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FilterCreateResponse>
     *
     * @throws APIException
     */
    public function createSubscriptionFilter(
        array|WebhookCreateSubscriptionFilterParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookCreateSubscriptionFilterParams::parseRequest(
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
     * @param array{appID: int}|WebhookDeleteSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSubscription(
        int $subscriptionID,
        array|WebhookDeleteSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookDeleteSubscriptionParams::parseRequest(
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
     * @param array{installPortalID?: int}|WebhookGetJournalEarliestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getJournalEarliest(
        array|WebhookGetJournalEarliestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetJournalEarliestParams::parseRequest(
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
     * @param array{installPortalID?: int}|WebhookGetJournalLatestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getJournalLatest(
        array|WebhookGetJournalLatestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetJournalLatestParams::parseRequest(
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
     * @param array{installPortalID?: int}|WebhookGetJournalNextByOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getJournalNextByOffset(
        string $offset,
        array|WebhookGetJournalNextByOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetJournalNextByOffsetParams::parseRequest(
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
     * @param array{installPortalID?: int}|WebhookGetLocalJournalEarliestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLocalJournalEarliest(
        array|WebhookGetLocalJournalEarliestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetLocalJournalEarliestParams::parseRequest(
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
     * @param array{installPortalID?: int}|WebhookGetLocalJournalLatestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLocalJournalLatest(
        array|WebhookGetLocalJournalLatestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetLocalJournalLatestParams::parseRequest(
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
     * }|WebhookGetLocalJournalNextByOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLocalJournalNextByOffset(
        string $offset,
        array|WebhookGetLocalJournalNextByOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetLocalJournalNextByOffsetParams::parseRequest(
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
     * @param array{appID: int}|WebhookGetSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function getSubscription(
        int $subscriptionID,
        array|WebhookGetSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetSubscriptionParams::parseRequest(
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
     * }|WebhookUpdateSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        array|WebhookUpdateSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookUpdateSettingsParams::parseRequest(
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
     * @param array{appID: int, active?: bool}|WebhookUpdateSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function updateSubscription(
        int $subscriptionID,
        array|WebhookUpdateSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookUpdateSubscriptionParams::parseRequest(
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
