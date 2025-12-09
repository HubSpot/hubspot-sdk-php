<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicListShape = array{
 *   listId: string,
 *   listVersion: int,
 *   name: string,
 *   objectTypeId: string,
 *   processingStatus: string,
 *   processingType: string,
 *   createdAt?: \DateTimeInterface|null,
 *   createdById?: string|null,
 *   deletedAt?: \DateTimeInterface|null,
 *   filtersUpdatedAt?: \DateTimeInterface|null,
 *   size?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedById?: string|null,
 * }
 */
final class PublicList implements BaseModel
{
    /** @use SdkModel<PublicListShape> */
    use SdkModel;

    #[Required]
    public string $listId;

    #[Required]
    public int $listVersion;

    #[Required]
    public string $name;

    #[Required]
    public string $objectTypeId;

    #[Required]
    public string $processingStatus;

    #[Required]
    public string $processingType;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?string $createdById;

    #[Optional]
    public ?\DateTimeInterface $deletedAt;

    #[Optional]
    public ?\DateTimeInterface $filtersUpdatedAt;

    #[Optional]
    public ?int $size;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    #[Optional]
    public ?string $updatedById;

    /**
     * `new PublicList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicList::with(
     *   listId: ...,
     *   listVersion: ...,
     *   name: ...,
     *   objectTypeId: ...,
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
        string $listId,
        int $listVersion,
        string $name,
        string $objectTypeId,
        string $processingStatus,
        string $processingType,
        ?\DateTimeInterface $createdAt = null,
        ?string $createdById = null,
        ?\DateTimeInterface $deletedAt = null,
        ?\DateTimeInterface $filtersUpdatedAt = null,
        ?int $size = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $updatedById = null,
    ): self {
        $obj = new self;

        $obj['listId'] = $listId;
        $obj['listVersion'] = $listVersion;
        $obj['name'] = $name;
        $obj['objectTypeId'] = $objectTypeId;
        $obj['processingStatus'] = $processingStatus;
        $obj['processingType'] = $processingType;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $createdById && $obj['createdById'] = $createdById;
        null !== $deletedAt && $obj['deletedAt'] = $deletedAt;
        null !== $filtersUpdatedAt && $obj['filtersUpdatedAt'] = $filtersUpdatedAt;
        null !== $size && $obj['size'] = $size;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $updatedById && $obj['updatedById'] = $updatedById;

        return $obj;
    }

    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj['listId'] = $listID;

        return $obj;
    }

    public function withListVersion(int $listVersion): self
    {
        $obj = clone $this;
        $obj['listVersion'] = $listVersion;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeId'] = $objectTypeID;

        return $obj;
    }

    public function withProcessingStatus(string $processingStatus): self
    {
        $obj = clone $this;
        $obj['processingStatus'] = $processingStatus;

        return $obj;
    }

    public function withProcessingType(string $processingType): self
    {
        $obj = clone $this;
        $obj['processingType'] = $processingType;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withCreatedByID(string $createdByID): self
    {
        $obj = clone $this;
        $obj['createdById'] = $createdByID;

        return $obj;
    }

    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj['deletedAt'] = $deletedAt;

        return $obj;
    }

    public function withFiltersUpdatedAt(
        \DateTimeInterface $filtersUpdatedAt
    ): self {
        $obj = clone $this;
        $obj['filtersUpdatedAt'] = $filtersUpdatedAt;

        return $obj;
    }

    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj['size'] = $size;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withUpdatedByID(string $updatedByID): self
    {
        $obj = clone $this;
        $obj['updatedById'] = $updatedByID;

        return $obj;
    }
}
