<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ActingUserShape from \HubspotSDK\Account\Activity\ActingUser
 *
 * @phpstan-type PublicAPIUserActionEventShape = array{
 *   id: string,
 *   actingUser: ActingUser|ActingUserShape,
 *   action: string,
 *   category: string,
 *   occurredAt: \DateTimeInterface,
 *   subCategory?: string|null,
 *   targetObjectID?: string|null,
 * }
 */
final class PublicAPIUserActionEvent implements BaseModel
{
    /** @use SdkModel<PublicAPIUserActionEventShape> */
    use SdkModel;

    /**
     * The unique ID of the activity.
     */
    #[Required]
    public string $id;

    #[Required]
    public ActingUser $actingUser;

    /**
     * The type of action taken.
     */
    #[Required]
    public string $action;

    /**
     * The category of the activity.
     */
    #[Required]
    public string $category;

    /**
     * The time that the action occurred at.
     */
    #[Required]
    public \DateTimeInterface $occurredAt;

    /**
     * The subcategory of the activity.
     */
    #[Optional]
    public ?string $subCategory;

    /**
     * The ID of the impacted object.
     */
    #[Optional('targetObjectId')]
    public ?string $targetObjectID;

    /**
     * `new PublicAPIUserActionEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAPIUserActionEvent::with(
     *   id: ..., actingUser: ..., action: ..., category: ..., occurredAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAPIUserActionEvent)
     *   ->withID(...)
     *   ->withActingUser(...)
     *   ->withAction(...)
     *   ->withCategory(...)
     *   ->withOccurredAt(...)
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
     * @param ActingUserShape $actingUser
     */
    public static function with(
        string $id,
        ActingUser|array $actingUser,
        string $action,
        string $category,
        \DateTimeInterface $occurredAt,
        ?string $subCategory = null,
        ?string $targetObjectID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['actingUser'] = $actingUser;
        $self['action'] = $action;
        $self['category'] = $category;
        $self['occurredAt'] = $occurredAt;

        null !== $subCategory && $self['subCategory'] = $subCategory;
        null !== $targetObjectID && $self['targetObjectID'] = $targetObjectID;

        return $self;
    }

    /**
     * The unique ID of the activity.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param ActingUserShape $actingUser
     */
    public function withActingUser(ActingUser|array $actingUser): self
    {
        $self = clone $this;
        $self['actingUser'] = $actingUser;

        return $self;
    }

    /**
     * The type of action taken.
     */
    public function withAction(string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * The category of the activity.
     */
    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * The time that the action occurred at.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * The subcategory of the activity.
     */
    public function withSubCategory(string $subCategory): self
    {
        $self = clone $this;
        $self['subCategory'] = $subCategory;

        return $self;
    }

    /**
     * The ID of the impacted object.
     */
    public function withTargetObjectID(string $targetObjectID): self
    {
        $self = clone $this;
        $self['targetObjectID'] = $targetObjectID;

        return $self;
    }
}
