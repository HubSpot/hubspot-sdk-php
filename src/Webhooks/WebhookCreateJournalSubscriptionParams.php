<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Webhooks\WebhookCreateJournalSubscriptionParams\Action;
use HubSpotSDK\Webhooks\WebhookCreateJournalSubscriptionParams\SubscriptionType;

/**
 * Create a new subscription in the Webhooks Journal for the specified version. This endpoint allows you to define the subscription details by providing the necessary information in the request body. It supports various types of subscriptions, including object, association, event, app lifecycle event, list membership, and GDPR privacy deletion. Ensure that all required fields are included in the request to successfully create a subscription.
 *
 * @see HubSpotSDK\Services\WebhooksService::createJournalSubscription()
 *
 * @phpstan-type WebhookCreateJournalSubscriptionParamsShape = array{
 *   actions: list<Action|value-of<Action>>,
 *   objectIDs: list<int>,
 *   objectTypeID: string,
 *   portalID: int,
 *   properties: list<string>,
 *   subscriptionType: SubscriptionType|value-of<SubscriptionType>,
 *   associatedObjectTypeIDs: list<string>,
 *   eventTypeID: string,
 *   listIDs: list<int>,
 * }
 */
final class WebhookCreateJournalSubscriptionParams implements BaseModel
{
    /** @use SdkModel<WebhookCreateJournalSubscriptionParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<value-of<Action>> $actions */
    #[Required(list: Action::class)]
    public array $actions;

    /** @var list<int> $objectIDs */
    #[Required('objectIds', list: 'int')]
    public array $objectIDs;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required('portalId')]
    public int $portalID;

    /** @var list<string> $properties */
    #[Required(list: 'string')]
    public array $properties;

    /** @var value-of<SubscriptionType> $subscriptionType */
    #[Required(enum: SubscriptionType::class)]
    public string $subscriptionType;

    /** @var list<string> $associatedObjectTypeIDs */
    #[Required('associatedObjectTypeIds', list: 'string')]
    public array $associatedObjectTypeIDs;

    #[Required('eventTypeId')]
    public string $eventTypeID;

    /** @var list<int> $listIDs */
    #[Required('listIds', list: 'int')]
    public array $listIDs;

    /**
     * `new WebhookCreateJournalSubscriptionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookCreateJournalSubscriptionParams::with(
     *   actions: ...,
     *   objectIDs: ...,
     *   objectTypeID: ...,
     *   portalID: ...,
     *   properties: ...,
     *   subscriptionType: ...,
     *   associatedObjectTypeIDs: ...,
     *   eventTypeID: ...,
     *   listIDs: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookCreateJournalSubscriptionParams)
     *   ->withActions(...)
     *   ->withObjectIDs(...)
     *   ->withObjectTypeID(...)
     *   ->withPortalID(...)
     *   ->withProperties(...)
     *   ->withSubscriptionType(...)
     *   ->withAssociatedObjectTypeIDs(...)
     *   ->withEventTypeID(...)
     *   ->withListIDs(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Action|value-of<Action>> $actions
     * @param list<int> $objectIDs
     * @param list<string> $properties
     * @param list<string> $associatedObjectTypeIDs
     * @param list<int> $listIDs
     * @param SubscriptionType|value-of<SubscriptionType> $subscriptionType
     */
    public static function with(
        array $actions,
        array $objectIDs,
        string $objectTypeID,
        int $portalID,
        array $properties,
        array $associatedObjectTypeIDs,
        string $eventTypeID,
        array $listIDs,
        SubscriptionType|string $subscriptionType = 'GDPR_PRIVACY_DELETION',
    ): self {
        $self = new self;

        $self['actions'] = $actions;
        $self['objectIDs'] = $objectIDs;
        $self['objectTypeID'] = $objectTypeID;
        $self['portalID'] = $portalID;
        $self['properties'] = $properties;
        $self['subscriptionType'] = $subscriptionType;
        $self['associatedObjectTypeIDs'] = $associatedObjectTypeIDs;
        $self['eventTypeID'] = $eventTypeID;
        $self['listIDs'] = $listIDs;

        return $self;
    }

    /**
     * @param list<Action|value-of<Action>> $actions
     */
    public function withActions(array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }

    /**
     * @param list<int> $objectIDs
     */
    public function withObjectIDs(array $objectIDs): self
    {
        $self = clone $this;
        $self['objectIDs'] = $objectIDs;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param SubscriptionType|value-of<SubscriptionType> $subscriptionType
     */
    public function withSubscriptionType(
        SubscriptionType|string $subscriptionType
    ): self {
        $self = clone $this;
        $self['subscriptionType'] = $subscriptionType;

        return $self;
    }

    /**
     * @param list<string> $associatedObjectTypeIDs
     */
    public function withAssociatedObjectTypeIDs(
        array $associatedObjectTypeIDs
    ): self {
        $self = clone $this;
        $self['associatedObjectTypeIDs'] = $associatedObjectTypeIDs;

        return $self;
    }

    public function withEventTypeID(string $eventTypeID): self
    {
        $self = clone $this;
        $self['eventTypeID'] = $eventTypeID;

        return $self;
    }

    /**
     * @param list<int> $listIDs
     */
    public function withListIDs(array $listIDs): self
    {
        $self = clone $this;
        $self['listIDs'] = $listIDs;

        return $self;
    }
}
