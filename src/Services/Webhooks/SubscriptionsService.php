<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Webhooks;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Webhooks\SubscriptionsContract;
use HubspotSDK\Webhooks\BatchResponseSubscriptionResponse;
use HubspotSDK\Webhooks\SubscriptionListResponse;
use HubspotSDK\Webhooks\SubscriptionResponse;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionCreateParams\EventType;

final class SubscriptionsService implements SubscriptionsContract
{
    /**
     * @api
     */
    public SubscriptionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SubscriptionsRawService($client);
    }

    /**
     * @api
     *
     * Create new event subscription for the specified app.
     *
     * @param int $appID the ID of the app
     * @param 'company.associationChange'|'company.creation'|'company.deletion'|'company.merge'|'company.propertyChange'|'company.restore'|'contact.associationChange'|'contact.creation'|'contact.deletion'|'contact.merge'|'contact.privacyDeletion'|'contact.propertyChange'|'contact.restore'|'conversation.creation'|'conversation.deletion'|'conversation.newMessage'|'conversation.privacyDeletion'|'conversation.propertyChange'|'deal.associationChange'|'deal.creation'|'deal.deletion'|'deal.merge'|'deal.propertyChange'|'deal.restore'|'line_item.associationChange'|'line_item.creation'|'line_item.deletion'|'line_item.merge'|'line_item.propertyChange'|'line_item.restore'|'object.associationChange'|'object.creation'|'object.deletion'|'object.merge'|'object.propertyChange'|'object.restore'|'product.creation'|'product.deletion'|'product.merge'|'product.propertyChange'|'product.restore'|'ticket.associationChange'|'ticket.creation'|'ticket.deletion'|'ticket.merge'|'ticket.propertyChange'|'ticket.restore'|EventType $eventType Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     * @param bool $active Determines if the subscription is active or paused. Defaults to false.
     * @param string $propertyName The internal name of the property to monitor for changes. Only applies when `eventType` is `propertyChange`.
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        string|EventType $eventType,
        ?bool $active = null,
        ?string $objectTypeID = null,
        ?string $propertyName = null,
        ?RequestOptions $requestOptions = null,
    ): SubscriptionResponse {
        $params = [
            'eventType' => $eventType,
            'active' => $active,
            'objectTypeID' => $objectTypeID,
            'propertyName' => $propertyName,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing event subscription by ID.
     *
     * @param int $subscriptionID path param: The ID of the event subscription
     * @param int $appID path param: The ID of the app
     * @param bool $active body param: Determines if the subscription is active or paused
     *
     * @throws APIException
     */
    public function update(
        int $subscriptionID,
        int $appID,
        ?bool $active = null,
        ?RequestOptions $requestOptions = null,
    ): SubscriptionResponse {
        $params = ['appID' => $appID, 'active' => $active];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($subscriptionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve event subscriptions for the specified app.
     *
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): SubscriptionListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing event subscription by ID.
     *
     * @param int $subscriptionID the ID of the event subscription
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function delete(
        int $subscriptionID,
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['appID' => $appID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($subscriptionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific event subscription by ID.
     *
     * @param int $subscriptionID the ID of the event subscription
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function get(
        int $subscriptionID,
        int $appID,
        ?RequestOptions $requestOptions = null
    ): SubscriptionResponse {
        $params = ['appID' => $appID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($subscriptionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Batch create event subscriptions for the specified app.
     *
     * @param int $appID the ID of the app
     * @param list<array{id: int, active: bool}> $inputs
     *
     * @throws APIException
     */
    public function updateBatch(
        int $appID,
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSubscriptionResponse {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateBatch($appID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
