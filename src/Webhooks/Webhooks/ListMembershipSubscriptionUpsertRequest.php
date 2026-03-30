<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\Webhooks\ListMembershipSubscriptionUpsertRequest\Action;
use HubspotSDK\Webhooks\Webhooks\ListMembershipSubscriptionUpsertRequest\SubscriptionType;

/**
 * @phpstan-type ListMembershipSubscriptionUpsertRequestShape = array{
 *   actions: list<Action|value-of<Action>>,
 *   listIDs: list<int>,
 *   objectIDs: list<int>,
 *   portalID: int,
 *   subscriptionType: SubscriptionType|value-of<SubscriptionType>,
 * }
 */
final class ListMembershipSubscriptionUpsertRequest implements BaseModel
{
    /** @use SdkModel<ListMembershipSubscriptionUpsertRequestShape> */
    use SdkModel;

    /** @var list<value-of<Action>> $actions */
    #[Required(list: Action::class)]
    public array $actions;

    /** @var list<int> $listIDs */
    #[Required('listIds', list: 'int')]
    public array $listIDs;

    /** @var list<int> $objectIDs */
    #[Required('objectIds', list: 'int')]
    public array $objectIDs;

    #[Required('portalId')]
    public int $portalID;

    /** @var value-of<SubscriptionType> $subscriptionType */
    #[Required(enum: SubscriptionType::class)]
    public string $subscriptionType;

    /**
     * `new ListMembershipSubscriptionUpsertRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListMembershipSubscriptionUpsertRequest::with(
     *   actions: ...,
     *   listIDs: ...,
     *   objectIDs: ...,
     *   portalID: ...,
     *   subscriptionType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListMembershipSubscriptionUpsertRequest)
     *   ->withActions(...)
     *   ->withListIDs(...)
     *   ->withObjectIDs(...)
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
     * @param list<int> $listIDs
     * @param list<int> $objectIDs
     * @param SubscriptionType|value-of<SubscriptionType> $subscriptionType
     */
    public static function with(
        array $actions,
        array $listIDs,
        array $objectIDs,
        int $portalID,
        SubscriptionType|string $subscriptionType = 'LIST_MEMBERSHIP',
    ): self {
        $self = new self;

        $self['actions'] = $actions;
        $self['listIDs'] = $listIDs;
        $self['objectIDs'] = $objectIDs;
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
     * @param list<int> $listIDs
     */
    public function withListIDs(array $listIDs): self
    {
        $self = clone $this;
        $self['listIDs'] = $listIDs;

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
