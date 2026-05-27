<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\AssociationSubscriptionUpsertRequest\Action;
use HubSpotSDK\AssociationSubscriptionUpsertRequest\SubscriptionType;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AssociationSubscriptionUpsertRequestShape = array{
 *   actions: list<Action|value-of<Action>>,
 *   associatedObjectTypeIDs: list<string>,
 *   objectIDs: list<int>,
 *   objectTypeID: string,
 *   portalID: int,
 *   subscriptionType: SubscriptionType|value-of<SubscriptionType>,
 * }
 */
final class AssociationSubscriptionUpsertRequest implements BaseModel
{
    /** @use SdkModel<AssociationSubscriptionUpsertRequestShape> */
    use SdkModel;

    /** @var list<value-of<Action>> $actions */
    #[Required(list: Action::class)]
    public array $actions;

    /** @var list<string> $associatedObjectTypeIDs */
    #[Required('associatedObjectTypeIds', list: 'string')]
    public array $associatedObjectTypeIDs;

    /** @var list<int> $objectIDs */
    #[Required('objectIds', list: 'int')]
    public array $objectIDs;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required('portalId')]
    public int $portalID;

    /** @var value-of<SubscriptionType> $subscriptionType */
    #[Required(enum: SubscriptionType::class)]
    public string $subscriptionType;

    /**
     * `new AssociationSubscriptionUpsertRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationSubscriptionUpsertRequest::with(
     *   actions: ...,
     *   associatedObjectTypeIDs: ...,
     *   objectIDs: ...,
     *   objectTypeID: ...,
     *   portalID: ...,
     *   subscriptionType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationSubscriptionUpsertRequest)
     *   ->withActions(...)
     *   ->withAssociatedObjectTypeIDs(...)
     *   ->withObjectIDs(...)
     *   ->withObjectTypeID(...)
     *   ->withPortalID(...)
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
     * @param list<string> $associatedObjectTypeIDs
     * @param list<int> $objectIDs
     * @param SubscriptionType|value-of<SubscriptionType> $subscriptionType
     */
    public static function with(
        array $actions,
        array $associatedObjectTypeIDs,
        array $objectIDs,
        string $objectTypeID,
        int $portalID,
        SubscriptionType|string $subscriptionType = 'ASSOCIATION',
    ): self {
        $self = new self;

        $self['actions'] = $actions;
        $self['associatedObjectTypeIDs'] = $associatedObjectTypeIDs;
        $self['objectIDs'] = $objectIDs;
        $self['objectTypeID'] = $objectTypeID;
        $self['portalID'] = $portalID;
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
     * @param list<string> $associatedObjectTypeIDs
     */
    public function withAssociatedObjectTypeIDs(
        array $associatedObjectTypeIDs
    ): self {
        $self = clone $this;
        $self['associatedObjectTypeIDs'] = $associatedObjectTypeIDs;

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
