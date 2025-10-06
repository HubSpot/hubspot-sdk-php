<?php

declare(strict_types=1);

namespace HubspotSDK\Account\AuditLogs;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_api_user_action_event = array{
 *   id: string,
 *   actingUser: ActingUser,
 *   action: string,
 *   category: string,
 *   occurredAt: \DateTimeInterface,
 *   subCategory?: string,
 *   targetObjectID?: string,
 * }
 */
final class PublicAPIUserActionEvent implements BaseModel
{
    /** @use SdkModel<public_api_user_action_event> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public ActingUser $actingUser;

    #[Api]
    public string $action;

    #[Api]
    public string $category;

    #[Api]
    public \DateTimeInterface $occurredAt;

    #[Api(optional: true)]
    public ?string $subCategory;

    #[Api('targetObjectId', optional: true)]
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
     */
    public static function with(
        string $id,
        ActingUser $actingUser,
        string $action,
        string $category,
        \DateTimeInterface $occurredAt,
        ?string $subCategory = null,
        ?string $targetObjectID = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->actingUser = $actingUser;
        $obj->action = $action;
        $obj->category = $category;
        $obj->occurredAt = $occurredAt;

        null !== $subCategory && $obj->subCategory = $subCategory;
        null !== $targetObjectID && $obj->targetObjectID = $targetObjectID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withActingUser(ActingUser $actingUser): self
    {
        $obj = clone $this;
        $obj->actingUser = $actingUser;

        return $obj;
    }

    public function withAction(string $action): self
    {
        $obj = clone $this;
        $obj->action = $action;

        return $obj;
    }

    public function withCategory(string $category): self
    {
        $obj = clone $this;
        $obj->category = $category;

        return $obj;
    }

    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj->occurredAt = $occurredAt;

        return $obj;
    }

    public function withSubCategory(string $subCategory): self
    {
        $obj = clone $this;
        $obj->subCategory = $subCategory;

        return $obj;
    }

    public function withTargetObjectID(string $targetObjectID): self
    {
        $obj = clone $this;
        $obj->targetObjectID = $targetObjectID;

        return $obj;
    }
}
