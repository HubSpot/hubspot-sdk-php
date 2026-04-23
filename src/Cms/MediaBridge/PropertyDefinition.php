<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MediaBridgePropertyShape from \HubSpotSDK\Cms\MediaBridge\MediaBridgeProperty
 * @phpstan-import-type PropertyDefinitionSourceShape from \HubSpotSDK\Cms\MediaBridge\PropertyDefinitionSource
 * @phpstan-import-type ExtensionDataShape from \HubSpotSDK\Cms\MediaBridge\ExtensionData
 * @phpstan-import-type ExternalOptionsMetaDataShape from \HubSpotSDK\Cms\MediaBridge\ExternalOptionsMetaData
 * @phpstan-import-type LookupAssociationSpecShape from \HubSpotSDK\Cms\MediaBridge\LookupAssociationSpec
 * @phpstan-import-type FieldLevelPermissionShape from \HubSpotSDK\Cms\MediaBridge\FieldLevelPermission
 * @phpstan-import-type DefinitionSourceShape from \HubSpotSDK\Cms\MediaBridge\DefinitionSource
 * @phpstan-import-type DefaultRequirementsShape from \HubSpotSDK\Cms\MediaBridge\DefaultRequirements
 * @phpstan-import-type RollupExpressionShape from \HubSpotSDK\Cms\MediaBridge\RollupExpression
 *
 * @phpstan-type PropertyDefinitionShape = array{
 *   objectTypeID: string,
 *   property: MediaBridgeProperty|MediaBridgePropertyShape,
 *   calculationExpression?: mixed,
 *   calculationFormula?: string|null,
 *   definitionSource?: null|PropertyDefinitionSource|PropertyDefinitionSourceShape,
 *   extensionData?: null|ExtensionData|ExtensionDataShape,
 *   externalOptionsMetaData?: null|ExternalOptionsMetaData|ExternalOptionsMetaDataShape,
 *   fulcrumPortalID?: int|null,
 *   fulcrumTimestamp?: int|null,
 *   janusGroup?: string|null,
 *   lookupAssociationSpec?: null|LookupAssociationSpec|LookupAssociationSpecShape,
 *   permission?: null|FieldLevelPermission|FieldLevelPermissionShape,
 *   propertyDefinitionSource?: null|DefinitionSource|DefinitionSourceShape,
 *   propertyRequirements?: null|DefaultRequirements|DefaultRequirementsShape,
 *   rollupExpression?: null|RollupExpression|RollupExpressionShape,
 * }
 */
final class PropertyDefinition implements BaseModel
{
    /** @use SdkModel<PropertyDefinitionShape> */
    use SdkModel;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * A HubSpot property.
     */
    #[Required]
    public MediaBridgeProperty $property;

    #[Optional]
    public mixed $calculationExpression;

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
    public ?LookupAssociationSpec $lookupAssociationSpec;

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
     * @param MediaBridgeProperty|MediaBridgePropertyShape $property
     * @param PropertyDefinitionSource|PropertyDefinitionSourceShape|null $definitionSource
     * @param ExtensionData|ExtensionDataShape|null $extensionData
     * @param ExternalOptionsMetaData|ExternalOptionsMetaDataShape|null $externalOptionsMetaData
     * @param LookupAssociationSpec|LookupAssociationSpecShape|null $lookupAssociationSpec
     * @param FieldLevelPermission|FieldLevelPermissionShape|null $permission
     * @param DefinitionSource|DefinitionSourceShape|null $propertyDefinitionSource
     * @param DefaultRequirements|DefaultRequirementsShape|null $propertyRequirements
     * @param RollupExpression|RollupExpressionShape|null $rollupExpression
     */
    public static function with(
        string $objectTypeID,
        MediaBridgeProperty|array $property,
        mixed $calculationExpression = null,
        ?string $calculationFormula = null,
        PropertyDefinitionSource|array|null $definitionSource = null,
        ExtensionData|array|null $extensionData = null,
        ExternalOptionsMetaData|array|null $externalOptionsMetaData = null,
        ?int $fulcrumPortalID = null,
        ?int $fulcrumTimestamp = null,
        ?string $janusGroup = null,
        LookupAssociationSpec|array|null $lookupAssociationSpec = null,
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
        null !== $lookupAssociationSpec && $self['lookupAssociationSpec'] = $lookupAssociationSpec;
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
     * A HubSpot property.
     *
     * @param MediaBridgeProperty|MediaBridgePropertyShape $property
     */
    public function withProperty(MediaBridgeProperty|array $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    public function withCalculationExpression(
        mixed $calculationExpression
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
     * @param PropertyDefinitionSource|PropertyDefinitionSourceShape $definitionSource
     */
    public function withDefinitionSource(
        PropertyDefinitionSource|array $definitionSource
    ): self {
        $self = clone $this;
        $self['definitionSource'] = $definitionSource;

        return $self;
    }

    /**
     * @param ExtensionData|ExtensionDataShape $extensionData
     */
    public function withExtensionData(ExtensionData|array $extensionData): self
    {
        $self = clone $this;
        $self['extensionData'] = $extensionData;

        return $self;
    }

    /**
     * @param ExternalOptionsMetaData|ExternalOptionsMetaDataShape $externalOptionsMetaData
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
     * @param LookupAssociationSpec|LookupAssociationSpecShape $lookupAssociationSpec
     */
    public function withLookupAssociationSpec(
        LookupAssociationSpec|array $lookupAssociationSpec
    ): self {
        $self = clone $this;
        $self['lookupAssociationSpec'] = $lookupAssociationSpec;

        return $self;
    }

    /**
     * @param FieldLevelPermission|FieldLevelPermissionShape $permission
     */
    public function withPermission(FieldLevelPermission|array $permission): self
    {
        $self = clone $this;
        $self['permission'] = $permission;

        return $self;
    }

    /**
     * @param DefinitionSource|DefinitionSourceShape $propertyDefinitionSource
     */
    public function withPropertyDefinitionSource(
        DefinitionSource|array $propertyDefinitionSource
    ): self {
        $self = clone $this;
        $self['propertyDefinitionSource'] = $propertyDefinitionSource;

        return $self;
    }

    /**
     * @param DefaultRequirements|DefaultRequirementsShape $propertyRequirements
     */
    public function withPropertyRequirements(
        DefaultRequirements|array $propertyRequirements
    ): self {
        $self = clone $this;
        $self['propertyRequirements'] = $propertyRequirements;

        return $self;
    }

    /**
     * @param RollupExpression|RollupExpressionShape $rollupExpression
     */
    public function withRollupExpression(
        RollupExpression|array $rollupExpression
    ): self {
        $self = clone $this;
        $self['rollupExpression'] = $rollupExpression;

        return $self;
    }
}
