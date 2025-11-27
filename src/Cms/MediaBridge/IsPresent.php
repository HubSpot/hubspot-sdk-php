<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\IsPresent\Input;
use HubspotSDK\Cms\MediaBridge\IsPresent\Operator;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IsPresentShape = array{
 *   expressionToEvaluate: ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And1|Or1|Xor1|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime,
 *   operator: value-of<Operator>,
 *   inputs?: list<mixed>|null,
 *   propertyName?: string|null,
 *   value?: bool|null,
 * }
 */
final class IsPresent implements BaseModel
{
    /** @use SdkModel<IsPresentShape> */
    use SdkModel;

    #[Api]
    public ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And1|Or1|Xor1|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $expressionToEvaluate;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    /** @var list<mixed>|null $inputs */
    #[Api(list: Input::class, optional: true)]
    public ?array $inputs;

    #[Api(optional: true)]
    public ?string $propertyName;

    #[Api(optional: true)]
    public ?bool $value;

    /**
     * `new IsPresent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IsPresent::with(expressionToEvaluate: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IsPresent)->withExpressionToEvaluate(...)->withOperator(...)
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
     * @param Operator|value-of<Operator> $operator
     * @param list<mixed> $inputs
     */
    public static function with(
        ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And1|Or1|Xor1|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $expressionToEvaluate,
        Operator|string $operator = 'IS_PRESENT',
        ?array $inputs = null,
        ?string $propertyName = null,
        ?bool $value = null,
    ): self {
        $obj = new self;

        $obj->expressionToEvaluate = $expressionToEvaluate;
        $obj['operator'] = $operator;

        null !== $inputs && $obj->inputs = $inputs;
        null !== $propertyName && $obj->propertyName = $propertyName;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    public function withExpressionToEvaluate(
        ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|PeriodToMonths|PeriodToWeeks|And1|Or1|Xor1|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|AddTime|SubtractTime $expressionToEvaluate,
    ): self {
        $obj = clone $this;
        $obj->expressionToEvaluate = $expressionToEvaluate;

        return $obj;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

        return $obj;
    }

    /**
     * @param list<mixed> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }

    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj->propertyName = $propertyName;

        return $obj;
    }

    public function withValue(bool $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
