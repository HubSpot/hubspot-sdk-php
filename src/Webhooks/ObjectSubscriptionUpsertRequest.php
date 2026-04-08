<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\ObjectSubscriptionUpsertRequest\Action;
use HubspotSDK\Webhooks\ObjectSubscriptionUpsertRequest\SubscriptionType;

/**
 * @phpstan-type ObjectSubscriptionUpsertRequestShape = array{
 *   actions: list<Action|value-of<Action>>,
 *   objectIDs: list<int>,
 *   objectTypeID: string,
 *   portalID: int,
 *   properties: list<string>,
 *   subscriptionType: SubscriptionType|value-of<SubscriptionType>,
 * }
 */
final class ObjectSubscriptionUpsertRequest implements BaseModel
{
    /** @use SdkModel<ObjectSubscriptionUpsertRequestShape> */
    use SdkModel;

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

    /**
     * `new ObjectSubscriptionUpsertRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectSubscriptionUpsertRequest::with(
     *   actions: ...,
     *   objectIDs: ...,
     *   objectTypeID: ...,
     *   portalID: ...,
     *   properties: ...,
     *   subscriptionType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectSubscriptionUpsertRequest)
     *   ->withActions(...)
     *   ->withObjectIDs(...)
     *   ->withObjectTypeID(...)
     *   ->withPortalID(...)
     *   ->withProperties(...)
     *   ->withSubscriptionType(...)
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
     * @param SubscriptionType|value-of<SubscriptionType> $subscriptionType
     */
    public static function with(
        array $actions,
        array $objectIDs,
        string $objectTypeID,
        int $portalID,
        array $properties,
        SubscriptionType|string $subscriptionType = 'OBJECT',
    ): self {
        $self = new self;

        $self['actions'] = $actions;
        $self['objectIDs'] = $objectIDs;
        $self['objectTypeID'] = $objectTypeID;
        $self['portalID'] = $portalID;
        $self['properties'] = $properties;
        $self['subscriptionType'] = $subscriptionType;

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
}
