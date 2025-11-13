<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Property;

/**
 * @phpstan-type PropertyDefinitionShape = array{
 *   objectTypeId: string,
 *   property: Property,
 *   calculationExpression?: null|ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And1|Or1|Xor1|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime,
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
 * }
 */
final class PropertyDefinition implements BaseModel
{
    /** @use SdkModel<PropertyDefinitionShape> */
    use SdkModel;

    #[Api]
    public string $objectTypeId;

    /**
     * Defines a property.
     */
    #[Api]
    public Property $property;

    #[Api(optional: true)]
    public ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And1|Or1|Xor1|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime|null $calculationExpression;

    #[Api(optional: true)]
    public ?string $calculationFormula;

    #[Api(optional: true)]
    public ?PropertyDefinitionSource $definitionSource;

    #[Api(optional: true)]
    public ?ExtensionData $extensionData;

    #[Api(optional: true)]
    public ?ExternalOptionsMetaData $externalOptionsMetaData;

    #[Api(optional: true)]
    public ?int $fulcrumPortalId;

    #[Api(optional: true)]
    public ?int $fulcrumTimestamp;

    #[Api(optional: true)]
    public ?string $janusGroup;

    #[Api(optional: true)]
    public ?FieldLevelPermission $permission;

    #[Api(optional: true)]
    public ?DefinitionSource $propertyDefinitionSource;

    #[Api(optional: true)]
    public ?DefaultRequirements $propertyRequirements;

    #[Api(optional: true)]
    public ?RollupExpression $rollupExpression;

    /**
     * `new PropertyDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyDefinition::with(objectTypeId: ..., property: ...)
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
     */
    public static function with(
        string $objectTypeId,
        Property $property,
        ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And1|Or1|Xor1|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime|null $calculationExpression = null,
        ?string $calculationFormula = null,
        ?PropertyDefinitionSource $definitionSource = null,
        ?ExtensionData $extensionData = null,
        ?ExternalOptionsMetaData $externalOptionsMetaData = null,
        ?int $fulcrumPortalId = null,
        ?int $fulcrumTimestamp = null,
        ?string $janusGroup = null,
        ?FieldLevelPermission $permission = null,
        ?DefinitionSource $propertyDefinitionSource = null,
        ?DefaultRequirements $propertyRequirements = null,
        ?RollupExpression $rollupExpression = null,
    ): self {
        $obj = new self;

        $obj->objectTypeId = $objectTypeId;
        $obj->property = $property;

        null !== $calculationExpression && $obj->calculationExpression = $calculationExpression;
        null !== $calculationFormula && $obj->calculationFormula = $calculationFormula;
        null !== $definitionSource && $obj->definitionSource = $definitionSource;
        null !== $extensionData && $obj->extensionData = $extensionData;
        null !== $externalOptionsMetaData && $obj->externalOptionsMetaData = $externalOptionsMetaData;
        null !== $fulcrumPortalId && $obj->fulcrumPortalId = $fulcrumPortalId;
        null !== $fulcrumTimestamp && $obj->fulcrumTimestamp = $fulcrumTimestamp;
        null !== $janusGroup && $obj->janusGroup = $janusGroup;
        null !== $permission && $obj->permission = $permission;
        null !== $propertyDefinitionSource && $obj->propertyDefinitionSource = $propertyDefinitionSource;
        null !== $propertyRequirements && $obj->propertyRequirements = $propertyRequirements;
        null !== $rollupExpression && $obj->rollupExpression = $rollupExpression;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeId = $objectTypeID;

        return $obj;
    }

    /**
     * Defines a property.
     */
    public function withProperty(Property $property): self
    {
        $obj = clone $this;
        $obj->property = $property;

        return $obj;
    }

    public function withCalculationExpression(
        ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And1|Or1|Xor1|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $calculationExpression,
    ): self {
        $obj = clone $this;
        $obj->calculationExpression = $calculationExpression;

        return $obj;
    }

    public function withCalculationFormula(string $calculationFormula): self
    {
        $obj = clone $this;
        $obj->calculationFormula = $calculationFormula;

        return $obj;
    }

    public function withDefinitionSource(
        PropertyDefinitionSource $definitionSource
    ): self {
        $obj = clone $this;
        $obj->definitionSource = $definitionSource;

        return $obj;
    }

    public function withExtensionData(ExtensionData $extensionData): self
    {
        $obj = clone $this;
        $obj->extensionData = $extensionData;

        return $obj;
    }

    public function withExternalOptionsMetaData(
        ExternalOptionsMetaData $externalOptionsMetaData
    ): self {
        $obj = clone $this;
        $obj->externalOptionsMetaData = $externalOptionsMetaData;

        return $obj;
    }

    public function withFulcrumPortalID(int $fulcrumPortalID): self
    {
        $obj = clone $this;
        $obj->fulcrumPortalId = $fulcrumPortalID;

        return $obj;
    }

    public function withFulcrumTimestamp(int $fulcrumTimestamp): self
    {
        $obj = clone $this;
        $obj->fulcrumTimestamp = $fulcrumTimestamp;

        return $obj;
    }

    public function withJanusGroup(string $janusGroup): self
    {
        $obj = clone $this;
        $obj->janusGroup = $janusGroup;

        return $obj;
    }

    public function withPermission(FieldLevelPermission $permission): self
    {
        $obj = clone $this;
        $obj->permission = $permission;

        return $obj;
    }

    public function withPropertyDefinitionSource(
        DefinitionSource $propertyDefinitionSource
    ): self {
        $obj = clone $this;
        $obj->propertyDefinitionSource = $propertyDefinitionSource;

        return $obj;
    }

    public function withPropertyRequirements(
        DefaultRequirements $propertyRequirements
    ): self {
        $obj = clone $this;
        $obj->propertyRequirements = $propertyRequirements;

        return $obj;
    }

    public function withRollupExpression(
        RollupExpression $rollupExpression
    ): self {
        $obj = clone $this;
        $obj->rollupExpression = $rollupExpression;

        return $obj;
    }
}
