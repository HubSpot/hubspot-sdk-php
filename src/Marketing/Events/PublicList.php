<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicListShape = array{
 *   listID: string,
 *   listVersion: int,
 *   name: string,
 *   objectTypeID: string,
 *   processingStatus: string,
 *   processingType: string,
 *   createdAt?: \DateTimeInterface|null,
 *   createdByID?: string|null,
 *   deletedAt?: \DateTimeInterface|null,
 *   filtersUpdatedAt?: \DateTimeInterface|null,
 *   size?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedByID?: string|null,
 * }
 */
final class PublicList implements BaseModel
{
    /** @use SdkModel<PublicListShape> */
    use SdkModel;

    #[Required('listId')]
    public string $listID;

    #[Required]
    public int $listVersion;

    #[Required]
    public string $name;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required]
    public string $processingStatus;

    #[Required]
    public string $processingType;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional('createdById')]
    public ?string $createdByID;

    #[Optional]
    public ?\DateTimeInterface $deletedAt;

    #[Optional]
    public ?\DateTimeInterface $filtersUpdatedAt;

    #[Optional]
    public ?int $size;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    #[Optional('updatedById')]
    public ?string $updatedByID;

    /**
     * `new PublicList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicList::with(
     *   listID: ...,
     *   listVersion: ...,
     *   name: ...,
     *   objectTypeID: ...,
     *   processingStatus: ...,
     *   processingType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicList)
     *   ->withListID(...)
     *   ->withListVersion(...)
     *   ->withName(...)
     *   ->withObjectTypeID(...)
     *   ->withProcessingStatus(...)
     *   ->withProcessingType(...)
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
        string $listID,
        int $listVersion,
        string $name,
        string $objectTypeID,
        string $processingStatus,
        string $processingType,
        ?\DateTimeInterface $createdAt = null,
        ?string $createdByID = null,
        ?\DateTimeInterface $deletedAt = null,
        ?\DateTimeInterface $filtersUpdatedAt = null,
        ?int $size = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $updatedByID = null,
    ): self {
        $self = new self;

        $self['listID'] = $listID;
        $self['listVersion'] = $listVersion;
        $self['name'] = $name;
        $self['objectTypeID'] = $objectTypeID;
        $self['processingStatus'] = $processingStatus;
        $self['processingType'] = $processingType;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $createdByID && $self['createdByID'] = $createdByID;
        null !== $deletedAt && $self['deletedAt'] = $deletedAt;
        null !== $filtersUpdatedAt && $self['filtersUpdatedAt'] = $filtersUpdatedAt;
        null !== $size && $self['size'] = $size;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedByID && $self['updatedByID'] = $updatedByID;

        return $self;
    }

    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    public function withListVersion(int $listVersion): self
    {
        $self = clone $this;
        $self['listVersion'] = $listVersion;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withProcessingStatus(string $processingStatus): self
    {
        $self = clone $this;
        $self['processingStatus'] = $processingStatus;

        return $self;
    }

    public function withProcessingType(string $processingType): self
    {
        $self = clone $this;
        $self['processingType'] = $processingType;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withCreatedByID(string $createdByID): self
    {
        $self = clone $this;
        $self['createdByID'] = $createdByID;

        return $self;
    }

    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }

    public function withFiltersUpdatedAt(
        \DateTimeInterface $filtersUpdatedAt
    ): self {
        $self = clone $this;
        $self['filtersUpdatedAt'] = $filtersUpdatedAt;

        return $self;
    }

    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withUpdatedByID(string $updatedByID): self
    {
        $self = clone $this;
        $self['updatedByID'] = $updatedByID;

        return $self;
    }
}
