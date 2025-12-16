<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
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
 * Create a new list with the provided object list definition.
 *
 * @see HubspotSDK\Services\Crm\ListsService::create()
 *
 * @phpstan-import-type FilterBranchShape from \HubspotSDK\Crm\Lists\ListCreateParams\FilterBranch
 * @phpstan-import-type PublicListPermissionsShape from \HubspotSDK\Crm\Lists\PublicListPermissions
 * @phpstan-import-type PublicMembershipSettingsShape from \HubspotSDK\Crm\Lists\PublicMembershipSettings
 *
 * @phpstan-type ListCreateParamsShape = array{
 *   name: string,
 *   objectTypeID: string,
 *   processingType: string,
 *   customProperties?: array<string,string>|null,
 *   filterBranch?: FilterBranchShape|null,
 *   listFolderID?: int|null,
 *   listPermissions?: PublicListPermissionsShape|null,
 *   membershipSettings?: PublicMembershipSettingsShape|null,
 * }
 */
final class ListCreateParams implements BaseModel
{
    /** @use SdkModel<ListCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the list, which must be globally unique across all public lists in the portal.
     */
    #[Required]
    public string $name;

    /**
     * The object type ID of the type of objects that the list will store.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * The processing type of the list. One of: `SNAPSHOT`, `MANUAL`, or `DYNAMIC`.
     */
    #[Required]
    public string $processingType;

    /**
     * The list of custom properties to tie to the list. Custom property name is the key, the value is the value.
     *
     * @var array<string,string>|null $customProperties
     */
    #[Optional(map: 'string')]
    public ?array $customProperties;

    #[Optional]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch;

    /**
     * The ID of the folder that the list should be created in. If left blank, then the list will be created in the root of the list folder structure.
     */
    #[Optional('listFolderId')]
    public ?int $listFolderID;

    #[Optional]
    public ?PublicListPermissions $listPermissions;

    #[Optional]
    public ?PublicMembershipSettings $membershipSettings;

    /**
     * `new ListCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListCreateParams::with(name: ..., objectTypeID: ..., processingType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListCreateParams)
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
     * @param array<string,string> $customProperties
     * @param FilterBranchShape $filterBranch
     * @param PublicListPermissionsShape $listPermissions
     * @param PublicMembershipSettingsShape $membershipSettings
     */
    public static function with(
        string $name,
        string $objectTypeID,
        string $processingType,
        ?array $customProperties = null,
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch = null,
        ?int $listFolderID = null,
        PublicListPermissions|array|null $listPermissions = null,
        PublicMembershipSettings|array|null $membershipSettings = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['objectTypeID'] = $objectTypeID;
        $self['processingType'] = $processingType;

        null !== $customProperties && $self['customProperties'] = $customProperties;
        null !== $filterBranch && $self['filterBranch'] = $filterBranch;
        null !== $listFolderID && $self['listFolderID'] = $listFolderID;
        null !== $listPermissions && $self['listPermissions'] = $listPermissions;
        null !== $membershipSettings && $self['membershipSettings'] = $membershipSettings;

        return $self;
    }

    /**
     * The name of the list, which must be globally unique across all public lists in the portal.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The object type ID of the type of objects that the list will store.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The processing type of the list. One of: `SNAPSHOT`, `MANUAL`, or `DYNAMIC`.
     */
    public function withProcessingType(string $processingType): self
    {
        $self = clone $this;
        $self['processingType'] = $processingType;

        return $self;
    }

    /**
     * The list of custom properties to tie to the list. Custom property name is the key, the value is the value.
     *
     * @param array<string,string> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $self = clone $this;
        $self['customProperties'] = $customProperties;

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
     * The ID of the folder that the list should be created in. If left blank, then the list will be created in the root of the list folder structure.
     */
    public function withListFolderID(int $listFolderID): self
    {
        $self = clone $this;
        $self['listFolderID'] = $listFolderID;

        return $self;
    }

    /**
     * @param PublicListPermissionsShape $listPermissions
     */
    public function withListPermissions(
        PublicListPermissions|array $listPermissions
    ): self {
        $self = clone $this;
        $self['listPermissions'] = $listPermissions;

        return $self;
    }

    /**
     * @param PublicMembershipSettingsShape $membershipSettings
     */
    public function withMembershipSettings(
        PublicMembershipSettings|array $membershipSettings
    ): self {
        $self = clone $this;
        $self['membershipSettings'] = $membershipSettings;

        return $self;
    }
}
