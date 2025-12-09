<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIFlowListingShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   flowType: string,
 *   isEnabled: bool,
 *   objectTypeId: string,
 *   revisionId: string,
 *   updatedAt: \DateTimeInterface,
 *   name?: string|null,
 *   uuid?: string|null,
 * }
 */
final class APIFlowListing implements BaseModel
{
    /** @use SdkModel<APIFlowListingShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $flowType;

    #[Api]
    public bool $isEnabled;

    #[Api]
    public string $objectTypeId;

    #[Api]
    public string $revisionId;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?string $name;

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
     *   objectTypeId: ...,
     *   revisionId: ...,
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
        string $objectTypeId,
        string $revisionId,
        \DateTimeInterface $updatedAt,
        ?string $name = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['flowType'] = $flowType;
        $obj['isEnabled'] = $isEnabled;
        $obj['objectTypeId'] = $objectTypeId;
        $obj['revisionId'] = $revisionId;
        $obj['updatedAt'] = $updatedAt;

        null !== $name && $obj['name'] = $name;
        null !== $uuid && $obj['uuid'] = $uuid;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withFlowType(string $flowType): self
    {
        $obj = clone $this;
        $obj['flowType'] = $flowType;

        return $obj;
    }

    public function withIsEnabled(bool $isEnabled): self
    {
        $obj = clone $this;
        $obj['isEnabled'] = $isEnabled;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeId'] = $objectTypeID;

        return $obj;
    }

    public function withRevisionID(string $revisionID): self
    {
        $obj = clone $this;
        $obj['revisionId'] = $revisionID;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj['uuid'] = $uuid;

        return $obj;
    }
}
