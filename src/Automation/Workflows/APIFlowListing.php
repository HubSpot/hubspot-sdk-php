<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_flow_listing = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   flowType: string,
 *   isEnabled: bool,
 *   objectTypeID: string,
 *   revisionID: string,
 *   updatedAt: \DateTimeInterface,
 *   name?: string,
 *   uuid?: string,
 * }
 */
final class APIFlowListing implements BaseModel
{
    /** @use SdkModel<api_flow_listing> */
    use SdkModel;

    /**
     * The unique ID for this flow. This is auto-generated when creating the flow.
     */
    #[Api]
    public string $id;

    /**
     * The timestamp this flow was created.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * Deprecated. Will be removed.
     */
    #[Api]
    public string $flowType;

    /**
     * This controls whether or not the flow is "enabled" if it's actively listening for enrollment triggers and executing actions. If this is `false` the flow is not accepting any enrollments or executing any actions.
     */
    #[Api]
    public bool $isEnabled;

    /**
     * The CRM object type for objects that can be enrolled into this flow.
     */
    #[Api('objectTypeId')]
    public string $objectTypeID;

    /**
     * Deprecated. Will be removed.
     */
    #[Api('revisionId')]
    public string $revisionID;

    /**
     * The timestamp this flow was last updated.
     */
    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * The user-provided name for this flow. Names get auto-created for workflows that are created without a name.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * An optional unique key for this flow. This is only unique per-portal.
     */
    #[Api(optional: true)]
    public ?string $uuid;

    /**
     * `new APIFlowListing()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIFlowListing::with(
     *   id: ...,
     *   createdAt: ...,
     *   flowType: ...,
     *   isEnabled: ...,
     *   objectTypeID: ...,
     *   revisionID: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIFlowListing)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withFlowType(...)
     *   ->withIsEnabled(...)
     *   ->withObjectTypeID(...)
     *   ->withRevisionID(...)
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
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $flowType,
        bool $isEnabled,
        string $objectTypeID,
        string $revisionID,
        \DateTimeInterface $updatedAt,
        ?string $name = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->flowType = $flowType;
        $obj->isEnabled = $isEnabled;
        $obj->objectTypeID = $objectTypeID;
        $obj->revisionID = $revisionID;
        $obj->updatedAt = $updatedAt;

        null !== $name && $obj->name = $name;
        null !== $uuid && $obj->uuid = $uuid;

        return $obj;
    }

    /**
     * The unique ID for this flow. This is auto-generated when creating the flow.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The timestamp this flow was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Deprecated. Will be removed.
     */
    public function withFlowType(string $flowType): self
    {
        $obj = clone $this;
        $obj->flowType = $flowType;

        return $obj;
    }

    /**
     * This controls whether or not the flow is "enabled" if it's actively listening for enrollment triggers and executing actions. If this is `false` the flow is not accepting any enrollments or executing any actions.
     */
    public function withIsEnabled(bool $isEnabled): self
    {
        $obj = clone $this;
        $obj->isEnabled = $isEnabled;

        return $obj;
    }

    /**
     * The CRM object type for objects that can be enrolled into this flow.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    /**
     * Deprecated. Will be removed.
     */
    public function withRevisionID(string $revisionID): self
    {
        $obj = clone $this;
        $obj->revisionID = $revisionID;

        return $obj;
    }

    /**
     * The timestamp this flow was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The user-provided name for this flow. Names get auto-created for workflows that are created without a name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * An optional unique key for this flow. This is only unique per-portal.
     */
    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj->uuid = $uuid;

        return $obj;
    }
}
