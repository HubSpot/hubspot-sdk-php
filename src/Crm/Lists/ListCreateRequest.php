<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\ListCreateRequest\FilterBranch;

/**
 * @phpstan-import-type FilterBranchVariants from \HubSpotSDK\Crm\Lists\ListCreateRequest\FilterBranch
 * @phpstan-import-type FilterBranchShape from \HubSpotSDK\Crm\Lists\ListCreateRequest\FilterBranch
 * @phpstan-import-type PublicListPermissionsShape from \HubSpotSDK\Crm\Lists\PublicListPermissions
 * @phpstan-import-type PublicMembershipSettingsShape from \HubSpotSDK\Crm\Lists\PublicMembershipSettings
 *
 * @phpstan-type ListCreateRequestShape = array{
 *   name: string,
 *   objectTypeID: string,
 *   processingType: string,
 *   customProperties?: array<string,string>|null,
 *   filterBranch?: FilterBranchShape|null,
 *   listFolderID?: int|null,
 *   listPermissions?: null|PublicListPermissions|PublicListPermissionsShape,
 *   membershipSettings?: null|PublicMembershipSettings|PublicMembershipSettingsShape,
 * }
 */
final class ListCreateRequest implements BaseModel
{
    /** @use SdkModel<ListCreateRequestShape> */
    use SdkModel;

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

    /**
     * Filter branch object containing filtering criteria for the list.
     *
     * @var FilterBranchVariants|null $filterBranch
     */
    #[Optional(union: FilterBranch::class)]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicAssociationFilterBranch|null $filterBranch;

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
     * @param array<string,string>|null $customProperties
     * @param FilterBranchShape|null $filterBranch
     * @param PublicListPermissions|PublicListPermissionsShape|null $listPermissions
     * @param PublicMembershipSettings|PublicMembershipSettingsShape|null $membershipSettings
     */
    public static function with(
        string $name,
        string $objectTypeID,
        string $processingType,
        ?array $customProperties = null,
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicAssociationFilterBranch|null $filterBranch = null,
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
     * Filter branch object containing filtering criteria for the list.
     *
     * @param FilterBranchShape $filterBranch
     */
    public function withFilterBranch(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicAssociationFilterBranch $filterBranch,
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
}
