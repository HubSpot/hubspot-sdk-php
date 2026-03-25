<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Property;

/**
 * @phpstan-import-type CalculationExpressionVariants from \HubspotSDK\Cms\MediaBridge\PropertyDefinition\CalculationExpression
 * @phpstan-import-type PropertyShape from \HubspotSDK\Property
 * @phpstan-import-type CalculationExpressionShape from \HubspotSDK\Cms\MediaBridge\PropertyDefinition\CalculationExpression
 * @phpstan-import-type PropertyDefinitionSourceShape from \HubspotSDK\Cms\MediaBridge\PropertyDefinitionSource
 * @phpstan-import-type ExtensionDataShape from \HubspotSDK\Cms\MediaBridge\ExtensionData
 * @phpstan-import-type ExternalOptionsMetaDataShape from \HubspotSDK\Cms\MediaBridge\ExternalOptionsMetaData
 * @phpstan-import-type FieldLevelPermissionShape from \HubspotSDK\Cms\MediaBridge\FieldLevelPermission
 * @phpstan-import-type DefinitionSourceShape from \HubspotSDK\Cms\MediaBridge\DefinitionSource
 * @phpstan-import-type DefaultRequirementsShape from \HubspotSDK\Cms\MediaBridge\DefaultRequirements
 * @phpstan-import-type RollupExpressionShape from \HubspotSDK\Cms\MediaBridge\RollupExpression
 *
 * @phpstan-type PropertyDefinitionShape = array{
 *   objectTypeID: string,
 *   property: \HubspotSDK\Property|PropertyShape,
 *   calculationExpression?: CalculationExpressionShape|null,
 *   calculationFormula?: string|null,
 *   definitionSource?: null|PropertyDefinitionSource|PropertyDefinitionSourceShape,
 *   extensionData?: null|ExtensionData|ExtensionDataShape,
 *   externalOptionsMetaData?: null|ExternalOptionsMetaData|ExternalOptionsMetaDataShape,
 *   fulcrumPortalID?: int|null,
 *   fulcrumTimestamp?: int|null,
 *   janusGroup?: string|null,
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
    public Property $property;

    /** @var CalculationExpressionVariants|null $calculationExpression */
    #[Optional]
    public ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|TimeBetweenSkipWeekends|PeriodToMonths|PeriodToWeeks|And_|Or_|Xor_|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|FormatPhoneNumber|FormatSearchablePhoneNumber|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime|null $calculationExpression;

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
     * @param Property|PropertyShape $property
     * @param CalculationExpressionShape|null $calculationExpression
     * @param PropertyDefinitionSource|PropertyDefinitionSourceShape|null $definitionSource
     * @param ExtensionData|ExtensionDataShape|null $extensionData
     * @param ExternalOptionsMetaData|ExternalOptionsMetaDataShape|null $externalOptionsMetaData
     * @param FieldLevelPermission|FieldLevelPermissionShape|null $permission
     * @param DefinitionSource|DefinitionSourceShape|null $propertyDefinitionSource
     * @param DefaultRequirements|DefaultRequirementsShape|null $propertyRequirements
     * @param RollupExpression|RollupExpressionShape|null $rollupExpression
     */
    public static function with(
        string $objectTypeID,
        Property|array $property,
        ConstantBoolean|array|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|TimeBetweenSkipWeekends|PeriodToMonths|PeriodToWeeks|And_|Or_|Xor_|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|FormatPhoneNumber|FormatSearchablePhoneNumber|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime|null $calculationExpression = null,
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
     * A HubSpot property.
     *
     * @param Property|PropertyShape $property
     */
    public function withProperty(Property|array $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    /**
     * @param CalculationExpressionShape $calculationExpression
     */
    public function withCalculationExpression(
        ConstantBoolean|array|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|TimeBetweenSkipWeekends|PeriodToMonths|PeriodToWeeks|And_|Or_|Xor_|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|FormatPhoneNumber|FormatSearchablePhoneNumber|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $calculationExpression,
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
