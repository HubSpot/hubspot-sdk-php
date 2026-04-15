<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Webhooks\SubscriptionResponse1\Action;
use HubSpotSDK\Webhooks\SubscriptionResponse1\SubscriptionType;

/**
 * @phpstan-import-type ActionOverrideRequestShape from \HubSpotSDK\Webhooks\ActionOverrideRequest
 *
 * @phpstan-type SubscriptionResponse1Shape = array{
 *   id: int,
 *   actions: list<Action|value-of<Action>>,
 *   appID: int,
 *   createdAt: \DateTimeInterface,
 *   objectTypeID: string,
 *   subscriptionType: SubscriptionType|value-of<SubscriptionType>,
 *   updatedAt: \DateTimeInterface,
 *   actionOverrides?: array<string,ActionOverrideRequest|ActionOverrideRequestShape>|null,
 *   associatedObjectTypeIDs?: list<string>|null,
 *   createdBy?: int|null,
 *   deletedAt?: \DateTimeInterface|null,
 *   listIDs?: list<int>|null,
 *   objectIDs?: list<int>|null,
 *   portalID?: int|null,
 *   properties?: list<string>|null,
 * }
 */
final class SubscriptionResponse1 implements BaseModel
{
    /** @use SdkModel<SubscriptionResponse1Shape> */
    use SdkModel;

    /**
     * The unique identifier for the subscription, represented as an integer.
     */
    #[Required]
    public int $id;

    /**
     * An array of actions that trigger the subscription, such as 'CREATE', 'UPDATE', 'DELETE', 'MERGE', 'RESTORE', 'ASSOCIATION_ADDED', 'ASSOCIATION_REMOVED', 'SNAPSHOT', 'APP_INSTALL', 'APP_UNINSTALL', 'ADDED_TO_LIST', 'REMOVED_FROM_LIST', and 'GDPR_DELETE'.
     *
     * @var list<value-of<Action>> $actions
     */
    #[Required(list: Action::class)]
    public array $actions;

    /**
     * The unique identifier for the app associated with the subscription, represented as an integer.
     */
    #[Required('appId')]
    public int $appID;

    /**
     * The date and time when the subscription was created, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The identifier for the object type associated with the subscription, represented as a string.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * The type of subscription, which can be one of 'OBJECT', 'ASSOCIATION', 'EVENT', 'APP_LIFECYCLE_EVENT', 'LIST_MEMBERSHIP', or 'GDPR_PRIVACY_DELETION'.
     *
     * @var value-of<SubscriptionType> $subscriptionType
     */
    #[Required(enum: SubscriptionType::class)]
    public string $subscriptionType;

    /**
     * The date and time when the subscription was last updated, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * An object containing action overrides, where each key is an action and the value is an ActionOverrideRequest object.
     *
     * @var array<string,ActionOverrideRequest>|null $actionOverrides
     */
    #[Optional(map: ActionOverrideRequest::class)]
    public ?array $actionOverrides;

    /**
     * An array of strings representing the associated object type IDs for the subscription.
     *
     * @var list<string>|null $associatedObjectTypeIDs
     */
    #[Optional('associatedObjectTypeIds', list: 'string')]
    public ?array $associatedObjectTypeIDs;

    /**
     * The unique identifier for the user who created the subscription, represented as an integer.
     */
    #[Optional]
    public ?int $createdBy;

    /**
     * The date and time when the subscription was deleted, in ISO 8601 format.
     */
    #[Optional]
    public ?\DateTimeInterface $deletedAt;

    /**
     * An array of integers representing the list IDs associated with the subscription.
     *
     * @var list<int>|null $listIDs
     */
    #[Optional('listIds', list: 'int')]
    public ?array $listIDs;

    /**
     * An array of integers representing the object IDs associated with the subscription.
     *
     * @var list<int>|null $objectIDs
     */
    #[Optional('objectIds', list: 'int')]
    public ?array $objectIDs;

    /**
     * The unique identifier for the portal associated with the subscription, represented as an integer.
     */
    #[Optional('portalId')]
    public ?int $portalID;

    /**
     * An array of strings representing the properties associated with the subscription.
     *
     * @var list<string>|null $properties
     */
    #[Optional(list: 'string')]
    public ?array $properties;

    /**
     * `new SubscriptionResponse1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionResponse1::with(
     *   id: ...,
     *   actions: ...,
     *   appID: ...,
     *   createdAt: ...,
     *   objectTypeID: ...,
     *   subscriptionType: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionResponse1)
     *   ->withID(...)
     *   ->withActions(...)
     *   ->withAppID(...)
     *   ->withCreatedAt(...)
     *   ->withObjectTypeID(...)
     *   ->withSubscriptionType(...)
     *   ->withUpdatedAt(...)
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
     * @param SubscriptionType|value-of<SubscriptionType> $subscriptionType
     * @param array<string,ActionOverrideRequest|ActionOverrideRequestShape>|null $actionOverrides
     * @param list<string>|null $associatedObjectTypeIDs
     * @param list<int>|null $listIDs
     * @param list<int>|null $objectIDs
     * @param list<string>|null $properties
     */
    public static function with(
        int $id,
        array $actions,
        int $appID,
        \DateTimeInterface $createdAt,
        string $objectTypeID,
        SubscriptionType|string $subscriptionType,
        \DateTimeInterface $updatedAt,
        ?array $actionOverrides = null,
        ?array $associatedObjectTypeIDs = null,
        ?int $createdBy = null,
        ?\DateTimeInterface $deletedAt = null,
        ?array $listIDs = null,
        ?array $objectIDs = null,
        ?int $portalID = null,
        ?array $properties = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['actions'] = $actions;
        $self['appID'] = $appID;
        $self['createdAt'] = $createdAt;
        $self['objectTypeID'] = $objectTypeID;
        $self['subscriptionType'] = $subscriptionType;
        $self['updatedAt'] = $updatedAt;

        null !== $actionOverrides && $self['actionOverrides'] = $actionOverrides;
        null !== $associatedObjectTypeIDs && $self['associatedObjectTypeIDs'] = $associatedObjectTypeIDs;
        null !== $createdBy && $self['createdBy'] = $createdBy;
        null !== $deletedAt && $self['deletedAt'] = $deletedAt;
        null !== $listIDs && $self['listIDs'] = $listIDs;
        null !== $objectIDs && $self['objectIDs'] = $objectIDs;
        null !== $portalID && $self['portalID'] = $portalID;
        null !== $properties && $self['properties'] = $properties;

        return $self;
    }

    /**
     * The unique identifier for the subscription, represented as an integer.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * An array of actions that trigger the subscription, such as 'CREATE', 'UPDATE', 'DELETE', 'MERGE', 'RESTORE', 'ASSOCIATION_ADDED', 'ASSOCIATION_REMOVED', 'SNAPSHOT', 'APP_INSTALL', 'APP_UNINSTALL', 'ADDED_TO_LIST', 'REMOVED_FROM_LIST', and 'GDPR_DELETE'.
     *
     * @param list<Action|value-of<Action>> $actions
     */
    public function withActions(array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }

    /**
     * The unique identifier for the app associated with the subscription, represented as an integer.
     */
    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * The date and time when the subscription was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The identifier for the object type associated with the subscription, represented as a string.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The type of subscription, which can be one of 'OBJECT', 'ASSOCIATION', 'EVENT', 'APP_LIFECYCLE_EVENT', 'LIST_MEMBERSHIP', or 'GDPR_PRIVACY_DELETION'.
     *
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
     * The date and time when the subscription was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * An object containing action overrides, where each key is an action and the value is an ActionOverrideRequest object.
     *
     * @param array<string,ActionOverrideRequest|ActionOverrideRequestShape> $actionOverrides
     */
    public function withActionOverrides(array $actionOverrides): self
    {
        $self = clone $this;
        $self['actionOverrides'] = $actionOverrides;

        return $self;
    }

    /**
     * An array of strings representing the associated object type IDs for the subscription.
     *
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
     * The unique identifier for the user who created the subscription, represented as an integer.
     */
    public function withCreatedBy(int $createdBy): self
    {
        $self = clone $this;
        $self['createdBy'] = $createdBy;

        return $self;
    }

    /**
     * The date and time when the subscription was deleted, in ISO 8601 format.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }

    /**
     * An array of integers representing the list IDs associated with the subscription.
     *
     * @param list<int> $listIDs
     */
    public function withListIDs(array $listIDs): self
    {
        $self = clone $this;
        $self['listIDs'] = $listIDs;

        return $self;
    }

    /**
     * An array of integers representing the object IDs associated with the subscription.
     *
     * @param list<int> $objectIDs
     */
    public function withObjectIDs(array $objectIDs): self
    {
        $self = clone $this;
        $self['objectIDs'] = $objectIDs;

        return $self;
    }

    /**
     * The unique identifier for the portal associated with the subscription, represented as an integer.
     */
    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * An array of strings representing the properties associated with the subscription.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
