<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\InboundDBObjectType\MetaType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type inbound_db_object_type = array{
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
 *   accessScopeName?: string,
 *   createdAt?: int,
 *   description?: string,
 *   integrationAppID?: int,
 *   janusGroup?: string,
 *   ownerPortalID?: int,
 *   pipelineCloseDatePropertyName?: string,
 *   pipelineTimeToClosePropertyName?: string,
 *   pluralForm?: string,
 *   primaryDisplayLabelPropertyName?: string,
 *   readScopeName?: string,
 *   singularForm?: string,
 *   status?: string,
 *   visibility?: string,
 *   writeScopeName?: string,
 * }
 */
final class InboundDBObjectType implements BaseModel
{
    /** @use SdkModel<inbound_db_object_type> */
    use SdkModel;

    #[Api]
    public int $id;

    #[Api]
    public bool $allowsSensitiveProperties;

    #[Api]
    public string $createDatePropertyName;

    /** @var list<string> $defaultSearchPropertyNames */
    #[Api(list: 'string')]
    public array $defaultSearchPropertyNames;

    #[Api]
    public bool $deleted;

    #[Api]
    public string $fullyQualifiedName;

    #[Api]
    public bool $hasCustomProperties;

    #[Api]
    public bool $hasDefaultProperties;

    #[Api('hasExternalObjectIds')]
    public bool $hasExternalObjectIDs;

    #[Api]
    public bool $hasOwners;

    #[Api]
    public bool $hasPipelines;

    #[Api]
    public bool $indexedForFiltersAndReports;

    #[Api]
    public string $lastModifiedPropertyName;

    /** @var value-of<MetaType> $metaType */
    #[Api(enum: MetaType::class)]
    public string $metaType;

    #[Api('metaTypeId')]
    public int $metaTypeID;

    #[Api]
    public string $name;

    #[Api('objectTypeId')]
    public string $objectTypeID;

    #[Api]
    public string $permissioningType;

    #[Api]
    public string $pipelinePropertyName;

    #[Api]
    public string $pipelineStagePropertyName;

    /** @var list<string> $requiredProperties */
    #[Api(list: 'string')]
    public array $requiredProperties;

    #[Api]
    public bool $restorable;

    /** @var list<ScopeMapping> $scopeMappings */
    #[Api(list: ScopeMapping::class)]
    public array $scopeMappings;

    /** @var list<string> $secondaryDisplayLabelPropertyNames */
    #[Api(list: 'string')]
    public array $secondaryDisplayLabelPropertyNames;

    #[Api(optional: true)]
    public ?string $accessScopeName;

    #[Api(optional: true)]
    public ?int $createdAt;

    #[Api(optional: true)]
    public ?string $description;

    #[Api('integrationAppId', optional: true)]
    public ?int $integrationAppID;

    #[Api(optional: true)]
    public ?string $janusGroup;

    #[Api('ownerPortalId', optional: true)]
    public ?int $ownerPortalID;

    #[Api(optional: true)]
    public ?string $pipelineCloseDatePropertyName;

    #[Api(optional: true)]
    public ?string $pipelineTimeToClosePropertyName;

    #[Api(optional: true)]
    public ?string $pluralForm;

    #[Api(optional: true)]
    public ?string $primaryDisplayLabelPropertyName;

    #[Api(optional: true)]
    public ?string $readScopeName;

    #[Api(optional: true)]
    public ?string $singularForm;

    #[Api(optional: true)]
    public ?string $status;

    #[Api(optional: true)]
    public ?string $visibility;

    #[Api(optional: true)]
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
     * @param list<ScopeMapping> $scopeMappings
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
        $obj = new self;

        $obj->id = $id;
        $obj->allowsSensitiveProperties = $allowsSensitiveProperties;
        $obj->createDatePropertyName = $createDatePropertyName;
        $obj->defaultSearchPropertyNames = $defaultSearchPropertyNames;
        $obj->deleted = $deleted;
        $obj->fullyQualifiedName = $fullyQualifiedName;
        $obj->hasCustomProperties = $hasCustomProperties;
        $obj->hasDefaultProperties = $hasDefaultProperties;
        $obj->hasExternalObjectIDs = $hasExternalObjectIDs;
        $obj->hasOwners = $hasOwners;
        $obj->hasPipelines = $hasPipelines;
        $obj->indexedForFiltersAndReports = $indexedForFiltersAndReports;
        $obj->lastModifiedPropertyName = $lastModifiedPropertyName;
        $obj['metaType'] = $metaType;
        $obj->metaTypeID = $metaTypeID;
        $obj->name = $name;
        $obj->objectTypeID = $objectTypeID;
        $obj->permissioningType = $permissioningType;
        $obj->pipelinePropertyName = $pipelinePropertyName;
        $obj->pipelineStagePropertyName = $pipelineStagePropertyName;
        $obj->requiredProperties = $requiredProperties;
        $obj->restorable = $restorable;
        $obj->scopeMappings = $scopeMappings;
        $obj->secondaryDisplayLabelPropertyNames = $secondaryDisplayLabelPropertyNames;

        null !== $accessScopeName && $obj->accessScopeName = $accessScopeName;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $description && $obj->description = $description;
        null !== $integrationAppID && $obj->integrationAppID = $integrationAppID;
        null !== $janusGroup && $obj->janusGroup = $janusGroup;
        null !== $ownerPortalID && $obj->ownerPortalID = $ownerPortalID;
        null !== $pipelineCloseDatePropertyName && $obj->pipelineCloseDatePropertyName = $pipelineCloseDatePropertyName;
        null !== $pipelineTimeToClosePropertyName && $obj->pipelineTimeToClosePropertyName = $pipelineTimeToClosePropertyName;
        null !== $pluralForm && $obj->pluralForm = $pluralForm;
        null !== $primaryDisplayLabelPropertyName && $obj->primaryDisplayLabelPropertyName = $primaryDisplayLabelPropertyName;
        null !== $readScopeName && $obj->readScopeName = $readScopeName;
        null !== $singularForm && $obj->singularForm = $singularForm;
        null !== $status && $obj->status = $status;
        null !== $visibility && $obj->visibility = $visibility;
        null !== $writeScopeName && $obj->writeScopeName = $writeScopeName;

        return $obj;
    }

    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withAllowsSensitiveProperties(
        bool $allowsSensitiveProperties
    ): self {
        $obj = clone $this;
        $obj->allowsSensitiveProperties = $allowsSensitiveProperties;

        return $obj;
    }

    public function withCreateDatePropertyName(
        string $createDatePropertyName
    ): self {
        $obj = clone $this;
        $obj->createDatePropertyName = $createDatePropertyName;

        return $obj;
    }

    /**
     * @param list<string> $defaultSearchPropertyNames
     */
    public function withDefaultSearchPropertyNames(
        array $defaultSearchPropertyNames
    ): self {
        $obj = clone $this;
        $obj->defaultSearchPropertyNames = $defaultSearchPropertyNames;

        return $obj;
    }

    public function withDeleted(bool $deleted): self
    {
        $obj = clone $this;
        $obj->deleted = $deleted;

        return $obj;
    }

    public function withFullyQualifiedName(string $fullyQualifiedName): self
    {
        $obj = clone $this;
        $obj->fullyQualifiedName = $fullyQualifiedName;

        return $obj;
    }

    public function withHasCustomProperties(bool $hasCustomProperties): self
    {
        $obj = clone $this;
        $obj->hasCustomProperties = $hasCustomProperties;

        return $obj;
    }

    public function withHasDefaultProperties(bool $hasDefaultProperties): self
    {
        $obj = clone $this;
        $obj->hasDefaultProperties = $hasDefaultProperties;

        return $obj;
    }

    public function withHasExternalObjectIDs(bool $hasExternalObjectIDs): self
    {
        $obj = clone $this;
        $obj->hasExternalObjectIDs = $hasExternalObjectIDs;

        return $obj;
    }

    public function withHasOwners(bool $hasOwners): self
    {
        $obj = clone $this;
        $obj->hasOwners = $hasOwners;

        return $obj;
    }

    public function withHasPipelines(bool $hasPipelines): self
    {
        $obj = clone $this;
        $obj->hasPipelines = $hasPipelines;

        return $obj;
    }

    public function withIndexedForFiltersAndReports(
        bool $indexedForFiltersAndReports
    ): self {
        $obj = clone $this;
        $obj->indexedForFiltersAndReports = $indexedForFiltersAndReports;

        return $obj;
    }

    public function withLastModifiedPropertyName(
        string $lastModifiedPropertyName
    ): self {
        $obj = clone $this;
        $obj->lastModifiedPropertyName = $lastModifiedPropertyName;

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
        $obj->metaTypeID = $metaTypeID;

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

    public function withPermissioningType(string $permissioningType): self
    {
        $obj = clone $this;
        $obj->permissioningType = $permissioningType;

        return $obj;
    }

    public function withPipelinePropertyName(string $pipelinePropertyName): self
    {
        $obj = clone $this;
        $obj->pipelinePropertyName = $pipelinePropertyName;

        return $obj;
    }

    public function withPipelineStagePropertyName(
        string $pipelineStagePropertyName
    ): self {
        $obj = clone $this;
        $obj->pipelineStagePropertyName = $pipelineStagePropertyName;

        return $obj;
    }

    /**
     * @param list<string> $requiredProperties
     */
    public function withRequiredProperties(array $requiredProperties): self
    {
        $obj = clone $this;
        $obj->requiredProperties = $requiredProperties;

        return $obj;
    }

    public function withRestorable(bool $restorable): self
    {
        $obj = clone $this;
        $obj->restorable = $restorable;

        return $obj;
    }

    /**
     * @param list<ScopeMapping> $scopeMappings
     */
    public function withScopeMappings(array $scopeMappings): self
    {
        $obj = clone $this;
        $obj->scopeMappings = $scopeMappings;

        return $obj;
    }

    /**
     * @param list<string> $secondaryDisplayLabelPropertyNames
     */
    public function withSecondaryDisplayLabelPropertyNames(
        array $secondaryDisplayLabelPropertyNames
    ): self {
        $obj = clone $this;
        $obj->secondaryDisplayLabelPropertyNames = $secondaryDisplayLabelPropertyNames;

        return $obj;
    }

    public function withAccessScopeName(string $accessScopeName): self
    {
        $obj = clone $this;
        $obj->accessScopeName = $accessScopeName;

        return $obj;
    }

    public function withCreatedAt(int $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withIntegrationAppID(int $integrationAppID): self
    {
        $obj = clone $this;
        $obj->integrationAppID = $integrationAppID;

        return $obj;
    }

    public function withJanusGroup(string $janusGroup): self
    {
        $obj = clone $this;
        $obj->janusGroup = $janusGroup;

        return $obj;
    }

    public function withOwnerPortalID(int $ownerPortalID): self
    {
        $obj = clone $this;
        $obj->ownerPortalID = $ownerPortalID;

        return $obj;
    }

    public function withPipelineCloseDatePropertyName(
        string $pipelineCloseDatePropertyName
    ): self {
        $obj = clone $this;
        $obj->pipelineCloseDatePropertyName = $pipelineCloseDatePropertyName;

        return $obj;
    }

    public function withPipelineTimeToClosePropertyName(
        string $pipelineTimeToClosePropertyName
    ): self {
        $obj = clone $this;
        $obj->pipelineTimeToClosePropertyName = $pipelineTimeToClosePropertyName;

        return $obj;
    }

    public function withPluralForm(string $pluralForm): self
    {
        $obj = clone $this;
        $obj->pluralForm = $pluralForm;

        return $obj;
    }

    public function withPrimaryDisplayLabelPropertyName(
        string $primaryDisplayLabelPropertyName
    ): self {
        $obj = clone $this;
        $obj->primaryDisplayLabelPropertyName = $primaryDisplayLabelPropertyName;

        return $obj;
    }

    public function withReadScopeName(string $readScopeName): self
    {
        $obj = clone $this;
        $obj->readScopeName = $readScopeName;

        return $obj;
    }

    public function withSingularForm(string $singularForm): self
    {
        $obj = clone $this;
        $obj->singularForm = $singularForm;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    public function withVisibility(string $visibility): self
    {
        $obj = clone $this;
        $obj->visibility = $visibility;

        return $obj;
    }

    public function withWriteScopeName(string $writeScopeName): self
    {
        $obj = clone $this;
        $obj->writeScopeName = $writeScopeName;

        return $obj;
    }
}
