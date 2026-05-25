<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\WebhooksJournal;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksJournal\SubscriptionsContract;
use HubSpotSDK\Services\WebhooksJournal\Subscriptions\FiltersService;
use HubSpotSDK\WebhooksJournal\CollectionResponseSubscriptionResponseNoPaging;
use HubSpotSDK\WebhooksJournal\SubscriptionResponse;
use HubSpotSDK\WebhooksJournal\Subscriptions\SubscriptionCreateParams\Action;
use HubSpotSDK\WebhooksJournal\Subscriptions\SubscriptionCreateParams\SubscriptionType;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class SubscriptionsService implements SubscriptionsContract
{
    /**
     * @api
     */
    public SubscriptionsRawService $raw;

    /**
     * @api
     */
    public FiltersService $filters;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SubscriptionsRawService($client);
        $this->filters = new FiltersService($client);
    }

    /**
     * @api
     *
     * Create a new subscription in the Webhooks Journal for the specified version. This endpoint allows you to define the subscription details by providing the necessary information in the request body. It supports various types of subscriptions, including object, association, event, app lifecycle event, list membership, and GDPR privacy deletion. Ensure that all required fields are included in the request to successfully create a subscription.
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
    ): SubscriptionResponse {
        $params = Util::removeNulls(
            [
                'actions' => $actions,
                'objectIDs' => $objectIDs,
                'objectTypeID' => $objectTypeID,
                'portalID' => $portalID,
                'properties' => $properties,
                'subscriptionType' => $subscriptionType,
                'associatedObjectTypeIDs' => $associatedObjectTypeIDs,
                'eventTypeID' => $eventTypeID,
                'listIDs' => $listIDs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of webhook journal subscriptions for the specified version. This endpoint allows you to view all active subscriptions without pagination. It is useful for monitoring and managing webhook subscriptions in your HubSpot account.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseSubscriptionResponseNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific webhook journal subscription using its unique identifier. This operation is useful for managing and cleaning up subscriptions that are no longer needed in your HubSpot account.
     *
     * @param int $subscriptionID The unique identifier of the subscription to delete. It must be provided as an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($subscriptionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a webhook journal subscription for a specific portal. This operation removes the subscription associated with the given portalId, ensuring that no further webhook events are sent for this portal. Use this endpoint to manage and clean up subscriptions that are no longer needed.
     *
     * @param int $portalID the unique identifier of the portal for which the webhook journal subscription is to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteForPortal(
        int $portalID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteForPortal($portalID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve details of a specific webhook subscription using its unique identifier. This endpoint is useful for obtaining information about a particular subscription, such as its actions, object type, and associated properties.
     *
     * @param int $subscriptionID the unique identifier of the subscription to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): SubscriptionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($subscriptionID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
