<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

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

    /**
     * An internal ID of the list.
     */
    #[Required('listId')]
    public string $listID;

    /**
     * A number that represents a version of the list.
     */
    #[Required]
    public int $listVersion;

    /**
     * The name of the list.
     */
    #[Required]
    public string $name;

    /**
     * The internal ID of the object type of the list.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * Represents the current processing status of the list.
     */
    #[Required]
    public string $processingStatus;

    /**
     * Processing type of the list.
     */
    #[Required]
    public string $processingType;

    /**
     * Timestamp of the creation of the list.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * The ID of the user who created the list.
     */
    #[Optional('createdById')]
    public ?string $createdByID;

    /**
     * Timestamp of the deletion of the list.
     */
    #[Optional]
    public ?\DateTimeInterface $deletedAt;

    /**
     * Timestamp of the last update of the list filters.
     */
    #[Optional]
    public ?\DateTimeInterface $filtersUpdatedAt;

    /**
     * The size of the result list.
     */
    #[Optional]
    public ?int $size;

    /**
     * Timestamp of the last update of the list.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The ID of the user who last updated the list.
     */
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

    /**
     * An internal ID of the list.
     */
    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    /**
     * A number that represents a version of the list.
     */
    public function withListVersion(int $listVersion): self
    {
        $self = clone $this;
        $self['listVersion'] = $listVersion;

        return $self;
    }

    /**
     * The name of the list.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The internal ID of the object type of the list.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * Represents the current processing status of the list.
     */
    public function withProcessingStatus(string $processingStatus): self
    {
        $self = clone $this;
        $self['processingStatus'] = $processingStatus;

        return $self;
    }

    /**
     * Processing type of the list.
     */
    public function withProcessingType(string $processingType): self
    {
        $self = clone $this;
        $self['processingType'] = $processingType;

        return $self;
    }

    /**
     * Timestamp of the creation of the list.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The ID of the user who created the list.
     */
    public function withCreatedByID(string $createdByID): self
    {
        $self = clone $this;
        $self['createdByID'] = $createdByID;

        return $self;
    }

    /**
     * Timestamp of the deletion of the list.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }

    /**
     * Timestamp of the last update of the list filters.
     */
    public function withFiltersUpdatedAt(
        \DateTimeInterface $filtersUpdatedAt
    ): self {
        $self = clone $this;
        $self['filtersUpdatedAt'] = $filtersUpdatedAt;

        return $self;
    }

    /**
     * The size of the result list.
     */
    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * Timestamp of the last update of the list.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The ID of the user who last updated the list.
     */
    public function withUpdatedByID(string $updatedByID): self
    {
        $self = clone $this;
        $self['updatedByID'] = $updatedByID;

        return $self;
    }
}
