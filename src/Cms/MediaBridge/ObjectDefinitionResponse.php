<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\InboundDBObjectType\MetaType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Property;

/**
 * @phpstan-type ObjectDefinitionResponseShape = array{
 *   objectTypeID: string,
 *   objectTypeName: string,
 *   properties: list<PropertyDefinition>,
 *   propertyGroups: list<GroupView>,
 *   schema?: InboundDBObjectType|null,
 * }
 */
final class ObjectDefinitionResponse implements BaseModel
{
    /** @use SdkModel<ObjectDefinitionResponseShape> */
    use SdkModel;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required]
    public string $objectTypeName;

    /** @var list<PropertyDefinition> $properties */
    #[Required(list: PropertyDefinition::class)]
    public array $properties;

    /** @var list<GroupView> $propertyGroups */
    #[Required(list: GroupView::class)]
    public array $propertyGroups;

    #[Optional]
    public ?InboundDBObjectType $schema;

    /**
     * `new ObjectDefinitionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectDefinitionResponse::with(
     *   objectTypeID: ..., objectTypeName: ..., properties: ..., propertyGroups: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectDefinitionResponse)
     *   ->withObjectTypeID(...)
     *   ->withObjectTypeName(...)
     *   ->withProperties(...)
     *   ->withPropertyGroups(...)
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
     * @param list<PropertyDefinition|array{
     *   objectTypeID: string,
     *   property: Property,
     *   calculationExpression?: array<string,mixed>|null,
     *   calculationFormula?: string|null,
     *   definitionSource?: PropertyDefinitionSource|null,
     *   extensionData?: ExtensionData|null,
     *   externalOptionsMetaData?: ExternalOptionsMetaData|null,
     *   fulcrumPortalID?: int|null,
     *   fulcrumTimestamp?: int|null,
     *   janusGroup?: string|null,
     *   permission?: FieldLevelPermission|null,
     *   propertyDefinitionSource?: DefinitionSource|null,
     *   propertyRequirements?: DefaultRequirements|null,
     *   rollupExpression?: RollupExpression|null,
     * }> $properties
     * @param list<GroupView|array{
     *   displayName: string,
     *   displayOrder: int,
     *   fulcrumPortalID: int,
     *   fulcrumTimestamp: int,
     *   hubspotDefined: bool,
     *   name: string,
     * }> $propertyGroups
     * @param InboundDBObjectType|array{
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
     * } $schema
     */
    public static function with(
        string $objectTypeID,
        string $objectTypeName,
        array $properties,
        array $propertyGroups,
        InboundDBObjectType|array|null $schema = null,
    ): self {
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;
        $self['objectTypeName'] = $objectTypeName;
        $self['properties'] = $properties;
        $self['propertyGroups'] = $propertyGroups;

        null !== $schema && $self['schema'] = $schema;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withObjectTypeName(string $objectTypeName): self
    {
        $self = clone $this;
        $self['objectTypeName'] = $objectTypeName;

        return $self;
    }

    /**
     * @param list<PropertyDefinition|array{
     *   objectTypeID: string,
     *   property: Property,
     *   calculationExpression?: array<string,mixed>|null,
     *   calculationFormula?: string|null,
     *   definitionSource?: PropertyDefinitionSource|null,
     *   extensionData?: ExtensionData|null,
     *   externalOptionsMetaData?: ExternalOptionsMetaData|null,
     *   fulcrumPortalID?: int|null,
     *   fulcrumTimestamp?: int|null,
     *   janusGroup?: string|null,
     *   permission?: FieldLevelPermission|null,
     *   propertyDefinitionSource?: DefinitionSource|null,
     *   propertyRequirements?: DefaultRequirements|null,
     *   rollupExpression?: RollupExpression|null,
     * }> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param list<GroupView|array{
     *   displayName: string,
     *   displayOrder: int,
     *   fulcrumPortalID: int,
     *   fulcrumTimestamp: int,
     *   hubspotDefined: bool,
     *   name: string,
     * }> $propertyGroups
     */
    public function withPropertyGroups(array $propertyGroups): self
    {
        $self = clone $this;
        $self['propertyGroups'] = $propertyGroups;

        return $self;
    }

    /**
     * @param InboundDBObjectType|array{
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
     * } $schema
     */
    public function withSchema(InboundDBObjectType|array $schema): self
    {
        $self = clone $this;
        $self['schema'] = $schema;

        return $self;
    }
}
