<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
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
 * @phpstan-type public_object_list = array{
 *   listID: string,
 *   listVersion: int,
 *   name: string,
 *   objectTypeID: string,
 *   processingStatus: string,
 *   processingType: string,
 *   createdAt?: \DateTimeInterface,
 *   createdByID?: string,
 *   deletedAt?: \DateTimeInterface,
 *   filterBranch?: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 *   filtersUpdatedAt?: \DateTimeInterface,
 *   listPermissions?: PublicListPermissions,
 *   membershipSettings?: PublicMembershipSettings,
 *   size?: int,
 *   updatedAt?: \DateTimeInterface,
 *   updatedByID?: string,
 * }
 */
final class PublicObjectList implements BaseModel
{
    /** @use SdkModel<public_object_list> */
    use SdkModel;

    /**
     * The **ILS ID** of the list.
     */
    #[Api('listId')]
    public string $listID;

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
    #[Api('objectTypeId')]
    public string $objectTypeID;

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
    #[Api('createdById', optional: true)]
    public ?string $createdByID;

    /**
     * The time when the list was deleted.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $deletedAt;

    #[Api(optional: true)]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch;

    /**
     * The time when the filters for this list were last updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $filtersUpdatedAt;

    #[Api(optional: true)]
    public ?PublicListPermissions $listPermissions;

    #[Api(optional: true)]
    public ?PublicMembershipSettings $membershipSettings;

    /**
     * Size of the list.
     */
    #[Api(optional: true)]
    public ?int $size;

    /**
     * The time the list was last updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The ID of the user that last updated the list.
     */
    #[Api('updatedById', optional: true)]
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
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch = null,
        ?\DateTimeInterface $filtersUpdatedAt = null,
        ?PublicListPermissions $listPermissions = null,
        ?PublicMembershipSettings $membershipSettings = null,
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
        null !== $filterBranch && $obj->filterBranch = $filterBranch;
        null !== $filtersUpdatedAt && $obj->filtersUpdatedAt = $filtersUpdatedAt;
        null !== $listPermissions && $obj->listPermissions = $listPermissions;
        null !== $membershipSettings && $obj->membershipSettings = $membershipSettings;
        null !== $size && $obj->size = $size;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedByID && $obj->updatedByID = $updatedByID;

        return $obj;
    }

    /**
     * The **ILS ID** of the list.
     */
    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj->listID = $listID;

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
        $obj->objectTypeID = $objectTypeID;

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
        $obj->createdByID = $createdByID;

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

    public function withFilterBranch(
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $filterBranch,
    ): self {
        $obj = clone $this;
        $obj->filterBranch = $filterBranch;

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

    public function withListPermissions(
        PublicListPermissions $listPermissions
    ): self {
        $obj = clone $this;
        $obj->listPermissions = $listPermissions;

        return $obj;
    }

    public function withMembershipSettings(
        PublicMembershipSettings $membershipSettings
    ): self {
        $obj = clone $this;
        $obj->membershipSettings = $membershipSettings;

        return $obj;
    }

    /**
     * Size of the list.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

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
        $obj->updatedByID = $updatedByID;

        return $obj;
    }
}
