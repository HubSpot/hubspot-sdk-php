<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\IsPresent\Operator;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExpressionToEvaluateVariants from \HubSpotSDK\Cms\MediaBridge\IsPresent\ExpressionToEvaluate
 * @phpstan-import-type ExpressionToEvaluateShape from \HubSpotSDK\Cms\MediaBridge\IsPresent\ExpressionToEvaluate
 *
 * @phpstan-type IsPresentShape = array{
 *   expressionToEvaluate: ExpressionToEvaluateShape,
 *   operator: Operator|value-of<Operator>,
 *   propertyName?: string|null,
 *   value?: bool|null,
 * }
 */
final class IsPresent implements BaseModel
{
    /** @use SdkModel<IsPresentShape> */
    use SdkModel;

    /** @var ExpressionToEvaluateVariants $expressionToEvaluate */
    #[Required]
    public ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|TimeBetweenSkipWeekends|PeriodToMonths|PeriodToWeeks|And_|Or_|Xor_|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|FormatPhoneNumber|FormatSearchablePhoneNumber|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|IsBlank|AddTime|SubtractTime $expressionToEvaluate;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Optional]
    public ?string $propertyName;

    #[Optional]
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
     * @param ExpressionToEvaluateShape $expressionToEvaluate
     * @param Operator|value-of<Operator> $operator
     */
    public static function with(
        ConstantBoolean|array|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|TimeBetweenSkipWeekends|PeriodToMonths|PeriodToWeeks|And_|Or_|Xor_|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|FormatPhoneNumber|FormatSearchablePhoneNumber|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|IsBlank|AddTime|SubtractTime $expressionToEvaluate,
        Operator|string $operator = 'IS_PRESENT',
        ?string $propertyName = null,
        ?bool $value = null,
    ): self {
        $self = new self;

        $self['expressionToEvaluate'] = $expressionToEvaluate;
        $self['operator'] = $operator;

        null !== $propertyName && $self['propertyName'] = $propertyName;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * @param ExpressionToEvaluateShape $expressionToEvaluate
     */
    public function withExpressionToEvaluate(
        ConstantBoolean|array|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|TimeBetweenSkipWeekends|PeriodToMonths|PeriodToWeeks|And_|Or_|Xor_|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|FormatPhoneNumber|FormatSearchablePhoneNumber|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|IsBlank|AddTime|SubtractTime $expressionToEvaluate,
    ): self {
        $self = clone $this;
        $self['expressionToEvaluate'] = $expressionToEvaluate;

        return $self;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }

    public function withValue(bool $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
