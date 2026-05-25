<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\WebhooksJournal;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\WebhooksJournal\CollectionResponseSubscriptionResponseNoPaging;
use HubSpotSDK\WebhooksJournal\SubscriptionResponse;
use HubSpotSDK\WebhooksJournal\Subscriptions\SubscriptionCreateParams\Action;
use HubSpotSDK\WebhooksJournal\Subscriptions\SubscriptionCreateParams\SubscriptionType;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SubscriptionsContract
{
    /**
     * @api
     *
     * @param list<Action|value-of<Action>> $actions
     * @param list<int> $objectIDs
     * @param list<string> $properties
     * @param list<string> $associatedObjectTypeIDs
     * @param list<int> $listIDs
     * @param SubscriptionType|value-of<SubscriptionType> $subscriptionType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $actions,
        array $objectIDs,
        string $objectTypeID,
        int $portalID,
        array $properties,
        array $associatedObjectTypeIDs,
        string $eventTypeID,
        array $listIDs,
        SubscriptionType|string $subscriptionType = 'GDPR_PRIVACY_DELETION',
        RequestOptions|array|null $requestOptions = null,
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseSubscriptionResponseNoPaging;

    /**
     * @api
     *
     * @param int $subscriptionID The unique identifier of the subscription to delete. It must be provided as an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $portalID the unique identifier of the portal for which the webhook journal subscription is to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteForPortal(
        int $portalID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $subscriptionID the unique identifier of the subscription to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionResponse;
}
