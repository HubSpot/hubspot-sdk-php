<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\InboundDBObjectType\MetaType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Property;

/**
 * @phpstan-type IntegratorObjectCreationResponseShape = array{
 *   objectType: InboundDBObjectType,
 *   properties: list<PropertyDefinition>,
 *   propertyGroups: list<Group>,
 * }
 */
final class IntegratorObjectCreationResponse implements BaseModel
{
    /** @use SdkModel<IntegratorObjectCreationResponseShape> */
    use SdkModel;

    #[Required]
    public InboundDBObjectType $objectType;

    /** @var list<PropertyDefinition> $properties */
    #[Required(list: PropertyDefinition::class)]
    public array $properties;

    /** @var list<Group> $propertyGroups */
    #[Required(list: Group::class)]
    public array $propertyGroups;

    /**
     * `new IntegratorObjectCreationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorObjectCreationResponse::with(
     *   objectType: ..., properties: ..., propertyGroups: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorObjectCreationResponse)
     *   ->withObjectType(...)
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
     * @param InboundDBObjectType|array{
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
     * } $objectType
     * @param list<PropertyDefinition|array{
     *   objectTypeId: string,
     *   property: Property,
     *   calculationExpression?: array<string,mixed>|null,
     *   calculationFormula?: string|null,
     *   definitionSource?: PropertyDefinitionSource|null,
     *   extensionData?: ExtensionData|null,
     *   externalOptionsMetaData?: ExternalOptionsMetaData|null,
     *   fulcrumPortalId?: int|null,
     *   fulcrumTimestamp?: int|null,
     *   janusGroup?: string|null,
     *   permission?: FieldLevelPermission|null,
     *   propertyDefinitionSource?: DefinitionSource|null,
     *   propertyRequirements?: DefaultRequirements|null,
     *   rollupExpression?: RollupExpression|null,
     * }> $properties
     * @param list<Group|array{
     *   deleted: bool,
     *   displayName: string,
     *   displayOrder: int,
     *   fulcrumPortalId: int,
     *   fulcrumTimestamp: int,
     *   hubspotDefined: bool,
     *   name: string,
     *   portalId: int,
     * }> $propertyGroups
     */
    public static function with(
        InboundDBObjectType|array $objectType,
        array $properties,
        array $propertyGroups,
    ): self {
        $obj = new self;

        $obj['objectType'] = $objectType;
        $obj['properties'] = $properties;
        $obj['propertyGroups'] = $propertyGroups;

        return $obj;
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
     * } $objectType
     */
    public function withObjectType(InboundDBObjectType|array $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    /**
     * @param list<PropertyDefinition|array{
     *   objectTypeId: string,
     *   property: Property,
     *   calculationExpression?: array<string,mixed>|null,
     *   calculationFormula?: string|null,
     *   definitionSource?: PropertyDefinitionSource|null,
     *   extensionData?: ExtensionData|null,
     *   externalOptionsMetaData?: ExternalOptionsMetaData|null,
     *   fulcrumPortalId?: int|null,
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
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * @param list<Group|array{
     *   deleted: bool,
     *   displayName: string,
     *   displayOrder: int,
     *   fulcrumPortalId: int,
     *   fulcrumTimestamp: int,
     *   hubspotDefined: bool,
     *   name: string,
     *   portalId: int,
     * }> $propertyGroups
     */
    public function withPropertyGroups(array $propertyGroups): self
    {
        $obj = clone $this;
        $obj['propertyGroups'] = $propertyGroups;

        return $obj;
    }
}
