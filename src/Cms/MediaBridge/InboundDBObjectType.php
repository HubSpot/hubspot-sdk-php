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
 *   hasExternalObjectIds: bool,
 *   hasOwners: bool,
 *   hasPipelines: bool,
 *   indexedForFiltersAndReports: bool,
 *   lastModifiedPropertyName: string,
 *   metaType: value-of<MetaType>,
 *   metaTypeId: int,
 *   name: string,
 *   objectTypeId: string,
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
 *   integrationAppId?: int|null,
 *   janusGroup?: string|null,
 *   ownerPortalId?: int|null,
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

    #[Required]
    public bool $hasExternalObjectIds;

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

    #[Required]
    public int $metaTypeId;

    #[Required]
    public string $name;

    #[Required]
    public string $objectTypeId;

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

    #[Optional]
    public ?int $integrationAppId;

    #[Optional]
    public ?string $janusGroup;

    #[Optional]
    public ?int $ownerPortalId;

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
     *   hasExternalObjectIds: ...,
     *   hasOwners: ...,
     *   hasPipelines: ...,
     *   indexedForFiltersAndReports: ...,
     *   lastModifiedPropertyName: ...,
     *   metaType: ...,
     *   metaTypeId: ...,
     *   name: ...,
     *   objectTypeId: ...,
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
        bool $hasExternalObjectIds,
        bool $hasOwners,
        bool $hasPipelines,
        bool $indexedForFiltersAndReports,
        string $lastModifiedPropertyName,
        MetaType|string $metaType,
        int $metaTypeId,
        string $name,
        string $objectTypeId,
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
        ?int $integrationAppId = null,
        ?string $janusGroup = null,
        ?int $ownerPortalId = null,
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
        $obj = new self;

        $obj['id'] = $id;
        $obj['allowsSensitiveProperties'] = $allowsSensitiveProperties;
        $obj['createDatePropertyName'] = $createDatePropertyName;
        $obj['defaultSearchPropertyNames'] = $defaultSearchPropertyNames;
        $obj['deleted'] = $deleted;
        $obj['fullyQualifiedName'] = $fullyQualifiedName;
        $obj['hasCustomProperties'] = $hasCustomProperties;
        $obj['hasDefaultProperties'] = $hasDefaultProperties;
        $obj['hasExternalObjectIds'] = $hasExternalObjectIds;
        $obj['hasOwners'] = $hasOwners;
        $obj['hasPipelines'] = $hasPipelines;
        $obj['indexedForFiltersAndReports'] = $indexedForFiltersAndReports;
        $obj['lastModifiedPropertyName'] = $lastModifiedPropertyName;
        $obj['metaType'] = $metaType;
        $obj['metaTypeId'] = $metaTypeId;
        $obj['name'] = $name;
        $obj['objectTypeId'] = $objectTypeId;
        $obj['permissioningType'] = $permissioningType;
        $obj['pipelinePropertyName'] = $pipelinePropertyName;
        $obj['pipelineStagePropertyName'] = $pipelineStagePropertyName;
        $obj['requiredProperties'] = $requiredProperties;
        $obj['restorable'] = $restorable;
        $obj['scopeMappings'] = $scopeMappings;
        $obj['secondaryDisplayLabelPropertyNames'] = $secondaryDisplayLabelPropertyNames;

        null !== $accessScopeName && $obj['accessScopeName'] = $accessScopeName;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $description && $obj['description'] = $description;
        null !== $integrationAppId && $obj['integrationAppId'] = $integrationAppId;
        null !== $janusGroup && $obj['janusGroup'] = $janusGroup;
        null !== $ownerPortalId && $obj['ownerPortalId'] = $ownerPortalId;
        null !== $pipelineCloseDatePropertyName && $obj['pipelineCloseDatePropertyName'] = $pipelineCloseDatePropertyName;
        null !== $pipelineTimeToClosePropertyName && $obj['pipelineTimeToClosePropertyName'] = $pipelineTimeToClosePropertyName;
        null !== $pluralForm && $obj['pluralForm'] = $pluralForm;
        null !== $primaryDisplayLabelPropertyName && $obj['primaryDisplayLabelPropertyName'] = $primaryDisplayLabelPropertyName;
        null !== $readScopeName && $obj['readScopeName'] = $readScopeName;
        null !== $singularForm && $obj['singularForm'] = $singularForm;
        null !== $status && $obj['status'] = $status;
        null !== $visibility && $obj['visibility'] = $visibility;
        null !== $writeScopeName && $obj['writeScopeName'] = $writeScopeName;

        return $obj;
    }

    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withAllowsSensitiveProperties(
        bool $allowsSensitiveProperties
    ): self {
        $obj = clone $this;
        $obj['allowsSensitiveProperties'] = $allowsSensitiveProperties;

        return $obj;
    }

    public function withCreateDatePropertyName(
        string $createDatePropertyName
    ): self {
        $obj = clone $this;
        $obj['createDatePropertyName'] = $createDatePropertyName;

        return $obj;
    }

    /**
     * @param list<string> $defaultSearchPropertyNames
     */
    public function withDefaultSearchPropertyNames(
        array $defaultSearchPropertyNames
    ): self {
        $obj = clone $this;
        $obj['defaultSearchPropertyNames'] = $defaultSearchPropertyNames;

        return $obj;
    }

    public function withDeleted(bool $deleted): self
    {
        $obj = clone $this;
        $obj['deleted'] = $deleted;

        return $obj;
    }

    public function withFullyQualifiedName(string $fullyQualifiedName): self
    {
        $obj = clone $this;
        $obj['fullyQualifiedName'] = $fullyQualifiedName;

        return $obj;
    }

    public function withHasCustomProperties(bool $hasCustomProperties): self
    {
        $obj = clone $this;
        $obj['hasCustomProperties'] = $hasCustomProperties;

        return $obj;
    }

    public function withHasDefaultProperties(bool $hasDefaultProperties): self
    {
        $obj = clone $this;
        $obj['hasDefaultProperties'] = $hasDefaultProperties;

        return $obj;
    }

    public function withHasExternalObjectIDs(bool $hasExternalObjectIDs): self
    {
        $obj = clone $this;
        $obj['hasExternalObjectIds'] = $hasExternalObjectIDs;

        return $obj;
    }

    public function withHasOwners(bool $hasOwners): self
    {
        $obj = clone $this;
        $obj['hasOwners'] = $hasOwners;

        return $obj;
    }

    public function withHasPipelines(bool $hasPipelines): self
    {
        $obj = clone $this;
        $obj['hasPipelines'] = $hasPipelines;

        return $obj;
    }

    public function withIndexedForFiltersAndReports(
        bool $indexedForFiltersAndReports
    ): self {
        $obj = clone $this;
        $obj['indexedForFiltersAndReports'] = $indexedForFiltersAndReports;

        return $obj;
    }

    public function withLastModifiedPropertyName(
        string $lastModifiedPropertyName
    ): self {
        $obj = clone $this;
        $obj['lastModifiedPropertyName'] = $lastModifiedPropertyName;

        return $obj;
    }

    /**
     * @param MetaType|value-of<MetaType> $metaType
     */
    public function withMetaType(MetaType|string $metaType): self
    {
        $obj = clone $this;
        $obj['metaType'] = $metaType;

        return $obj;
    }

    public function withMetaTypeID(int $metaTypeID): self
    {
        $obj = clone $this;
        $obj['metaTypeId'] = $metaTypeID;

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

    public function withPermissioningType(string $permissioningType): self
    {
        $obj = clone $this;
        $obj['permissioningType'] = $permissioningType;

        return $obj;
    }

    public function withPipelinePropertyName(string $pipelinePropertyName): self
    {
        $obj = clone $this;
        $obj['pipelinePropertyName'] = $pipelinePropertyName;

        return $obj;
    }

    public function withPipelineStagePropertyName(
        string $pipelineStagePropertyName
    ): self {
        $obj = clone $this;
        $obj['pipelineStagePropertyName'] = $pipelineStagePropertyName;

        return $obj;
    }

    /**
     * @param list<string> $requiredProperties
     */
    public function withRequiredProperties(array $requiredProperties): self
    {
        $obj = clone $this;
        $obj['requiredProperties'] = $requiredProperties;

        return $obj;
    }

    public function withRestorable(bool $restorable): self
    {
        $obj = clone $this;
        $obj['restorable'] = $restorable;

        return $obj;
    }

    /**
     * @param list<ScopeMapping|array{
     *   accessLevel: string, requestAction: string, scopeName: string
     * }> $scopeMappings
     */
    public function withScopeMappings(array $scopeMappings): self
    {
        $obj = clone $this;
        $obj['scopeMappings'] = $scopeMappings;

        return $obj;
    }

    /**
     * @param list<string> $secondaryDisplayLabelPropertyNames
     */
    public function withSecondaryDisplayLabelPropertyNames(
        array $secondaryDisplayLabelPropertyNames
    ): self {
        $obj = clone $this;
        $obj['secondaryDisplayLabelPropertyNames'] = $secondaryDisplayLabelPropertyNames;

        return $obj;
    }

    public function withAccessScopeName(string $accessScopeName): self
    {
        $obj = clone $this;
        $obj['accessScopeName'] = $accessScopeName;

        return $obj;
    }

    public function withCreatedAt(int $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withIntegrationAppID(int $integrationAppID): self
    {
        $obj = clone $this;
        $obj['integrationAppId'] = $integrationAppID;

        return $obj;
    }

    public function withJanusGroup(string $janusGroup): self
    {
        $obj = clone $this;
        $obj['janusGroup'] = $janusGroup;

        return $obj;
    }

    public function withOwnerPortalID(int $ownerPortalID): self
    {
        $obj = clone $this;
        $obj['ownerPortalId'] = $ownerPortalID;

        return $obj;
    }

    public function withPipelineCloseDatePropertyName(
        string $pipelineCloseDatePropertyName
    ): self {
        $obj = clone $this;
        $obj['pipelineCloseDatePropertyName'] = $pipelineCloseDatePropertyName;

        return $obj;
    }

    public function withPipelineTimeToClosePropertyName(
        string $pipelineTimeToClosePropertyName
    ): self {
        $obj = clone $this;
        $obj['pipelineTimeToClosePropertyName'] = $pipelineTimeToClosePropertyName;

        return $obj;
    }

    public function withPluralForm(string $pluralForm): self
    {
        $obj = clone $this;
        $obj['pluralForm'] = $pluralForm;

        return $obj;
    }

    public function withPrimaryDisplayLabelPropertyName(
        string $primaryDisplayLabelPropertyName
    ): self {
        $obj = clone $this;
        $obj['primaryDisplayLabelPropertyName'] = $primaryDisplayLabelPropertyName;

        return $obj;
    }

    public function withReadScopeName(string $readScopeName): self
    {
        $obj = clone $this;
        $obj['readScopeName'] = $readScopeName;

        return $obj;
    }

    public function withSingularForm(string $singularForm): self
    {
        $obj = clone $this;
        $obj['singularForm'] = $singularForm;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withVisibility(string $visibility): self
    {
        $obj = clone $this;
        $obj['visibility'] = $visibility;

        return $obj;
    }

    public function withWriteScopeName(string $writeScopeName): self
    {
        $obj = clone $this;
        $obj['writeScopeName'] = $writeScopeName;

        return $obj;
    }
}
