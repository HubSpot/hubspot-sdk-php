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
 * The request object used when creating a new object list.
 *
 * @phpstan-type ListCreateRequestShape = array{
 *   name: string,
 *   objectTypeID: string,
 *   processingType: string,
 *   customProperties?: array<string, string>,
 *   filterBranch?: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 *   listFolderID?: int,
 *   listPermissions?: PublicListPermissions,
 *   membershipSettings?: PublicMembershipSettings,
 * }
 */
final class ListCreateRequest implements BaseModel
{
    /** @use SdkModel<ListCreateRequestShape> */
    use SdkModel;

    /**
     * The name of the list, which must be globally unique across all public lists in the portal.
     */
    #[Api]
    public string $name;

    /**
     * The object type ID of the type of objects that the list will store.
     */
    #[Api('objectTypeId')]
    public string $objectTypeID;

    /**
     * The processing type of the list. One of: `SNAPSHOT`, `MANUAL`, or `DYNAMIC`.
     */
    #[Api]
    public string $processingType;

    /**
     * The list of custom properties to tie to the list. Custom property name is the key, the value is the value.
     *
     * @var array<string, string>|null $customProperties
     */
    #[Api(map: 'string', optional: true)]
    public ?array $customProperties;

    #[Api(optional: true)]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch;

    /**
     * The ID of the folder that the list should be created in. If left blank, then the list will be created in the root of the list folder structure.
     */
    #[Api('listFolderId', optional: true)]
    public ?int $listFolderID;

    #[Api(optional: true)]
    public ?PublicListPermissions $listPermissions;

    #[Api(optional: true)]
    public ?PublicMembershipSettings $membershipSettings;

    /**
     * `new ListCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListCreateRequest::with(name: ..., objectTypeID: ..., processingType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListCreateRequest)
     *   ->withName(...)
     *   ->withObjectTypeID(...)
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
     * @param array<string, string> $customProperties
     */
    public static function with(
        string $name,
        string $objectTypeID,
        string $processingType,
        ?array $customProperties = null,
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch = null,
        ?int $listFolderID = null,
        ?PublicListPermissions $listPermissions = null,
        ?PublicMembershipSettings $membershipSettings = null,
    ): self {
        $obj = new self;

        $obj->name = $name;
        $obj->objectTypeID = $objectTypeID;
        $obj->processingType = $processingType;

        null !== $customProperties && $obj->customProperties = $customProperties;
        null !== $filterBranch && $obj->filterBranch = $filterBranch;
        null !== $listFolderID && $obj->listFolderID = $listFolderID;
        null !== $listPermissions && $obj->listPermissions = $listPermissions;
        null !== $membershipSettings && $obj->membershipSettings = $membershipSettings;

        return $obj;
    }

    /**
     * The name of the list, which must be globally unique across all public lists in the portal.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The object type ID of the type of objects that the list will store.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    /**
     * The processing type of the list. One of: `SNAPSHOT`, `MANUAL`, or `DYNAMIC`.
     */
    public function withProcessingType(string $processingType): self
    {
        $obj = clone $this;
        $obj->processingType = $processingType;

        return $obj;
    }

    /**
     * The list of custom properties to tie to the list. Custom property name is the key, the value is the value.
     *
     * @param array<string, string> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $obj = clone $this;
        $obj->customProperties = $customProperties;

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
     * The ID of the folder that the list should be created in. If left blank, then the list will be created in the root of the list folder structure.
     */
    public function withListFolderID(int $listFolderID): self
    {
        $obj = clone $this;
        $obj->listFolderID = $listFolderID;

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
}
