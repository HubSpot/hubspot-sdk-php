<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Cms\MediaBridge\DefaultRequirements\Operator;
use HubspotSDK\Cms\MediaBridge\PropertyDefinitionSource\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Option;
use HubspotSDK\Property;
use HubspotSDK\Property\DataSensitivity;
use HubspotSDK\PropertyModificationMetadata;

/**
 * @phpstan-type PropertyDefinitionShape = array{
 *   objectTypeID: string,
 *   property: \HubspotSDK\Property,
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
 * }
 */
final class PropertyDefinition implements BaseModel
{
    /** @use SdkModel<PropertyDefinitionShape> */
    use SdkModel;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * Defines a property.
     */
    #[Required]
    public Property $property;

    /** @var array<string,mixed>|null $calculationExpression */
    #[Optional(map: 'mixed')]
    public ?array $calculationExpression;

    #[Optional]
    public ?string $calculationFormula;

    #[Optional]
    public ?PropertyDefinitionSource $definitionSource;

    #[Optional]
    public ?ExtensionData $extensionData;

    #[Optional]
    public ?ExternalOptionsMetaData $externalOptionsMetaData;

    #[Optional('fulcrumPortalId')]
    public ?int $fulcrumPortalID;

    #[Optional]
    public ?int $fulcrumTimestamp;

    #[Optional]
    public ?string $janusGroup;

    #[Optional]
    public ?FieldLevelPermission $permission;

    #[Optional]
    public ?DefinitionSource $propertyDefinitionSource;

    #[Optional]
    public ?DefaultRequirements $propertyRequirements;

    #[Optional]
    public ?RollupExpression $rollupExpression;

    /**
     * `new PropertyDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyDefinition::with(objectTypeID: ..., property: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyDefinition)->withObjectTypeID(...)->withProperty(...)
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
     * @param Property|array{
     *   description: string,
     *   fieldType: string,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   options: list<Option>,
     *   type: string,
     *   archived?: bool|null,
     *   archivedAt?: \DateTimeInterface|null,
     *   calculated?: bool|null,
     *   calculationFormula?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdUserID?: string|null,
     *   dataSensitivity?: value-of<DataSensitivity>|null,
     *   displayOrder?: int|null,
     *   externalOptions?: bool|null,
     *   formField?: bool|null,
     *   hasUniqueValue?: bool|null,
     *   hidden?: bool|null,
     *   hubspotDefined?: bool|null,
     *   modificationMetadata?: PropertyModificationMetadata|null,
     *   referencedObjectType?: string|null,
     *   sensitiveDataCategories?: list<string>|null,
     *   showCurrencySymbol?: bool|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedUserID?: string|null,
     * } $property
     * @param array<string,mixed> $calculationExpression
     * @param PropertyDefinitionSource|array{
     *   type: value-of<Type>, name?: string|null
     * } $definitionSource
     * @param ExtensionData|array{
     *   extensionStatusMap: array<string,string>,
     *   tags: list<string>,
     *   caseChangeTestExtensionData?: CaseChangeTestExtensionData|null,
     *   optionDecoratorsExtensionData?: OptionDecoratorsExtensionData|null,
     *   requiredPropertiesExtensionData?: RequiredPropertiesExtensionData|null,
     *   softRequiredPropertiesExtensionData?: SoftRequiredPropertiesExtensionData|null,
     * } $extensionData
     * @param ExternalOptionsMetaData|array{
     *   filter?: FilteringMetaData|null, relatedObjectTypeID?: string|null
     * } $externalOptionsMetaData
     * @param FieldLevelPermission|array{accessLevel: string} $permission
     * @param DefinitionSource|array{
     *   type: string, name?: string|null
     * } $propertyDefinitionSource
     * @param DefaultRequirements|array{
     *   gates: list<string>,
     *   operator: value-of<Operator>,
     *   scopeNames: list<string>,
     *   settings: list<string>,
     * } $propertyRequirements
     * @param RollupExpression|array{
     *   associationTypes: list<AssociationSpec>,
     *   rollupOperator: string,
     *   sourceObjectTypeID: string,
     *   sourcePropertyName: string,
     *   conditionalExpression?: array<string,mixed>|null,
     *   conditionalFormula?: string|null,
     *   emptyRollupValue?: string|null,
     *   sourceCompareByPropertyName?: string|null,
     * } $rollupExpression
     */
    public static function with(
        string $objectTypeID,
        Property|array $property,
        ?array $calculationExpression = null,
        ?string $calculationFormula = null,
        PropertyDefinitionSource|array|null $definitionSource = null,
        ExtensionData|array|null $extensionData = null,
        ExternalOptionsMetaData|array|null $externalOptionsMetaData = null,
        ?int $fulcrumPortalID = null,
        ?int $fulcrumTimestamp = null,
        ?string $janusGroup = null,
        FieldLevelPermission|array|null $permission = null,
        DefinitionSource|array|null $propertyDefinitionSource = null,
        DefaultRequirements|array|null $propertyRequirements = null,
        RollupExpression|array|null $rollupExpression = null,
    ): self {
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;
        $self['property'] = $property;

        null !== $calculationExpression && $self['calculationExpression'] = $calculationExpression;
        null !== $calculationFormula && $self['calculationFormula'] = $calculationFormula;
        null !== $definitionSource && $self['definitionSource'] = $definitionSource;
        null !== $extensionData && $self['extensionData'] = $extensionData;
        null !== $externalOptionsMetaData && $self['externalOptionsMetaData'] = $externalOptionsMetaData;
        null !== $fulcrumPortalID && $self['fulcrumPortalID'] = $fulcrumPortalID;
        null !== $fulcrumTimestamp && $self['fulcrumTimestamp'] = $fulcrumTimestamp;
        null !== $janusGroup && $self['janusGroup'] = $janusGroup;
        null !== $permission && $self['permission'] = $permission;
        null !== $propertyDefinitionSource && $self['propertyDefinitionSource'] = $propertyDefinitionSource;
        null !== $propertyRequirements && $self['propertyRequirements'] = $propertyRequirements;
        null !== $rollupExpression && $self['rollupExpression'] = $rollupExpression;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * Defines a property.
     *
     * @param Property|array{
     *   description: string,
     *   fieldType: string,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   options: list<Option>,
     *   type: string,
     *   archived?: bool|null,
     *   archivedAt?: \DateTimeInterface|null,
     *   calculated?: bool|null,
     *   calculationFormula?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdUserID?: string|null,
     *   dataSensitivity?: value-of<DataSensitivity>|null,
     *   displayOrder?: int|null,
     *   externalOptions?: bool|null,
     *   formField?: bool|null,
     *   hasUniqueValue?: bool|null,
     *   hidden?: bool|null,
     *   hubspotDefined?: bool|null,
     *   modificationMetadata?: PropertyModificationMetadata|null,
     *   referencedObjectType?: string|null,
     *   sensitiveDataCategories?: list<string>|null,
     *   showCurrencySymbol?: bool|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedUserID?: string|null,
     * } $property
     */
    public function withProperty(Property|array $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    /**
     * @param array<string,mixed> $calculationExpression
     */
    public function withCalculationExpression(
        array $calculationExpression
    ): self {
        $self = clone $this;
        $self['calculationExpression'] = $calculationExpression;

        return $self;
    }

    public function withCalculationFormula(string $calculationFormula): self
    {
        $self = clone $this;
        $self['calculationFormula'] = $calculationFormula;

        return $self;
    }

    /**
     * @param PropertyDefinitionSource|array{
     *   type: value-of<Type>, name?: string|null
     * } $definitionSource
     */
    public function withDefinitionSource(
        PropertyDefinitionSource|array $definitionSource
    ): self {
        $self = clone $this;
        $self['definitionSource'] = $definitionSource;

        return $self;
    }

    /**
     * @param ExtensionData|array{
     *   extensionStatusMap: array<string,string>,
     *   tags: list<string>,
     *   caseChangeTestExtensionData?: CaseChangeTestExtensionData|null,
     *   optionDecoratorsExtensionData?: OptionDecoratorsExtensionData|null,
     *   requiredPropertiesExtensionData?: RequiredPropertiesExtensionData|null,
     *   softRequiredPropertiesExtensionData?: SoftRequiredPropertiesExtensionData|null,
     * } $extensionData
     */
    public function withExtensionData(ExtensionData|array $extensionData): self
    {
        $self = clone $this;
        $self['extensionData'] = $extensionData;

        return $self;
    }

    /**
     * @param ExternalOptionsMetaData|array{
     *   filter?: FilteringMetaData|null, relatedObjectTypeID?: string|null
     * } $externalOptionsMetaData
     */
    public function withExternalOptionsMetaData(
        ExternalOptionsMetaData|array $externalOptionsMetaData
    ): self {
        $self = clone $this;
        $self['externalOptionsMetaData'] = $externalOptionsMetaData;

        return $self;
    }

    public function withFulcrumPortalID(int $fulcrumPortalID): self
    {
        $self = clone $this;
        $self['fulcrumPortalID'] = $fulcrumPortalID;

        return $self;
    }

    public function withFulcrumTimestamp(int $fulcrumTimestamp): self
    {
        $self = clone $this;
        $self['fulcrumTimestamp'] = $fulcrumTimestamp;

        return $self;
    }

    public function withJanusGroup(string $janusGroup): self
    {
        $self = clone $this;
        $self['janusGroup'] = $janusGroup;

        return $self;
    }

    /**
     * @param FieldLevelPermission|array{accessLevel: string} $permission
     */
    public function withPermission(FieldLevelPermission|array $permission): self
    {
        $self = clone $this;
        $self['permission'] = $permission;

        return $self;
    }

    /**
     * @param DefinitionSource|array{
     *   type: string, name?: string|null
     * } $propertyDefinitionSource
     */
    public function withPropertyDefinitionSource(
        DefinitionSource|array $propertyDefinitionSource
    ): self {
        $self = clone $this;
        $self['propertyDefinitionSource'] = $propertyDefinitionSource;

        return $self;
    }

    /**
     * @param DefaultRequirements|array{
     *   gates: list<string>,
     *   operator: value-of<Operator>,
     *   scopeNames: list<string>,
     *   settings: list<string>,
     * } $propertyRequirements
     */
    public function withPropertyRequirements(
        DefaultRequirements|array $propertyRequirements
    ): self {
        $self = clone $this;
        $self['propertyRequirements'] = $propertyRequirements;

        return $self;
    }

    /**
     * @param RollupExpression|array{
     *   associationTypes: list<AssociationSpec>,
     *   rollupOperator: string,
     *   sourceObjectTypeID: string,
     *   sourcePropertyName: string,
     *   conditionalExpression?: array<string,mixed>|null,
     *   conditionalFormula?: string|null,
     *   emptyRollupValue?: string|null,
     *   sourceCompareByPropertyName?: string|null,
     * } $rollupExpression
     */
    public function withRollupExpression(
        RollupExpression|array $rollupExpression
    ): self {
        $self = clone $this;
        $self['rollupExpression'] = $rollupExpression;

        return $self;
    }
}
