<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIFlowListingShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   flowType: string,
 *   isEnabled: bool,
 *   objectTypeID: string,
 *   revisionID: string,
 *   updatedAt: \DateTimeInterface,
 *   name?: string|null,
 *   uuid?: string|null,
 * }
 */
final class APIFlowListing implements BaseModel
{
    /** @use SdkModel<APIFlowListingShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $flowType;

    #[Required]
    public bool $isEnabled;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required('revisionId')]
    public string $revisionID;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Optional]
    public ?string $name;

    #[Optional]
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
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['flowType'] = $flowType;
        $self['isEnabled'] = $isEnabled;
        $self['objectTypeID'] = $objectTypeID;
        $self['revisionID'] = $revisionID;
        $self['updatedAt'] = $updatedAt;

        null !== $name && $self['name'] = $name;
        null !== $uuid && $self['uuid'] = $uuid;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withFlowType(string $flowType): self
    {
        $self = clone $this;
        $self['flowType'] = $flowType;

        return $self;
    }

    public function withIsEnabled(bool $isEnabled): self
    {
        $self = clone $this;
        $self['isEnabled'] = $isEnabled;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withRevisionID(string $revisionID): self
    {
        $self = clone $this;
        $self['revisionID'] = $revisionID;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withUuid(string $uuid): self
    {
        $self = clone $this;
        $self['uuid'] = $uuid;

        return $self;
    }
}
