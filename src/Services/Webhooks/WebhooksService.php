<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Webhooks;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Webhooks\WebhooksContract;
use HubspotSDK\Services\Webhooks\Webhooks\BatchService;
use HubspotSDK\Webhooks\Webhooks\CrmObjectSnapshotBatchResponse;
use HubspotSDK\Webhooks\Webhooks\CrmObjectSnapshotRequest;
use HubspotSDK\Webhooks\Webhooks\Filter;
use HubspotSDK\Webhooks\Webhooks\FilterCreateResponse;
use HubspotSDK\Webhooks\Webhooks\FilterResponse;
use HubspotSDK\Webhooks\Webhooks\SettingsResponse;
use HubspotSDK\Webhooks\Webhooks\SnapshotStatusResponse;
use HubspotSDK\Webhooks\Webhooks\SubscriptionListResponse;
use HubspotSDK\Webhooks\Webhooks\SubscriptionResponse;
use HubspotSDK\Webhooks\Webhooks\ThrottlingSettings;
use HubspotSDK\Webhooks\Webhooks\WebhookCreateSubscriptionParams\EventType;

/**
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubspotSDK\Webhooks\Webhooks\CrmObjectSnapshotRequest
 * @phpstan-import-type FilterShape from \HubspotSDK\Webhooks\Webhooks\Filter
 * @phpstan-import-type ThrottlingSettingsShape from \HubspotSDK\Webhooks\Webhooks\ThrottlingSettings
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class WebhooksService implements WebhooksContract
{
    /**
     * @api
     */
    public WebhooksRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebhooksRawService($client);
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
     * @param Filter|FilterShape $filter defines a single condition for searching CRM objects, specifying the property to filter on, the operator to use (such as equals, greater than, or contains), and the value(s) to compare against
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createFilter(
        Filter|array $filter,
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): FilterCreateResponse {
        $params = Util::removeNulls(
            ['filter' => $filter, 'subscriptionID' => $subscriptionID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createFilter(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create new event subscription for the specified app.
     *
     * @param int $appID the ID of the target app
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteFilter(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteFilter($filterID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deletePortal(
        int $portalID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deletePortal($portalID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete the webhook settings for the specified app. Event subscriptions will not be deleted, but will be paused until another webhook is created.
     *
     * @param int $appID the ID of the target app
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
     * @param int $subscriptionID the ID of the subscription to delete
     * @param int $appID the ID of the target app
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
    public function getEarliestJournal(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEarliestJournal(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarliestJournalLocal(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getEarliestJournalLocal(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getFilter(
        int $filterID,
        RequestOptions|array|null $requestOptions = null
    ): FilterResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getFilter($filterID, requestOptions: $requestOptions);

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
    public function getFilterBySubscription(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getFilterBySubscription($subscriptionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getJournalLocalStatus(
        string $statusID,
        RequestOptions|array|null $requestOptions = null
    ): SnapshotStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getJournalLocalStatus($statusID, requestOptions: $requestOptions);

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
    public function getLatestJournal(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLatestJournal(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLatestJournalLocal(
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLatestJournalLocal(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getNextJournalByOffset(
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getNextJournalByOffset($offset, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getNextJournalLocalByOffset(
        string $offset,
        ?int $installPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['installPortalID' => $installPortalID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getNextJournalLocalByOffset($offset, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the webhook settings for the specified app, including the webhook’s target URL, throttle configuration, and create/update date.
     *
     * @param int $appID the ID of the target app
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
     * @param int $subscriptionID the ID of the target subscription
     * @param int $appID the ID of the target app
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
     * Retrieve event subscriptions for the specified app.
     *
     * @param int $appID the ID of the target app
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
     * @param int $appID the ID of the target app
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
     * @param int $subscriptionID path param: The ID of the subscription to update
     * @param int $appID path param: The ID of the target app
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
