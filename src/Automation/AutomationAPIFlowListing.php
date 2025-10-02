<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_flow_listing = array{
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
final class AutomationAPIFlowListing implements BaseModel
{
    /** @use SdkModel<automation_api_flow_listing> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $flowType;

    #[Api]
    public bool $isEnabled;

    #[Api('objectTypeId')]
    public string $objectTypeID;

    #[Api('revisionId')]
    public string $revisionID;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $uuid;

    /**
     * `new AutomationAPIFlowListing()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIFlowListing::with(
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
     * (new AutomationAPIFlowListing)
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

    public function withFlowType(string $flowType): self
    {
        $obj = clone $this;
        $obj->flowType = $flowType;

        return $obj;
    }

    public function withIsEnabled(bool $isEnabled): self
    {
        $obj = clone $this;
        $obj->isEnabled = $isEnabled;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withRevisionID(string $revisionID): self
    {
        $obj = clone $this;
        $obj->revisionID = $revisionID;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj->uuid = $uuid;

        return $obj;
    }
}
