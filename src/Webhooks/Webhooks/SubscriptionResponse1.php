<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Webhooks;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\Webhooks\SubscriptionResponse1\Action;
use HubspotSDK\Webhooks\Webhooks\SubscriptionResponse1\SubscriptionType;

/**
 * @phpstan-type SubscriptionResponse1Shape = array{
 *   id: int,
 *   actions: list<Action|value-of<Action>>,
 *   appID: int,
 *   createdAt: \DateTimeInterface,
 *   objectTypeID: string,
 *   subscriptionType: SubscriptionType|value-of<SubscriptionType>,
 *   updatedAt: \DateTimeInterface,
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
     * The unique ID of the webhook subscription.
     */
    #[Required]
    public int $id;

    /** @var list<value-of<Action>> $actions */
    #[Required(list: Action::class)]
    public array $actions;

    #[Required('appId')]
    public int $appID;

    /**
     * The timestamp when the webhook subscription was created, in ISO 8601 format (e.g., 2020-02-29T12:30:00Z).
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The ID of the object type for the subscription. This can be a standard CRM object (e.g., 'contact', 'company', 'deal') or a custom object ID for custom object subscriptions.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /** @var value-of<SubscriptionType> $subscriptionType */
    #[Required(enum: SubscriptionType::class)]
    public string $subscriptionType;

    /**
     * The timestamp when the webhook subscription was last updated, in ISO 8601 format (e.g., 2020-02-29T12:30:00Z).
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /** @var list<string>|null $associatedObjectTypeIDs */
    #[Optional('associatedObjectTypeIds', list: 'string')]
    public ?array $associatedObjectTypeIDs;

    #[Optional]
    public ?int $createdBy;

    #[Optional]
    public ?\DateTimeInterface $deletedAt;

    /** @var list<int>|null $listIDs */
    #[Optional('listIds', list: 'int')]
    public ?array $listIDs;

    /** @var list<int>|null $objectIDs */
    #[Optional('objectIds', list: 'int')]
    public ?array $objectIDs;

    #[Optional('portalId')]
    public ?int $portalID;

    /** @var list<string>|null $properties */
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
     * The unique ID of the webhook subscription.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * The timestamp when the webhook subscription was created, in ISO 8601 format (e.g., 2020-02-29T12:30:00Z).
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The ID of the object type for the subscription. This can be a standard CRM object (e.g., 'contact', 'company', 'deal') or a custom object ID for custom object subscriptions.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

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
     * The timestamp when the webhook subscription was last updated, in ISO 8601 format (e.g., 2020-02-29T12:30:00Z).
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

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

    public function withCreatedBy(int $createdBy): self
    {
        $self = clone $this;
        $self['createdBy'] = $createdBy;

        return $self;
    }

    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

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
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
