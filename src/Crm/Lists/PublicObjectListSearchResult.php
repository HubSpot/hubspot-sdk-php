<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicObjectListSearchResultShape = array{
 *   listID: string,
 *   listVersion: int,
 *   name: string,
 *   objectTypeID: string,
 *   processingStatus: string,
 *   processingType: string,
 *   additionalFilterProperties?: array<string,string>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdByID?: string|null,
 *   deletedAt?: \DateTimeInterface|null,
 *   filtersUpdatedAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedByID?: string|null,
 * }
 */
final class PublicObjectListSearchResult implements BaseModel
{
    /** @use SdkModel<PublicObjectListSearchResultShape> */
    use SdkModel;

    /**
     * The **ILS ID** of the list.
     */
    #[Required('listId')]
    public string $listID;

    /**
     * The version of the list.
     */
    #[Required]
    public int $listVersion;

    /**
     * The name of the list.
     */
    #[Required]
    public string $name;

    /**
     * The object type of the list.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * The processing status of the list.
     */
    #[Required]
    public string $processingStatus;

    /**
     * The processing type of the list.
     */
    #[Required]
    public string $processingType;

    /**
     * The name and value of any additional properties that exist for this list and that were included in the search request.
     *
     * @var array<string,string>|null $additionalFilterProperties
     */
    #[Optional('additional_filter_properties', map: 'string')]
    public ?array $additionalFilterProperties;

    /**
     * The time when the list was created.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * The ID of the user that created the list.
     */
    #[Optional('createdById')]
    public ?string $createdByID;

    /**
     * The time when the list was deleted.
     */
    #[Optional]
    public ?\DateTimeInterface $deletedAt;

    /**
     * The time when the filters for this list were last updated.
     */
    #[Optional]
    public ?\DateTimeInterface $filtersUpdatedAt;

    /**
     * The time the list was last updated.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The ID of the user that last updated the list.
     */
    #[Optional('updatedById')]
    public ?string $updatedByID;

    /**
     * `new PublicObjectListSearchResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicObjectListSearchResult::with(
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
     * (new PublicObjectListSearchResult)
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
     * @param array<string,string>|null $additionalFilterProperties
     */
    public static function with(
        string $listID,
        int $listVersion,
        string $name,
        string $objectTypeID,
        string $processingStatus,
        string $processingType,
        ?array $additionalFilterProperties = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $createdByID = null,
        ?\DateTimeInterface $deletedAt = null,
        ?\DateTimeInterface $filtersUpdatedAt = null,
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

        null !== $additionalFilterProperties && $self['additionalFilterProperties'] = $additionalFilterProperties;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $createdByID && $self['createdByID'] = $createdByID;
        null !== $deletedAt && $self['deletedAt'] = $deletedAt;
        null !== $filtersUpdatedAt && $self['filtersUpdatedAt'] = $filtersUpdatedAt;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedByID && $self['updatedByID'] = $updatedByID;

        return $self;
    }

    /**
     * The **ILS ID** of the list.
     */
    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    /**
     * The version of the list.
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
     * The object type of the list.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The processing status of the list.
     */
    public function withProcessingStatus(string $processingStatus): self
    {
        $self = clone $this;
        $self['processingStatus'] = $processingStatus;

        return $self;
    }

    /**
     * The processing type of the list.
     */
    public function withProcessingType(string $processingType): self
    {
        $self = clone $this;
        $self['processingType'] = $processingType;

        return $self;
    }

    /**
     * The name and value of any additional properties that exist for this list and that were included in the search request.
     *
     * @param array<string,string> $additionalFilterProperties
     */
    public function withAdditionalFilterProperties(
        array $additionalFilterProperties
    ): self {
        $self = clone $this;
        $self['additionalFilterProperties'] = $additionalFilterProperties;

        return $self;
    }

    /**
     * The time when the list was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The ID of the user that created the list.
     */
    public function withCreatedByID(string $createdByID): self
    {
        $self = clone $this;
        $self['createdByID'] = $createdByID;

        return $self;
    }

    /**
     * The time when the list was deleted.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }

    /**
     * The time when the filters for this list were last updated.
     */
    public function withFiltersUpdatedAt(
        \DateTimeInterface $filtersUpdatedAt
    ): self {
        $self = clone $this;
        $self['filtersUpdatedAt'] = $filtersUpdatedAt;

        return $self;
    }

    /**
     * The time the list was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The ID of the user that last updated the list.
     */
    public function withUpdatedByID(string $updatedByID): self
    {
        $self = clone $this;
        $self['updatedByID'] = $updatedByID;

        return $self;
    }
}
