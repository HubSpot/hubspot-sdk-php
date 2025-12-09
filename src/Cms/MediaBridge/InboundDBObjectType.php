<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\InboundDBObjectType\MetaType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type InboundDBObjectTypeShape = array{
 *   id: int,
 *   allowsSensitiveProperties: bool,
 *   createDatePropertyName: string,
 *   defaultSearchPropertyNames: list<string>,
 *   deleted: bool,
 *   fullyQualifiedName: string,
 *   hasCustomProperties: bool,
 *   hasDefaultProperties: bool,
 *   hasExternalObjectIDs: bool,
 *   hasOwners: bool,
 *   hasPipelines: bool,
 *   indexedForFiltersAndReports: bool,
 *   lastModifiedPropertyName: string,
 *   metaType: value-of<MetaType>,
 *   metaTypeID: int,
 *   name: string,
 *   objectTypeID: string,
 *   permissioningType: string,
 *   pipelinePropertyName: string,
 *   pipelineStagePropertyName: string,
 *   requiredProperties: list<string>,
 *   restorable: bool,
 *   scopeMappings: list<ScopeMapping>,
 *   secondaryDisplayLabelPropertyNames: list<string>,
 *   accessScopeName?: string|null,
 *   createdAt?: int|null,
 *   description?: string|null,
 *   integrationAppID?: int|null,
 *   janusGroup?: string|null,
 *   ownerPortalID?: int|null,
 *   pipelineCloseDatePropertyName?: string|null,
 *   pipelineTimeToClosePropertyName?: string|null,
 *   pluralForm?: string|null,
 *   primaryDisplayLabelPropertyName?: string|null,
 *   readScopeName?: string|null,
 *   singularForm?: string|null,
 *   status?: string|null,
 *   visibility?: string|null,
 *   writeScopeName?: string|null,
 * }
 */
final class InboundDBObjectType implements BaseModel
{
    /** @use SdkModel<InboundDBObjectTypeShape> */
    use SdkModel;

    #[Required]
    public int $id;

    #[Required]
    public bool $allowsSensitiveProperties;

    #[Required]
    public string $createDatePropertyName;

    /** @var list<string> $defaultSearchPropertyNames */
    #[Required(list: 'string')]
    public array $defaultSearchPropertyNames;

    #[Required]
    public bool $deleted;

    #[Required]
    public string $fullyQualifiedName;

    #[Required]
    public bool $hasCustomProperties;

    #[Required]
    public bool $hasDefaultProperties;

    #[Required('hasExternalObjectIds')]
    public bool $hasExternalObjectIDs;

    #[Required]
    public bool $hasOwners;

    #[Required]
    public bool $hasPipelines;

    #[Required]
    public bool $indexedForFiltersAndReports;

    #[Required]
    public string $lastModifiedPropertyName;

    /** @var value-of<MetaType> $metaType */
    #[Required(enum: MetaType::class)]
    public string $metaType;

    #[Required('metaTypeId')]
    public int $metaTypeID;

    #[Required]
    public string $name;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required]
    public string $permissioningType;

    #[Required]
    public string $pipelinePropertyName;

    #[Required]
    public string $pipelineStagePropertyName;

    /** @var list<string> $requiredProperties */
    #[Required(list: 'string')]
    public array $requiredProperties;

    #[Required]
    public bool $restorable;

    /** @var list<ScopeMapping> $scopeMappings */
    #[Required(list: ScopeMapping::class)]
    public array $scopeMappings;

    /** @var list<string> $secondaryDisplayLabelPropertyNames */
    #[Required(list: 'string')]
    public array $secondaryDisplayLabelPropertyNames;

    #[Optional]
    public ?string $accessScopeName;

    #[Optional]
    public ?int $createdAt;

    #[Optional]
    public ?string $description;

    #[Optional('integrationAppId')]
    public ?int $integrationAppID;

    #[Optional]
    public ?string $janusGroup;

    #[Optional('ownerPortalId')]
    public ?int $ownerPortalID;

    #[Optional]
    public ?string $pipelineCloseDatePropertyName;

    #[Optional]
    public ?string $pipelineTimeToClosePropertyName;

    #[Optional]
    public ?string $pluralForm;

    #[Optional]
    public ?string $primaryDisplayLabelPropertyName;

    #[Optional]
    public ?string $readScopeName;

    #[Optional]
    public ?string $singularForm;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?string $visibility;

    #[Optional]
    public ?string $writeScopeName;

    /**
     * `new InboundDBObjectType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InboundDBObjectType::with(
     *   id: ...,
     *   allowsSensitiveProperties: ...,
     *   createDatePropertyName: ...,
     *   defaultSearchPropertyNames: ...,
     *   deleted: ...,
     *   fullyQualifiedName: ...,
     *   hasCustomProperties: ...,
     *   hasDefaultProperties: ...,
     *   hasExternalObjectIDs: ...,
     *   hasOwners: ...,
     *   hasPipelines: ...,
     *   indexedForFiltersAndReports: ...,
     *   lastModifiedPropertyName: ...,
     *   metaType: ...,
     *   metaTypeID: ...,
     *   name: ...,
     *   objectTypeID: ...,
     *   permissioningType: ...,
     *   pipelinePropertyName: ...,
     *   pipelineStagePropertyName: ...,
     *   requiredProperties: ...,
     *   restorable: ...,
     *   scopeMappings: ...,
     *   secondaryDisplayLabelPropertyNames: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InboundDBObjectType)
     *   ->withID(...)
     *   ->withAllowsSensitiveProperties(...)
     *   ->withCreateDatePropertyName(...)
     *   ->withDefaultSearchPropertyNames(...)
     *   ->withDeleted(...)
     *   ->withFullyQualifiedName(...)
     *   ->withHasCustomProperties(...)
     *   ->withHasDefaultProperties(...)
     *   ->withHasExternalObjectIDs(...)
     *   ->withHasOwners(...)
     *   ->withHasPipelines(...)
     *   ->withIndexedForFiltersAndReports(...)
     *   ->withLastModifiedPropertyName(...)
     *   ->withMetaType(...)
     *   ->withMetaTypeID(...)
     *   ->withName(...)
     *   ->withObjectTypeID(...)
     *   ->withPermissioningType(...)
     *   ->withPipelinePropertyName(...)
     *   ->withPipelineStagePropertyName(...)
     *   ->withRequiredProperties(...)
     *   ->withRestorable(...)
     *   ->withScopeMappings(...)
     *   ->withSecondaryDisplayLabelPropertyNames(...)
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
     * @param list<string> $defaultSearchPropertyNames
     * @param MetaType|value-of<MetaType> $metaType
     * @param list<string> $requiredProperties
     * @param list<ScopeMapping|array{
     *   accessLevel: string, requestAction: string, scopeName: string
     * }> $scopeMappings
     * @param list<string> $secondaryDisplayLabelPropertyNames
     */
    public static function with(
        int $id,
        bool $allowsSensitiveProperties,
        string $createDatePropertyName,
        array $defaultSearchPropertyNames,
        bool $deleted,
        string $fullyQualifiedName,
        bool $hasCustomProperties,
        bool $hasDefaultProperties,
        bool $hasExternalObjectIDs,
        bool $hasOwners,
        bool $hasPipelines,
        bool $indexedForFiltersAndReports,
        string $lastModifiedPropertyName,
        MetaType|string $metaType,
        int $metaTypeID,
        string $name,
        string $objectTypeID,
        string $permissioningType,
        string $pipelinePropertyName,
        string $pipelineStagePropertyName,
        array $requiredProperties,
        bool $restorable,
        array $scopeMappings,
        array $secondaryDisplayLabelPropertyNames,
        ?string $accessScopeName = null,
        ?int $createdAt = null,
        ?string $description = null,
        ?int $integrationAppID = null,
        ?string $janusGroup = null,
        ?int $ownerPortalID = null,
        ?string $pipelineCloseDatePropertyName = null,
        ?string $pipelineTimeToClosePropertyName = null,
        ?string $pluralForm = null,
        ?string $primaryDisplayLabelPropertyName = null,
        ?string $readScopeName = null,
        ?string $singularForm = null,
        ?string $status = null,
        ?string $visibility = null,
        ?string $writeScopeName = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['allowsSensitiveProperties'] = $allowsSensitiveProperties;
        $self['createDatePropertyName'] = $createDatePropertyName;
        $self['defaultSearchPropertyNames'] = $defaultSearchPropertyNames;
        $self['deleted'] = $deleted;
        $self['fullyQualifiedName'] = $fullyQualifiedName;
        $self['hasCustomProperties'] = $hasCustomProperties;
        $self['hasDefaultProperties'] = $hasDefaultProperties;
        $self['hasExternalObjectIDs'] = $hasExternalObjectIDs;
        $self['hasOwners'] = $hasOwners;
        $self['hasPipelines'] = $hasPipelines;
        $self['indexedForFiltersAndReports'] = $indexedForFiltersAndReports;
        $self['lastModifiedPropertyName'] = $lastModifiedPropertyName;
        $self['metaType'] = $metaType;
        $self['metaTypeID'] = $metaTypeID;
        $self['name'] = $name;
        $self['objectTypeID'] = $objectTypeID;
        $self['permissioningType'] = $permissioningType;
        $self['pipelinePropertyName'] = $pipelinePropertyName;
        $self['pipelineStagePropertyName'] = $pipelineStagePropertyName;
        $self['requiredProperties'] = $requiredProperties;
        $self['restorable'] = $restorable;
        $self['scopeMappings'] = $scopeMappings;
        $self['secondaryDisplayLabelPropertyNames'] = $secondaryDisplayLabelPropertyNames;

        null !== $accessScopeName && $self['accessScopeName'] = $accessScopeName;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $description && $self['description'] = $description;
        null !== $integrationAppID && $self['integrationAppID'] = $integrationAppID;
        null !== $janusGroup && $self['janusGroup'] = $janusGroup;
        null !== $ownerPortalID && $self['ownerPortalID'] = $ownerPortalID;
        null !== $pipelineCloseDatePropertyName && $self['pipelineCloseDatePropertyName'] = $pipelineCloseDatePropertyName;
        null !== $pipelineTimeToClosePropertyName && $self['pipelineTimeToClosePropertyName'] = $pipelineTimeToClosePropertyName;
        null !== $pluralForm && $self['pluralForm'] = $pluralForm;
        null !== $primaryDisplayLabelPropertyName && $self['primaryDisplayLabelPropertyName'] = $primaryDisplayLabelPropertyName;
        null !== $readScopeName && $self['readScopeName'] = $readScopeName;
        null !== $singularForm && $self['singularForm'] = $singularForm;
        null !== $status && $self['status'] = $status;
        null !== $visibility && $self['visibility'] = $visibility;
        null !== $writeScopeName && $self['writeScopeName'] = $writeScopeName;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAllowsSensitiveProperties(
        bool $allowsSensitiveProperties
    ): self {
        $self = clone $this;
        $self['allowsSensitiveProperties'] = $allowsSensitiveProperties;

        return $self;
    }

    public function withCreateDatePropertyName(
        string $createDatePropertyName
    ): self {
        $self = clone $this;
        $self['createDatePropertyName'] = $createDatePropertyName;

        return $self;
    }

    /**
     * @param list<string> $defaultSearchPropertyNames
     */
    public function withDefaultSearchPropertyNames(
        array $defaultSearchPropertyNames
    ): self {
        $self = clone $this;
        $self['defaultSearchPropertyNames'] = $defaultSearchPropertyNames;

        return $self;
    }

    public function withDeleted(bool $deleted): self
    {
        $self = clone $this;
        $self['deleted'] = $deleted;

        return $self;
    }

    public function withFullyQualifiedName(string $fullyQualifiedName): self
    {
        $self = clone $this;
        $self['fullyQualifiedName'] = $fullyQualifiedName;

        return $self;
    }

    public function withHasCustomProperties(bool $hasCustomProperties): self
    {
        $self = clone $this;
        $self['hasCustomProperties'] = $hasCustomProperties;

        return $self;
    }

    public function withHasDefaultProperties(bool $hasDefaultProperties): self
    {
        $self = clone $this;
        $self['hasDefaultProperties'] = $hasDefaultProperties;

        return $self;
    }

    public function withHasExternalObjectIDs(bool $hasExternalObjectIDs): self
    {
        $self = clone $this;
        $self['hasExternalObjectIDs'] = $hasExternalObjectIDs;

        return $self;
    }

    public function withHasOwners(bool $hasOwners): self
    {
        $self = clone $this;
        $self['hasOwners'] = $hasOwners;

        return $self;
    }

    public function withHasPipelines(bool $hasPipelines): self
    {
        $self = clone $this;
        $self['hasPipelines'] = $hasPipelines;

        return $self;
    }

    public function withIndexedForFiltersAndReports(
        bool $indexedForFiltersAndReports
    ): self {
        $self = clone $this;
        $self['indexedForFiltersAndReports'] = $indexedForFiltersAndReports;

        return $self;
    }

    public function withLastModifiedPropertyName(
        string $lastModifiedPropertyName
    ): self {
        $self = clone $this;
        $self['lastModifiedPropertyName'] = $lastModifiedPropertyName;

        return $self;
    }

    /**
     * @param MetaType|value-of<MetaType> $metaType
     */
    public function withMetaType(MetaType|string $metaType): self
    {
        $self = clone $this;
        $self['metaType'] = $metaType;

        return $self;
    }

    public function withMetaTypeID(int $metaTypeID): self
    {
        $self = clone $this;
        $self['metaTypeID'] = $metaTypeID;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withPermissioningType(string $permissioningType): self
    {
        $self = clone $this;
        $self['permissioningType'] = $permissioningType;

        return $self;
    }

    public function withPipelinePropertyName(string $pipelinePropertyName): self
    {
        $self = clone $this;
        $self['pipelinePropertyName'] = $pipelinePropertyName;

        return $self;
    }

    public function withPipelineStagePropertyName(
        string $pipelineStagePropertyName
    ): self {
        $self = clone $this;
        $self['pipelineStagePropertyName'] = $pipelineStagePropertyName;

        return $self;
    }

    /**
     * @param list<string> $requiredProperties
     */
    public function withRequiredProperties(array $requiredProperties): self
    {
        $self = clone $this;
        $self['requiredProperties'] = $requiredProperties;

        return $self;
    }

    public function withRestorable(bool $restorable): self
    {
        $self = clone $this;
        $self['restorable'] = $restorable;

        return $self;
    }

    /**
     * @param list<ScopeMapping|array{
     *   accessLevel: string, requestAction: string, scopeName: string
     * }> $scopeMappings
     */
    public function withScopeMappings(array $scopeMappings): self
    {
        $self = clone $this;
        $self['scopeMappings'] = $scopeMappings;

        return $self;
    }

    /**
     * @param list<string> $secondaryDisplayLabelPropertyNames
     */
    public function withSecondaryDisplayLabelPropertyNames(
        array $secondaryDisplayLabelPropertyNames
    ): self {
        $self = clone $this;
        $self['secondaryDisplayLabelPropertyNames'] = $secondaryDisplayLabelPropertyNames;

        return $self;
    }

    public function withAccessScopeName(string $accessScopeName): self
    {
        $self = clone $this;
        $self['accessScopeName'] = $accessScopeName;

        return $self;
    }

    public function withCreatedAt(int $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withIntegrationAppID(int $integrationAppID): self
    {
        $self = clone $this;
        $self['integrationAppID'] = $integrationAppID;

        return $self;
    }

    public function withJanusGroup(string $janusGroup): self
    {
        $self = clone $this;
        $self['janusGroup'] = $janusGroup;

        return $self;
    }

    public function withOwnerPortalID(int $ownerPortalID): self
    {
        $self = clone $this;
        $self['ownerPortalID'] = $ownerPortalID;

        return $self;
    }

    public function withPipelineCloseDatePropertyName(
        string $pipelineCloseDatePropertyName
    ): self {
        $self = clone $this;
        $self['pipelineCloseDatePropertyName'] = $pipelineCloseDatePropertyName;

        return $self;
    }

    public function withPipelineTimeToClosePropertyName(
        string $pipelineTimeToClosePropertyName
    ): self {
        $self = clone $this;
        $self['pipelineTimeToClosePropertyName'] = $pipelineTimeToClosePropertyName;

        return $self;
    }

    public function withPluralForm(string $pluralForm): self
    {
        $self = clone $this;
        $self['pluralForm'] = $pluralForm;

        return $self;
    }

    public function withPrimaryDisplayLabelPropertyName(
        string $primaryDisplayLabelPropertyName
    ): self {
        $self = clone $this;
        $self['primaryDisplayLabelPropertyName'] = $primaryDisplayLabelPropertyName;

        return $self;
    }

    public function withReadScopeName(string $readScopeName): self
    {
        $self = clone $this;
        $self['readScopeName'] = $readScopeName;

        return $self;
    }

    public function withSingularForm(string $singularForm): self
    {
        $self = clone $this;
        $self['singularForm'] = $singularForm;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withVisibility(string $visibility): self
    {
        $self = clone $this;
        $self['visibility'] = $visibility;

        return $self;
    }

    public function withWriteScopeName(string $writeScopeName): self
    {
        $self = clone $this;
        $self['writeScopeName'] = $writeScopeName;

        return $self;
    }
}
