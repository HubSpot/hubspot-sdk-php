<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
  * @phpstan-type RollupExpressionShape = array{
  *   associationTypes: list<AssociationSpec>,
  *   rollupOperator: string,
  *   sourceObjectTypeID: string,
  *   sourcePropertyName: string,
  *   conditionalExpression?: ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime,
  *   conditionalFormula?: string,
  *   emptyRollupValue?: string,
  *   sourceCompareByPropertyName?: string,
  * }
  * 
 */
final class RollupExpression implements BaseModel
{
  /** @use SdkModel<RollupExpressionShape> */
  use SdkModel;

  /** @var list<AssociationSpec> $associationTypes */
  #[Api(list: AssociationSpec::class)]
  public array $associationTypes;

  /** @var string $rollupOperator */
  #[Api]
  public string $rollupOperator;

  /** @var string $sourceObjectTypeID */
  #[Api("sourceObjectTypeId")]
  public string $sourceObjectTypeID;

  /** @var string $sourcePropertyName */
  #[Api]
  public string $sourcePropertyName;

  /**
  * @var null|ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $conditionalExpression
 */
  #[Api(optional: true)]
  public null|ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $conditionalExpression;

  /** @var string|null $conditionalFormula */
  #[Api(optional: true)]
  public ?string $conditionalFormula;

  /** @var string|null $emptyRollupValue */
  #[Api(optional: true)]
  public ?string $emptyRollupValue;

  /** @var string|null $sourceCompareByPropertyName */
  #[Api(optional: true)]
  public ?string $sourceCompareByPropertyName;

  /**
  * `new RollupExpression()` is missing required properties by the API.
  * 
  * To enforce required parameters use
  * ```
  * RollupExpression::with(
  *   associationTypes: ...,
  *   rollupOperator: ...,
  *   sourceObjectTypeID: ...,
  *   sourcePropertyName: ...,
  * )
  * ```
  * 
  * Otherwise ensure the following setters are called
  * 
  * ```
  * (new RollupExpression)
  *   ->withAssociationTypes(...)
  *   ->withRollupOperator(...)
  *   ->withSourceObjectTypeID(...)
  *   ->withSourcePropertyName(...)
  * ```
 */
  public function __construct(){$this->initialize();}

  /**
  * Construct an instance from the required parameters.
  * 
  * You must use named parameters to construct any parameters with a default value.
  * 
  * @param list<AssociationSpec> $associationTypes
  * @param string $rollupOperator
  * @param string $sourceObjectTypeID
  * @param string $sourcePropertyName
  * @param ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $conditionalExpression
  * @param string $conditionalFormula
  * @param string $emptyRollupValue
  * @param string $sourceCompareByPropertyName
  * 
  * @return self
 */
  public static function with(
    array $associationTypes,
    string $rollupOperator,
    string $sourceObjectTypeID,
    string $sourcePropertyName,
    ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $conditionalExpression = null,
    string $conditionalFormula = null,
    string $emptyRollupValue = null,
    string $sourceCompareByPropertyName = null,
  ): self {
    $obj = new self;

    $obj->associationTypes = $associationTypes;
    $obj->rollupOperator = $rollupOperator;
    $obj->sourceObjectTypeID = $sourceObjectTypeID;
    $obj->sourcePropertyName = $sourcePropertyName;

    null !== $conditionalExpression && $obj->conditionalExpression = $conditionalExpression;
    null !== $conditionalFormula && $obj->conditionalFormula = $conditionalFormula;
    null !== $emptyRollupValue && $obj->emptyRollupValue = $emptyRollupValue;
    null !== $sourceCompareByPropertyName && $obj->sourceCompareByPropertyName = $sourceCompareByPropertyName;

    return $obj;
  }

  /**
  * @param list<AssociationSpec> $associationTypes
  * 
  * @return self
 */
  public function withAssociationTypes(array $associationTypes): self {
    $obj = clone $this;
    $obj->associationTypes = $associationTypes;
    return $obj;
  }

  /**
  * @param string $rollupOperator
  * 
  * @return self
 */
  public function withRollupOperator(string $rollupOperator): self {
    $obj = clone $this;
    $obj->rollupOperator = $rollupOperator;
    return $obj;
  }

  /**
  * @param string $sourceObjectTypeID
  * 
  * @return self
 */
  public function withSourceObjectTypeID(string $sourceObjectTypeID): self {
    $obj = clone $this;
    $obj->sourceObjectTypeID = $sourceObjectTypeID;
    return $obj;
  }

  /**
  * @param string $sourcePropertyName
  * 
  * @return self
 */
  public function withSourcePropertyName(string $sourcePropertyName): self {
    $obj = clone $this;
    $obj->sourcePropertyName = $sourcePropertyName;
    return $obj;
  }

  /**
  * @param ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $conditionalExpression
  * 
  * @return self
 */
  public function withConditionalExpression(
    ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And|Or|Xor|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $conditionalExpression,
  ): self {
    $obj = clone $this;
    $obj->conditionalExpression = $conditionalExpression;
    return $obj;
  }

  /**
  * @param string $conditionalFormula
  * 
  * @return self
 */
  public function withConditionalFormula(string $conditionalFormula): self {
    $obj = clone $this;
    $obj->conditionalFormula = $conditionalFormula;
    return $obj;
  }

  /**
  * @param string $emptyRollupValue
  * 
  * @return self
 */
  public function withEmptyRollupValue(string $emptyRollupValue): self {
    $obj = clone $this;
    $obj->emptyRollupValue = $emptyRollupValue;
    return $obj;
  }

  /**
  * @param string $sourceCompareByPropertyName
  * 
  * @return self
 */
  public function withSourceCompareByPropertyName(
    string $sourceCompareByPropertyName
  ): self {
    $obj = clone $this;
    $obj->sourceCompareByPropertyName = $sourceCompareByPropertyName;
    return $obj;
  }
}