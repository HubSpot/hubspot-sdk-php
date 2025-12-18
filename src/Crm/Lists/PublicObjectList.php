<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAndFilterBranch;
use HubspotSDK\PublicAssociationFilterBranch;
use HubspotSDK\PublicNotAllFilterBranch;
use HubspotSDK\PublicNotAnyFilterBranch;
use HubspotSDK\PublicOrFilterBranch;
use HubspotSDK\PublicPropertyAssociationFilterBranch;
use HubspotSDK\PublicRestrictedFilterBranch;
use HubspotSDK\PublicUnifiedEventsFilterBranch;

/**
 * An object list definition.
 *
 * @phpstan-import-type FilterBranchShape from \HubspotSDK\Crm\Lists\PublicObjectList\FilterBranch
 * @phpstan-import-type PublicListPermissionsShape from \HubspotSDK\Crm\Lists\PublicListPermissions
 * @phpstan-import-type PublicMembershipSettingsShape from \HubspotSDK\Crm\Lists\PublicMembershipSettings
 *
 * @phpstan-type PublicObjectListShape = array{
 *   listID: string,
 *   listVersion: int,
 *   name: string,
 *   objectTypeID: string,
 *   processingStatus: string,
 *   processingType: string,
 *   createdAt?: \DateTimeInterface|null,
 *   createdByID?: string|null,
 *   deletedAt?: \DateTimeInterface|null,
 *   filterBranch?: FilterBranchShape|null,
 *   filtersUpdatedAt?: \DateTimeInterface|null,
 *   listPermissions?: null|PublicListPermissions|PublicListPermissionsShape,
 *   membershipSettings?: null|PublicMembershipSettings|PublicMembershipSettingsShape,
 *   size?: int|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedByID?: string|null,
 * }
 */
final class PublicObjectList implements BaseModel
{
    /** @use SdkModel<PublicObjectListShape> */
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

    #[Optional]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch;

    /**
     * The time when the filters for this list were last updated.
     */
    #[Optional]
    public ?\DateTimeInterface $filtersUpdatedAt;

    #[Optional]
    public ?PublicListPermissions $listPermissions;

    #[Optional]
    public ?PublicMembershipSettings $membershipSettings;

    /**
     * Size of the list.
     */
    #[Optional]
    public ?int $size;

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
     * `new PublicObjectList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicObjectList::with(
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
     * (new PublicObjectList)
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
     * @param FilterBranchShape|null $filterBranch
     * @param PublicListPermissions|PublicListPermissionsShape|null $listPermissions
     * @param PublicMembershipSettings|PublicMembershipSettingsShape|null $membershipSettings
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
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch = null,
        ?\DateTimeInterface $filtersUpdatedAt = null,
        PublicListPermissions|array|null $listPermissions = null,
        PublicMembershipSettings|array|null $membershipSettings = null,
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
        null !== $filterBranch && $self['filterBranch'] = $filterBranch;
        null !== $filtersUpdatedAt && $self['filtersUpdatedAt'] = $filtersUpdatedAt;
        null !== $listPermissions && $self['listPermissions'] = $listPermissions;
        null !== $membershipSettings && $self['membershipSettings'] = $membershipSettings;
        null !== $size && $self['size'] = $size;
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
     * @param FilterBranchShape $filterBranch
     */
    public function withFilterBranch(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $filterBranch,
    ): self {
        $self = clone $this;
        $self['filterBranch'] = $filterBranch;

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
     * @param PublicListPermissions|PublicListPermissionsShape $listPermissions
     */
    public function withListPermissions(
        PublicListPermissions|array $listPermissions
    ): self {
        $self = clone $this;
        $self['listPermissions'] = $listPermissions;

        return $self;
    }

    /**
     * @param PublicMembershipSettings|PublicMembershipSettingsShape $membershipSettings
     */
    public function withMembershipSettings(
        PublicMembershipSettings|array $membershipSettings
    ): self {
        $self = clone $this;
        $self['membershipSettings'] = $membershipSettings;

        return $self;
    }

    /**
     * Size of the list.
     */
    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

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
