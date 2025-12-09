<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicAPIUserActionEventShape = array{
 *   id: string,
 *   actingUser: ActingUser,
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
     * @param ActingUser|array{userID: int, userEmail?: string|null} $actingUser
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
        $obj = new self;

        $obj['id'] = $id;
        $obj['actingUser'] = $actingUser;
        $obj['action'] = $action;
        $obj['category'] = $category;
        $obj['occurredAt'] = $occurredAt;

        null !== $subCategory && $obj['subCategory'] = $subCategory;
        null !== $targetObjectID && $obj['targetObjectID'] = $targetObjectID;

        return $obj;
    }

    /**
     * The unique ID of the activity.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param ActingUser|array{userID: int, userEmail?: string|null} $actingUser
     */
    public function withActingUser(ActingUser|array $actingUser): self
    {
        $obj = clone $this;
        $obj['actingUser'] = $actingUser;

        return $obj;
    }

    /**
     * The type of action taken.
     */
    public function withAction(string $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    /**
     * The category of the activity.
     */
    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj['category'] = $category;

        return $obj;
    }

    /**
     * The time that the action occurred at.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj['occurredAt'] = $occurredAt;

        return $obj;
    }

    /**
     * The subcategory of the activity.
     */
    public function withSubCategory(string $subCategory): self
    {
        $obj = clone $this;
        $obj['subCategory'] = $subCategory;

        return $obj;
    }

    /**
     * The ID of the impacted object.
     */
    public function withTargetObjectID(string $targetObjectID): self
    {
        $obj = clone $this;
        $obj['targetObjectID'] = $targetObjectID;

        return $obj;
    }
}
