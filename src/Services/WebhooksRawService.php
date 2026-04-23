<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Conversion\ListOf;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksRawContract;
use HubSpotSDK\Webhooks\BatchResponseJournalFetchResponse;
use HubSpotSDK\Webhooks\BatchResponseSubscriptionResponse;
use HubSpotSDK\Webhooks\CollectionResponseSubscriptionResponseNoPaging;
use HubSpotSDK\Webhooks\CrmObjectSnapshotBatchResponse;
use HubSpotSDK\Webhooks\CrmObjectSnapshotRequest;
use HubSpotSDK\Webhooks\Filter;
use HubSpotSDK\Webhooks\FilterCreateResponse;
use HubSpotSDK\Webhooks\FilterResponse;
use HubSpotSDK\Webhooks\SettingsResponse;
use HubSpotSDK\Webhooks\SnapshotStatusResponse;
use HubSpotSDK\Webhooks\SubscriptionBatchUpdateRequest;
use HubSpotSDK\Webhooks\SubscriptionListResponse;
use HubSpotSDK\Webhooks\SubscriptionResponse;
use HubSpotSDK\Webhooks\SubscriptionResponse1;
use HubSpotSDK\Webhooks\ThrottlingSettings;
use HubSpotSDK\Webhooks\WebhookCreateBatchEventSubscriptionsParams;
use HubSpotSDK\Webhooks\WebhookCreateCrmSnapshotsParams;
use HubSpotSDK\Webhooks\WebhookCreateEventSubscriptionParams;
use HubSpotSDK\Webhooks\WebhookCreateEventSubscriptionParams\EventType;
use HubSpotSDK\Webhooks\WebhookCreateSubscriptionFilterParams;
use HubSpotSDK\Webhooks\WebhookDeleteEventSubscriptionParams;
use HubSpotSDK\Webhooks\WebhookGetEarliestJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetEarliestJournalEntryParams;
use HubSpotSDK\Webhooks\WebhookGetEarliestLocalJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetEarliestLocalJournalEntryParams;
use HubSpotSDK\Webhooks\WebhookGetEventSubscriptionParams;
use HubSpotSDK\Webhooks\WebhookGetJournalBatchByRequestParams;
use HubSpotSDK\Webhooks\WebhookGetJournalBatchFromOffsetParams;
use HubSpotSDK\Webhooks\WebhookGetLatestJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetLatestJournalEntryParams;
use HubSpotSDK\Webhooks\WebhookGetLatestLocalJournalBatchParams;
use HubSpotSDK\Webhooks\WebhookGetLatestLocalJournalEntryParams;
use HubSpotSDK\Webhooks\WebhookGetLocalJournalBatchByRequestParams;
use HubSpotSDK\Webhooks\WebhookGetLocalJournalBatchFromOffsetParams;
use HubSpotSDK\Webhooks\WebhookGetNextJournalEntriesParams;
use HubSpotSDK\Webhooks\WebhookGetNextLocalJournalEntriesParams;
use HubSpotSDK\Webhooks\WebhookUpdateEventSubscriptionParams;
use HubSpotSDK\Webhooks\WebhookUpdateSettingsParams;

/**
 * @phpstan-import-type SubscriptionBatchUpdateRequestShape from \HubSpotSDK\Webhooks\SubscriptionBatchUpdateRequest
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubSpotSDK\Webhooks\CrmObjectSnapshotRequest
 * @phpstan-import-type FilterShape from \HubSpotSDK\Webhooks\Filter
 * @phpstan-import-type ThrottlingSettingsShape from \HubSpotSDK\Webhooks\ThrottlingSettings
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * Batch create event subscriptions for the specified app.
     *
     * @param int $appID the identifier for the app
     * @param array{
     *   inputs: list<SubscriptionBatchUpdateRequest|SubscriptionBatchUpdateRequestShape>,
     * }|WebhookCreateBatchEventSubscriptionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSubscriptionResponse>
     *
     * @throws APIException
     */
    public function createBatchEventSubscriptions(
        int $appID,
        array|WebhookCreateBatchEventSubscriptionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookCreateBatchEventSubscriptionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['webhooks/2026-03/%1$s/subscriptions/batch/update', $appID],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSubscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * Create a batch of CRM object snapshots for the specified portal. This endpoint allows you to capture the state of CRM objects at a specific point in time, which can be useful for auditing or historical analysis. The request requires a list of CRM object snapshot requests, each specifying the portal ID, object ID, object type ID, and properties to include in the snapshot.
     *
     * @param array{
     *   snapshotRequests: list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape>
     * }|WebhookCreateCrmSnapshotsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CrmObjectSnapshotBatchResponse>
     *
     * @throws APIException
     */
    public function createCrmSnapshots(
        array|WebhookCreateCrmSnapshotsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookCreateCrmSnapshotsParams::parseRequest(
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
     * Create new event subscription for the specified app.
     *
     * @param int $appID the identifier for the app
     * @param array{
     *   active: bool,
     *   eventType: value-of<EventType>,
     *   eventTypeName?: string,
     *   objectTypeID?: string,
     *   propertyName?: string,
     * }|WebhookCreateEventSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function createEventSubscription(
        int $appID,
        array|WebhookCreateEventSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookCreateEventSubscriptionParams::parseRequest(
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
     * Create a new webhook subscription for the specified portal in the HubSpot account. This endpoint allows you to define the subscription details, including the types of events you want to subscribe to. The request body must include the necessary subscription information as defined by the SubscriptionUpsertRequest schema.
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
     * Create a new filter for a webhook subscription in your HubSpot account. This endpoint allows you to define specific conditions that a webhook event must meet to trigger the subscription. It is useful for managing and customizing the behavior of webhook subscriptions based on specific criteria.
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
     * Delete an existing event subscription by ID.
     *
     * @param int $subscriptionID the identifier for the subscription
     * @param array{appID: int}|WebhookDeleteEventSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteEventSubscription(
        int $subscriptionID,
        array|WebhookDeleteEventSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookDeleteEventSubscriptionParams::parseRequest(
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
     * Delete a specific webhook journal subscription using its unique identifier. This operation is useful for managing and cleaning up subscriptions that are no longer needed or relevant.
     *
     * @param int $subscriptionID the unique identifier of the subscription to delete
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
     * Delete a webhook journal subscription for a specific portal. This operation removes the subscription associated with the given portalId, and no content is returned upon successful deletion.
     *
     * @param int $portalID the unique identifier of the portal whose webhook journal subscription is to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteJournalSubscriptionForPortal(
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
     * @param int $appID the identifier for the app
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
     * Delete a specific filter associated with a webhook journal subscription. This operation is useful for managing and cleaning up filters that are no longer needed in your subscription setup. The endpoint requires the unique identifier of the filter to be deleted.
     *
     * @param int $filterID the unique identifier of the filter to delete
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
     * Retrieve the earliest batch of webhook journal entries up to the specified count. This endpoint is useful for fetching historical webhook data in batches, allowing you to process or analyze the earliest entries first.
     *
     * @param int $count The maximum number of journal entries to retrieve in the batch. This must be an integer with a minimum value of 1.
     * @param array{installPortalID?: int}|WebhookGetEarliestJournalBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getEarliestJournalBatch(
        int $count,
        array|WebhookGetEarliestJournalBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetEarliestJournalBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks-journal/journal/2026-03/batch/earliest/%1$s', $count],
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            options: $options,
            convert: BatchResponseJournalFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the earliest entry from the webhooks journal for the specified version. This endpoint is useful for accessing the oldest records available in the journal, which can be helpful for auditing or historical data analysis.
     *
     * @param array{installPortalID?: int}|WebhookGetEarliestJournalEntryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getEarliestJournalEntry(
        array|WebhookGetEarliestJournalEntryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetEarliestJournalEntryParams::parseRequest(
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
     * Retrieve the earliest batch of webhook journal entries based on the specified count. This endpoint is useful for fetching a specific number of the earliest entries in the webhook journal for analysis or processing.
     *
     * @param int $count The number of earliest entries to retrieve from the webhook journal. Must be an integer with a minimum value of 1.
     * @param array{
     *   installPortalID?: int
     * }|WebhookGetEarliestLocalJournalBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getEarliestLocalJournalBatch(
        int $count,
        array|WebhookGetEarliestLocalJournalBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetEarliestLocalJournalBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'webhooks-journal/journal-local/2026-03/batch/earliest/%1$s', $count,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            options: $options,
            convert: BatchResponseJournalFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the earliest entry from the webhooks journal for the specified portal. This endpoint is useful for accessing the oldest records in the journal, which can be helpful for auditing or tracking purposes.
     *
     * @param array{
     *   installPortalID?: int
     * }|WebhookGetEarliestLocalJournalEntryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getEarliestLocalJournalEntry(
        array|WebhookGetEarliestLocalJournalEntryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetEarliestLocalJournalEntryParams::parseRequest(
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
     * Retrieve a specific event subscription by ID.
     *
     * @param int $subscriptionID the identifier for the subscription
     * @param array{appID: int}|WebhookGetEventSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function getEventSubscription(
        int $subscriptionID,
        array|WebhookGetEventSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetEventSubscriptionParams::parseRequest(
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
     * Perform a batch read operation on the webhooks journal for the specified date. This endpoint allows you to retrieve multiple entries from the webhooks journal in a single request, which can be useful for processing large amounts of data efficiently.
     *
     * @param array{
     *   inputs: list<string>, installPortalID?: int
     * }|WebhookGetJournalBatchByRequestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getJournalBatchByRequest(
        array|WebhookGetJournalBatchByRequestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetJournalBatchByRequestParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['installPortalID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'webhooks-journal/journal/2026-03/batch/read',
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['installPortalID' => 'installPortalId'],
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseJournalFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint allows you to fetch a specified number of entries, making it useful for paginating through large sets of webhook journal data.
     *
     * @param int $count Path param: The number of journal entries to fetch in the batch. This is an integer value with a minimum of 1.
     * @param array{
     *   offset: string, installPortalID?: int
     * }|WebhookGetJournalBatchFromOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getJournalBatchFromOffset(
        int $count,
        array|WebhookGetJournalBatchFromOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetJournalBatchFromOffsetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $offset = $parsed['offset'];
        unset($parsed['offset']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'webhooks-journal/journal/2026-03/batch/%1$s/next/%2$s', $offset, $count,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            options: $options,
            convert: BatchResponseJournalFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the status of a specific webhook journal entry using its status ID. This endpoint is useful for checking the current state of a webhook process, such as whether it is pending, in progress, completed, failed, or expired.
     *
     * @param string $statusID the unique identifier (UUID) of the status to retrieve
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
     * Retrieve details of a specific webhook subscription using its unique identifier. This endpoint is useful for obtaining information about a particular subscription's configuration and status within the HubSpot account.
     *
     * @param int $subscriptionID The unique identifier of the subscription to retrieve. It must be an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse1>
     *
     * @throws APIException
     */
    public function getJournalSubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks-journal/subscriptions/2026-03/%1$s', $subscriptionID],
            options: $requestOptions,
            convert: SubscriptionResponse1::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the latest batch of webhook journal entries. This endpoint allows you to specify the number of entries to fetch, providing a way to access recent webhook activity within your HubSpot account.
     *
     * @param int $count The number of journal entries to retrieve. This is a required integer parameter with a minimum value of 1.
     * @param array{installPortalID?: int}|WebhookGetLatestJournalBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLatestJournalBatch(
        int $count,
        array|WebhookGetLatestJournalBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetLatestJournalBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks-journal/journal/2026-03/batch/latest/%1$s', $count],
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            options: $options,
            convert: BatchResponseJournalFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the latest entries from the webhooks journal for the specified portal. This endpoint is useful for accessing the most recent webhook events processed by your HubSpot account. It allows you to filter the results by the portal ID to ensure you are retrieving data relevant to a specific installation.
     *
     * @param array{installPortalID?: int}|WebhookGetLatestJournalEntryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLatestJournalEntry(
        array|WebhookGetLatestJournalEntryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetLatestJournalEntryParams::parseRequest(
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
     * Retrieve the latest batch of webhook journal entries. This endpoint is useful for accessing the most recent data entries processed by the webhook journal. It requires specifying the number of entries to retrieve.
     *
     * @param int $count The number of journal entries to retrieve. Must be an integer with a minimum value of 1.
     * @param array{
     *   installPortalID?: int
     * }|WebhookGetLatestLocalJournalBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLatestLocalJournalBatch(
        int $count,
        array|WebhookGetLatestLocalJournalBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetLatestLocalJournalBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'webhooks-journal/journal-local/2026-03/batch/latest/%1$s', $count,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            options: $options,
            convert: BatchResponseJournalFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the latest entries from the webhooks journal for the specified portal. This endpoint is useful for accessing the most recent webhook events that have been logged, allowing you to process or analyze them as needed.
     *
     * @param array{
     *   installPortalID?: int
     * }|WebhookGetLatestLocalJournalEntryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getLatestLocalJournalEntry(
        array|WebhookGetLatestLocalJournalEntryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetLatestLocalJournalEntryParams::parseRequest(
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
     * Perform a batch read operation on the webhooks journal. This endpoint allows you to read multiple entries from the journal in a single request. It requires a JSON request body specifying the inputs to be read. The response includes the results of the batch read operation, and may return multiple statuses if there are errors.
     *
     * @param array{
     *   inputs: list<string>, installPortalID?: int
     * }|WebhookGetLocalJournalBatchByRequestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLocalJournalBatchByRequest(
        array|WebhookGetLocalJournalBatchByRequestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetLocalJournalBatchByRequestParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['installPortalID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'webhooks-journal/journal-local/2026-03/batch/read',
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['installPortalID' => 'installPortalId'],
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseJournalFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint allows you to fetch a defined number of entries, facilitating the processing of webhook data in manageable chunks.
     *
     * @param int $count Path param: The number of journal entries to retrieve. This is an integer value with a minimum of 1.
     * @param array{
     *   offset: string, installPortalID?: int
     * }|WebhookGetLocalJournalBatchFromOffsetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseJournalFetchResponse>
     *
     * @throws APIException
     */
    public function getLocalJournalBatchFromOffset(
        int $count,
        array|WebhookGetLocalJournalBatchFromOffsetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetLocalJournalBatchFromOffsetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $offset = $parsed['offset'];
        unset($parsed['offset']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'webhooks-journal/journal-local/2026-03/batch/%1$s/next/%2$s',
                $offset,
                $count,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['installPortalID' => 'installPortalId']
            ),
            options: $options,
            convert: BatchResponseJournalFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the status of a specific webhook journal entry using its unique status ID. This endpoint is useful for monitoring the progress or completion of webhook processing tasks.
     *
     * @param string $statusID the unique identifier (UUID) of the status to retrieve
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
     * Retrieve the next batch of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through large sets of webhook data, allowing you to continue fetching entries from where you last left off.
     *
     * @param string $offset The offset from which to start retrieving the next batch of webhook journal entries. This parameter is required and identifies the starting point for the batch retrieval.
     * @param array{installPortalID?: int}|WebhookGetNextJournalEntriesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getNextJournalEntries(
        string $offset,
        array|WebhookGetNextJournalEntriesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetNextJournalEntriesParams::parseRequest(
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
     * Retrieve the next set of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through webhook journal data in a sequential manner, allowing you to fetch entries beyond a given point.
     *
     * @param string $offset The starting point for retrieving the next set of journal entries. This is a string value.
     * @param array{
     *   installPortalID?: int
     * }|WebhookGetNextLocalJournalEntriesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getNextLocalJournalEntries(
        string $offset,
        array|WebhookGetNextLocalJournalEntriesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookGetNextLocalJournalEntriesParams::parseRequest(
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
     * Retrieve the webhook settings for the specified app, including the webhook’s target URL, throttle configuration, and create/update date.
     *
     * @param int $appID the identifier for the app
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
     * Retrieve details of a specific filter associated with a webhook subscription in the HubSpot account. This endpoint is useful for accessing the configuration and conditions of a filter by its unique identifier.
     *
     * @param int $filterID the unique identifier of the filter to retrieve
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
     * Retrieve event subscriptions for the specified app.
     *
     * @param int $appID the identifier for the app
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionListResponse>
     *
     * @throws APIException
     */
    public function listEventSubscriptions(
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
     * Retrieve a list of webhook journal subscriptions for the specified API version. This endpoint provides details about each subscription, including actions, object types, and associated properties. It is useful for managing and reviewing current webhook subscriptions.
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
     * Retrieve the filters associated with a specific webhook subscription in the HubSpot account. This endpoint is useful for obtaining detailed information about the filters applied to a given subscription, identified by its subscription ID.
     *
     * @param int $subscriptionID the unique identifier of the subscription for which to retrieve filters
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<FilterResponse>>
     *
     * @throws APIException
     */
    public function listSubscriptionFilters(
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
     * Update an existing event subscription by ID.
     *
     * @param int $subscriptionID path param: The identifier for the subscription
     * @param array{
     *   appID: int, active?: bool
     * }|WebhookUpdateEventSubscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SubscriptionResponse>
     *
     * @throws APIException
     */
    public function updateEventSubscription(
        int $subscriptionID,
        array|WebhookUpdateEventSubscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookUpdateEventSubscriptionParams::parseRequest(
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

    /**
     * @api
     *
     * Update webhook settings for the specified app.
     *
     * @param int $appID the identifier for the app
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
}
