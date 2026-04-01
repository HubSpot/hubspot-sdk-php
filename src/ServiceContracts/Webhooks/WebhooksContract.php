<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Webhooks;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
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
use HubspotSDK\Webhooks\Webhooks\WebhookCreateSubscriptionParams\EventType;

/**
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubspotSDK\Webhooks\Webhooks\CrmObjectSnapshotRequest
 * @phpstan-import-type FilterShape from \HubspotSDK\Webhooks\Webhooks\Filter
 * @phpstan-import-type ThrottlingSettingsShape from \HubspotSDK\Webhooks\Webhooks\ThrottlingSettings
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface WebhooksContract
{
    /**
     * @api
     *
     * @param list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape> $snapshotRequests
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createCrmSnapshot(
        array $snapshotRequests,
        RequestOptions|array|null $requestOptions = null
    ): CrmObjectSnapshotBatchResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createJournalSubscription(
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionResponse1;

    /**
     * @api
     *
     * @param bool $active Determines if the subscription is active or paused. Defaults to false.
     * @param EventType|value-of<EventType> $eventType Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     * @param string $eventTypeName The name of the event to listen for. This is used with custom objects to specify custom event types beyond the standard eventType enum values.
     * @param string $objectTypeID The ID of the object type for the subscription. This can be a standard CRM object (e.g., 'contact', 'company', 'deal') or a custom object ID for custom object subscriptions.
     * @param string $propertyName The internal name of the property to monitor for changes. Only applies when `eventType` is `propertyChange`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createSubscription(
        int $appID,
        bool $active,
        EventType|string $eventType,
        ?string $eventTypeName = null,
        ?string $objectTypeID = null,
        ?string $propertyName = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter defines a single condition for searching CRM objects, specifying the property to filter on, the operator to use (such as equals, greater than, or contains), and the value(s) to compare against
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createSubscriptionFilter(
        Filter|array $filter,
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): FilterCreateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteJournalSubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deletePortalSubscriptions(
        int $portalID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSubscription(
        int $subscriptionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSubscriptionFilter(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getJournalEarliest(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getJournalLatest(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getJournalNextByOffset(
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getJournalStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): SnapshotStatusResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLocalJournalEarliest(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLocalJournalLatest(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLocalJournalNextByOffset(
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLocalJournalStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): SnapshotStatusResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SettingsResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSubscription(
        int $subscriptionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSubscriptionFilter(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): FilterResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<FilterResponse>
     *
     * @throws APIException
     */
    public function getSubscriptionFilterForSubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listJournalSubscriptions(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseSubscriptionResponseNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSubscriptions(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionListResponse;

    /**
     * @api
     *
     * @param string $targetURL A publicly available URL for Hubspot to call where event payloads will be delivered. See [link-so-some-doc](#) for details about the format of these event payloads.
     * @param ThrottlingSettings|ThrottlingSettingsShape $throttling
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        string $targetURL,
        ThrottlingSettings|array $throttling,
        RequestOptions|array|null $requestOptions = null,
    ): SettingsResponse;

    /**
     * @api
     *
     * @param int $subscriptionID Path param
     * @param int $appID Path param
     * @param bool $active Body param: Whether to activate or pause the webhook subscription. If true, the subscription will send webhook notifications. If false, the subscription is paused and will not send notifications.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateSubscription(
        int $subscriptionID,
        int $appID,
        ?bool $active = null,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;
}
