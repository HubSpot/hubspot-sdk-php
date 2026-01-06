<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Webhooks;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\BatchResponseSubscriptionResponse;
use HubspotSDK\Webhooks\SubscriptionListResponse;
use HubspotSDK\Webhooks\SubscriptionResponse;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionCreateParams\EventType;

interface SubscriptionsContract
{
    /**
     * @api
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
    ): SubscriptionResponse;

    /**
     * @api
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
    ): SubscriptionResponse;

    /**
     * @api
     *
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): SubscriptionListResponse;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): SubscriptionResponse;

    /**
     * @api
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
    ): BatchResponseSubscriptionResponse;
}
