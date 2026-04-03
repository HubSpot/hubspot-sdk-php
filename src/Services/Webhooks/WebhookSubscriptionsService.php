<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Webhooks;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Webhooks\WebhookSubscriptionsContract;
use HubspotSDK\Services\Webhooks\WebhookSubscriptions\BatchService;
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
use HubspotSDK\Webhooks\WebhookSubscriptions\WebhookSubscriptionCreateSubscriptionParams\EventType;

/**
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubspotSDK\Webhooks\WebhookSubscriptions\CrmObjectSnapshotRequest
 * @phpstan-import-type FilterShape from \HubspotSDK\Webhooks\WebhookSubscriptions\Filter
 * @phpstan-import-type ThrottlingSettingsShape from \HubspotSDK\Webhooks\WebhookSubscriptions\ThrottlingSettings
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class WebhookSubscriptionsService implements WebhookSubscriptionsContract
{
    /**
     * @api
     */
    public WebhookSubscriptionsRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebhookSubscriptionsRawService($client);
        $this->batch = new BatchService($client);
    }

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
    ): CrmObjectSnapshotBatchResponse {
        $params = Util::removeNulls(['snapshotRequests' => $snapshotRequests]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createCrmSnapshot(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createJournalSubscription(
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionResponse1 {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createJournalSubscription(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create new event subscription for the specified app.
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
    ): SubscriptionResponse {
        $params = Util::removeNulls(
            [
                'active' => $active,
                'eventType' => $eventType,
                'eventTypeName' => $eventTypeName,
                'objectTypeID' => $objectTypeID,
                'propertyName' => $propertyName,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createSubscription($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): FilterCreateResponse {
        $params = Util::removeNulls(
            ['filter' => $filter, 'subscriptionID' => $subscriptionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createSubscriptionFilter(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteJournalSubscription($subscriptionID, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deletePortalSubscriptions($portalID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete the webhook settings for the specified app. Event subscriptions will not be deleted, but will be paused until another webhook is created.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteSettings($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing event subscription by ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSubscription(
        int $subscriptionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteSubscription($subscriptionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteSubscriptionFilter($filterID, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getJournalEarliest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getJournalLatest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getJournalNextByOffset($offset, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): SnapshotStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getJournalStatus($statusID, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLocalJournalEarliest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLocalJournalLatest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLocalJournalNextByOffset($offset, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): SnapshotStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLocalJournalStatus($statusID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the webhook settings for the specified app, including the webhook’s target URL, throttle configuration, and create/update date.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SettingsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSettings($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific event subscription by ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSubscription(
        int $subscriptionID,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSubscription($subscriptionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): FilterResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSubscriptionFilter($filterID, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSubscriptionFilterForSubscription($subscriptionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listJournalSubscriptions(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseSubscriptionResponseNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listJournalSubscriptions(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve event subscriptions for the specified app.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSubscriptions(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSubscriptions($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update webhook settings for the specified app.
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
    ): SettingsResponse {
        $params = Util::removeNulls(
            ['targetURL' => $targetURL, 'throttling' => $throttling]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateSettings($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing event subscription by ID.
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
    ): SubscriptionResponse {
        $params = Util::removeNulls(['appID' => $appID, 'active' => $active]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateSubscription($subscriptionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
