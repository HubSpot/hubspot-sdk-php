<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_list = array{
 *   listID: string,
 *   listVersion: int,
 *   name: string,
 *   objectTypeID: string,
 *   processingStatus: string,
 *   processingType: string,
 *   createdAt?: \DateTimeInterface,
 *   createdByID?: string,
 *   deletedAt?: \DateTimeInterface,
 *   filtersUpdatedAt?: \DateTimeInterface,
 *   size?: int,
 *   updatedAt?: \DateTimeInterface,
 *   updatedByID?: string,
 * }
 */
final class PublicList implements BaseModel
{
    /** @use SdkModel<public_list> */
    use SdkModel;

    #[Api('listId')]
    public string $listID;

    #[Api]
    public int $listVersion;

    #[Api]
    public string $name;

    #[Api('objectTypeId')]
    public string $objectTypeID;

    #[Api]
    public string $processingStatus;

    #[Api]
    public string $processingType;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api('createdById', optional: true)]
    public ?string $createdByID;

    #[Api(optional: true)]
    public ?\DateTimeInterface $deletedAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $filtersUpdatedAt;

    #[Api(optional: true)]
    public ?int $size;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api('updatedById', optional: true)]
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
        $obj = new self;

        $obj->listID = $listID;
        $obj->listVersion = $listVersion;
        $obj->name = $name;
        $obj->objectTypeID = $objectTypeID;
        $obj->processingStatus = $processingStatus;
        $obj->processingType = $processingType;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdByID && $obj->createdByID = $createdByID;
        null !== $deletedAt && $obj->deletedAt = $deletedAt;
        null !== $filtersUpdatedAt && $obj->filtersUpdatedAt = $filtersUpdatedAt;
        null !== $size && $obj->size = $size;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedByID && $obj->updatedByID = $updatedByID;

        return $obj;
    }

    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj->listID = $listID;

        return $obj;
    }

    public function withListVersion(int $listVersion): self
    {
        $obj = clone $this;
        $obj->listVersion = $listVersion;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withProcessingStatus(string $processingStatus): self
    {
        $obj = clone $this;
        $obj->processingStatus = $processingStatus;

        return $obj;
    }

    public function withProcessingType(string $processingType): self
    {
        $obj = clone $this;
        $obj->processingType = $processingType;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withCreatedByID(string $createdByID): self
    {
        $obj = clone $this;
        $obj->createdByID = $createdByID;

        return $obj;
    }

    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj->deletedAt = $deletedAt;

        return $obj;
    }

    public function withFiltersUpdatedAt(
        \DateTimeInterface $filtersUpdatedAt
    ): self {
        $obj = clone $this;
        $obj->filtersUpdatedAt = $filtersUpdatedAt;

        return $obj;
    }

    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUpdatedByID(string $updatedByID): self
    {
        $obj = clone $this;
        $obj->updatedByID = $updatedByID;

        return $obj;
    }
}
