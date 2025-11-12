<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicObjectListSearchResultShape = array{
 *   additionalProperties: array<string,string>,
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
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedById?: string|null,
 * }
 */
final class PublicObjectListSearchResult implements BaseModel
{
    /** @use SdkModel<PublicObjectListSearchResultShape> */
    use SdkModel;

    /**
     * The name and value of any additional properties that exist for this list and that were included in the search request.
     *
     * @var array<string,string> $additionalProperties
     */
    #[Api(map: 'string')]
    public array $additionalProperties;

    /**
     * The **ILS ID** of the list.
     */
    #[Api]
    public string $listId;

    /**
     * The version of the list.
     */
    #[Api]
    public int $listVersion;

    /**
     * The name of the list.
     */
    #[Api]
    public string $name;

    /**
     * The object type of the list.
     */
    #[Api]
    public string $objectTypeId;

    /**
     * The processing status of the list.
     */
    #[Api]
    public string $processingStatus;

    /**
     * The processing type of the list.
     */
    #[Api]
    public string $processingType;

    /**
     * The time when the list was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * The ID of the user that created the list.
     */
    #[Api(optional: true)]
    public ?string $createdById;

    /**
     * The time when the list was deleted.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $deletedAt;

    /**
     * The time when the filters for this list were last updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $filtersUpdatedAt;

    /**
     * The time the list was last updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The ID of the user that last updated the list.
     */
    #[Api(optional: true)]
    public ?string $updatedById;

    /**
     * `new PublicObjectListSearchResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicObjectListSearchResult::with(
     *   additionalProperties: ...,
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
     * (new PublicObjectListSearchResult)
     *   ->withAdditionalProperties(...)
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
     *
     * @param array<string,string> $additionalProperties
     */
    public static function with(
        array $additionalProperties,
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
        ?\DateTimeInterface $updatedAt = null,
        ?string $updatedById = null,
    ): self {
        $obj = new self;

        $obj->additionalProperties = $additionalProperties;
        $obj->listId = $listId;
        $obj->listVersion = $listVersion;
        $obj->name = $name;
        $obj->objectTypeId = $objectTypeId;
        $obj->processingStatus = $processingStatus;
        $obj->processingType = $processingType;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdById && $obj->createdById = $createdById;
        null !== $deletedAt && $obj->deletedAt = $deletedAt;
        null !== $filtersUpdatedAt && $obj->filtersUpdatedAt = $filtersUpdatedAt;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedById && $obj->updatedById = $updatedById;

        return $obj;
    }

    /**
     * The name and value of any additional properties that exist for this list and that were included in the search request.
     *
     * @param array<string,string> $additionalProperties
     */
    public function withAdditionalProperties(array $additionalProperties): self
    {
        $obj = clone $this;
        $obj->additionalProperties = $additionalProperties;

        return $obj;
    }

    /**
     * The **ILS ID** of the list.
     */
    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj->listId = $listID;

        return $obj;
    }

    /**
     * The version of the list.
     */
    public function withListVersion(int $listVersion): self
    {
        $obj = clone $this;
        $obj->listVersion = $listVersion;

        return $obj;
    }

    /**
     * The name of the list.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The object type of the list.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeId = $objectTypeID;

        return $obj;
    }

    /**
     * The processing status of the list.
     */
    public function withProcessingStatus(string $processingStatus): self
    {
        $obj = clone $this;
        $obj->processingStatus = $processingStatus;

        return $obj;
    }

    /**
     * The processing type of the list.
     */
    public function withProcessingType(string $processingType): self
    {
        $obj = clone $this;
        $obj->processingType = $processingType;

        return $obj;
    }

    /**
     * The time when the list was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The ID of the user that created the list.
     */
    public function withCreatedByID(string $createdByID): self
    {
        $obj = clone $this;
        $obj->createdById = $createdByID;

        return $obj;
    }

    /**
     * The time when the list was deleted.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj->deletedAt = $deletedAt;

        return $obj;
    }

    /**
     * The time when the filters for this list were last updated.
     */
    public function withFiltersUpdatedAt(
        \DateTimeInterface $filtersUpdatedAt
    ): self {
        $obj = clone $this;
        $obj->filtersUpdatedAt = $filtersUpdatedAt;

        return $obj;
    }

    /**
     * The time the list was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The ID of the user that last updated the list.
     */
    public function withUpdatedByID(string $updatedByID): self
    {
        $obj = clone $this;
        $obj->updatedById = $updatedByID;

        return $obj;
    }
}
