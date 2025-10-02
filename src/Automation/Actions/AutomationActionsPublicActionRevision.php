<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_actions_public_action_revision = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   definition: AutomationActionsPublicActionDefinition,
 *   revisionID: string,
 * }
 */
final class AutomationActionsPublicActionRevision implements BaseModel
{
    /** @use SdkModel<automation_actions_public_action_revision> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public AutomationActionsPublicActionDefinition $definition;

    #[Api('revisionId')]
    public string $revisionID;

    /**
     * `new AutomationActionsPublicActionRevision()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsPublicActionRevision::with(
     *   id: ..., createdAt: ..., definition: ..., revisionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationActionsPublicActionRevision)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDefinition(...)
     *   ->withRevisionID(...)
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
        \DateTimeInterface $createdAt,
        AutomationActionsPublicActionDefinition $definition,
        string $revisionID,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->definition = $definition;
        $obj->revisionID = $revisionID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withDefinition(
        AutomationActionsPublicActionDefinition $definition
    ): self {
        $obj = clone $this;
        $obj->definition = $definition;

        return $obj;
    }

    public function withRevisionID(string $revisionID): self
    {
        $obj = clone $this;
        $obj->revisionID = $revisionID;

        return $obj;
    }
}
