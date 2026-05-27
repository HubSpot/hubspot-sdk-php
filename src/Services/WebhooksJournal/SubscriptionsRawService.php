<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\WebhooksJournal;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksJournal\SubscriptionsRawContract;
use HubSpotSDK\WebhooksJournal\JournalCollectionResponseSubscriptionResponseNoPaging;
use HubSpotSDK\WebhooksJournal\JournalSubscriptionResponse;
use HubSpotSDK\WebhooksJournal\Subscriptions\SubscriptionCreateParams;
use HubSpotSDK\WebhooksJournal\Subscriptions\SubscriptionCreateParams\Action;
use HubSpotSDK\WebhooksJournal\Subscriptions\SubscriptionCreateParams\SubscriptionType;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
     * Create a new subscription in the Webhooks Journal for the specified version. This endpoint allows you to define the subscription details by providing the necessary information in the request body. It supports various types of subscriptions, including object, association, event, app lifecycle event, list membership, and GDPR privacy deletion. Ensure that all required fields are included in the request to successfully create a subscription.
     *
     * @param array{
     *   actions: list<Action|value-of<Action>>,
     *   objectIDs: list<int>,
     *   objectTypeID: string,
     *   portalID: int,
     *   properties: list<string>,
     *   subscriptionType: SubscriptionType|value-of<SubscriptionType>,
     *   associatedObjectTypeIDs: list<string>,
     *   eventTypeID: string,
     *   listIDs: list<int>,
     * }|SubscriptionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JournalSubscriptionResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SubscriptionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriptionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'webhooks-journal/subscriptions/2026-03',
            body: (object) $parsed,
            options: $options,
            convert: JournalSubscriptionResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of webhook journal subscriptions for the specified version. This endpoint allows you to view all active subscriptions without pagination. It is useful for monitoring and managing webhook subscriptions in your HubSpot account.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JournalCollectionResponseSubscriptionResponseNoPaging>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'webhooks-journal/subscriptions/2026-03',
            options: $requestOptions,
            convert: JournalCollectionResponseSubscriptionResponseNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific webhook journal subscription using its unique identifier. This operation is useful for managing and cleaning up subscriptions that are no longer needed in your HubSpot account.
     *
     * @param int $subscriptionID The unique identifier of the subscription to delete. It must be provided as an integer.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
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
     * Delete a webhook journal subscription for a specific portal. This operation removes the subscription associated with the given portalId, ensuring that no further webhook events are sent for this portal. Use this endpoint to manage and clean up subscriptions that are no longer needed.
     *
     * @param int $portalID the unique identifier of the portal for which the webhook journal subscription is to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteForPortal(
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
     * Retrieve details of a specific webhook subscription using its unique identifier. This endpoint is useful for obtaining information about a particular subscription, such as its actions, object type, and associated properties.
     *
     * @param int $subscriptionID the unique identifier of the subscription to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JournalSubscriptionResponse>
     *
     * @throws APIException
     */
    public function get(
        int $subscriptionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks-journal/subscriptions/2026-03/%1$s', $subscriptionID],
            options: $requestOptions,
            convert: JournalSubscriptionResponse::class,
        );
    }
}
