<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Property;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
  * @phpstan-type PropertyDefinitionShape = array{
  *   objectTypeID: string,
  *   property: Property,
  *   calculationExpression?: ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime,
  *   calculationFormula?: string,
  *   definitionSource?: PropertyDefinitionSource,
  *   extensionData?: ExtensionData,
  *   externalOptionsMetaData?: ExternalOptionsMetaData,
  *   fulcrumPortalID?: int,
  *   fulcrumTimestamp?: int,
  *   janusGroup?: string,
  *   permission?: FieldLevelPermission,
  *   propertyDefinitionSource?: DefinitionSource,
  *   propertyRequirements?: DefaultRequirements,
  *   rollupExpression?: RollupExpression,
  * }
  * 
 */
final class PropertyDefinition implements BaseModel
{
  /** @use SdkModel<PropertyDefinitionShape> */
  use SdkModel;

  /** @var string $objectTypeID */
  #[Api("objectTypeId")]
  public string $objectTypeID;

  /**
  * Defines a property
  * 
  * @var Property $property
 */
  #[Api]
  public Property $property;

  /**
  * @var null|ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $calculationExpression
 */
  #[Api(optional: true)]
  public null|ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $calculationExpression;

  /** @var string|null $calculationFormula */
  #[Api(optional: true)]
  public ?string $calculationFormula;

  /** @var PropertyDefinitionSource|null $definitionSource */
  #[Api(optional: true)]
  public ?PropertyDefinitionSource $definitionSource;

  /** @var ExtensionData|null $extensionData */
  #[Api(optional: true)]
  public ?ExtensionData $extensionData;

  /** @var ExternalOptionsMetaData|null $externalOptionsMetaData */
  #[Api(optional: true)]
  public ?ExternalOptionsMetaData $externalOptionsMetaData;

  /** @var int|null $fulcrumPortalID */
  #[Api("fulcrumPortalId", optional: true)]
  public ?int $fulcrumPortalID;

  /** @var int|null $fulcrumTimestamp */
  #[Api(optional: true)]
  public ?int $fulcrumTimestamp;

  /** @var string|null $janusGroup */
  #[Api(optional: true)]
  public ?string $janusGroup;

  /** @var FieldLevelPermission|null $permission */
  #[Api(optional: true)]
  public ?FieldLevelPermission $permission;

  /** @var DefinitionSource|null $propertyDefinitionSource */
  #[Api(optional: true)]
  public ?DefinitionSource $propertyDefinitionSource;

  /** @var DefaultRequirements|null $propertyRequirements */
  #[Api(optional: true)]
  public ?DefaultRequirements $propertyRequirements;

  /** @var RollupExpression|null $rollupExpression */
  #[Api(optional: true)]
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
  public function __construct(){$this->initialize();}

  /**
  * Construct an instance from the required parameters.
  * 
  * You must use named parameters to construct any parameters with a default value.
  * 
  * @param string $objectTypeID
  * @param Property $property
  * @param ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $calculationExpression
  * @param string $calculationFormula
  * @param PropertyDefinitionSource $definitionSource
  * @param ExtensionData $extensionData
  * @param ExternalOptionsMetaData $externalOptionsMetaData
  * @param int $fulcrumPortalID
  * @param int $fulcrumTimestamp
  * @param string $janusGroup
  * @param FieldLevelPermission $permission
  * @param DefinitionSource $propertyDefinitionSource
  * @param DefaultRequirements $propertyRequirements
  * @param RollupExpression $rollupExpression
  * 
  * @return self
 */
  public static function with(
    string $objectTypeID,
    Property $property,
    ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $calculationExpression = null,
    string $calculationFormula = null,
    PropertyDefinitionSource $definitionSource = null,
    ExtensionData $extensionData = null,
    ExternalOptionsMetaData $externalOptionsMetaData = null,
    int $fulcrumPortalID = null,
    int $fulcrumTimestamp = null,
    string $janusGroup = null,
    FieldLevelPermission $permission = null,
    DefinitionSource $propertyDefinitionSource = null,
    DefaultRequirements $propertyRequirements = null,
    RollupExpression $rollupExpression = null,
  ): self {
    $obj = new self;

    $obj->objectTypeID = $objectTypeID;
    $obj->property = $property;

    null !== $calculationExpression && $obj->calculationExpression = $calculationExpression;
    null !== $calculationFormula && $obj->calculationFormula = $calculationFormula;
    null !== $definitionSource && $obj->definitionSource = $definitionSource;
    null !== $extensionData && $obj->extensionData = $extensionData;
    null !== $externalOptionsMetaData && $obj->externalOptionsMetaData = $externalOptionsMetaData;
    null !== $fulcrumPortalID && $obj->fulcrumPortalID = $fulcrumPortalID;
    null !== $fulcrumTimestamp && $obj->fulcrumTimestamp = $fulcrumTimestamp;
    null !== $janusGroup && $obj->janusGroup = $janusGroup;
    null !== $permission && $obj->permission = $permission;
    null !== $propertyDefinitionSource && $obj->propertyDefinitionSource = $propertyDefinitionSource;
    null !== $propertyRequirements && $obj->propertyRequirements = $propertyRequirements;
    null !== $rollupExpression && $obj->rollupExpression = $rollupExpression;

    return $obj;
  }

  /**
  * @param string $objectTypeID
  * 
  * @return self
 */
  public function withObjectTypeID(string $objectTypeID): self {
    $obj = clone $this;
    $obj->objectTypeID = $objectTypeID;
    return $obj;
  }

  /**
  * Defines a property
  * 
  * @param Property $property
  * 
  * @return self
 */
  public function withProperty(Property $property): self {
    $obj = clone $this;
    $obj->property = $property;
    return $obj;
  }

  /**
  * @param ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $calculationExpression
  * 
  * @return self
 */
  public function withCalculationExpression(
    ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $calculationExpression,
  ): self {
    $obj = clone $this;
    $obj->calculationExpression = $calculationExpression;
    return $obj;
  }

  /**
  * @param string $calculationFormula
  * 
  * @return self
 */
  public function withCalculationFormula(string $calculationFormula): self {
    $obj = clone $this;
    $obj->calculationFormula = $calculationFormula;
    return $obj;
  }

  /**
  * @param PropertyDefinitionSource $definitionSource
  * 
  * @return self
 */
  public function withDefinitionSource(
    PropertyDefinitionSource $definitionSource
  ): self {
    $obj = clone $this;
    $obj->definitionSource = $definitionSource;
    return $obj;
  }

  /**
  * @param ExtensionData $extensionData
  * 
  * @return self
 */
  public function withExtensionData(ExtensionData $extensionData): self {
    $obj = clone $this;
    $obj->extensionData = $extensionData;
    return $obj;
  }

  /**
  * @param ExternalOptionsMetaData $externalOptionsMetaData
  * 
  * @return self
 */
  public function withExternalOptionsMetaData(
    ExternalOptionsMetaData $externalOptionsMetaData
  ): self {
    $obj = clone $this;
    $obj->externalOptionsMetaData = $externalOptionsMetaData;
    return $obj;
  }

  /**
  * @param int $fulcrumPortalID
  * 
  * @return self
 */
  public function withFulcrumPortalID(int $fulcrumPortalID): self {
    $obj = clone $this;
    $obj->fulcrumPortalID = $fulcrumPortalID;
    return $obj;
  }

  /**
  * @param int $fulcrumTimestamp
  * 
  * @return self
 */
  public function withFulcrumTimestamp(int $fulcrumTimestamp): self {
    $obj = clone $this;
    $obj->fulcrumTimestamp = $fulcrumTimestamp;
    return $obj;
  }

  /**
  * @param string $janusGroup
  * 
  * @return self
 */
  public function withJanusGroup(string $janusGroup): self {
    $obj = clone $this;
    $obj->janusGroup = $janusGroup;
    return $obj;
  }

  /**
  * @param FieldLevelPermission $permission
  * 
  * @return self
 */
  public function withPermission(FieldLevelPermission $permission): self {
    $obj = clone $this;
    $obj->permission = $permission;
    return $obj;
  }

  /**
  * @param DefinitionSource $propertyDefinitionSource
  * 
  * @return self
 */
  public function withPropertyDefinitionSource(
    DefinitionSource $propertyDefinitionSource
  ): self {
    $obj = clone $this;
    $obj->propertyDefinitionSource = $propertyDefinitionSource;
    return $obj;
  }

  /**
  * @param DefaultRequirements $propertyRequirements
  * 
  * @return self
 */
  public function withPropertyRequirements(
    DefaultRequirements $propertyRequirements
  ): self {
    $obj = clone $this;
    $obj->propertyRequirements = $propertyRequirements;
    return $obj;
  }

  /**
  * @param RollupExpression $rollupExpression
  * 
  * @return self
 */
  public function withRollupExpression(
    RollupExpression $rollupExpression
  ): self {
    $obj = clone $this;
    $obj->rollupExpression = $rollupExpression;
    return $obj;
  }
}