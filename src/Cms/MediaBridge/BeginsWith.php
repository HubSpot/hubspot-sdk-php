<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\BeginsWith\Input;
use HubSpotSDK\Cms\MediaBridge\BeginsWith\Operator;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type StringToCheckVariants from \HubSpotSDK\Cms\MediaBridge\BeginsWith\StringToCheck
 * @phpstan-import-type StringToCheckShape from \HubSpotSDK\Cms\MediaBridge\BeginsWith\StringToCheck
 *
 * @phpstan-type BeginsWithShape = array{
 *   operator: Operator|value-of<Operator>,
 *   stringToCheck: StringToCheckShape,
 *   inputs?: list<mixed>|null,
 *   propertyName?: string|null,
 *   value?: bool|null,
 * }
 */
final class BeginsWith implements BaseModel
{
    /** @use SdkModel<BeginsWithShape> */
    use SdkModel;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    /** @var StringToCheckVariants $stringToCheck */
    #[Required]
    public ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|TimeBetweenSkipWeekends|PeriodToMonths|PeriodToWeeks|And_|Or_|Xor_|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|FormatPhoneNumber|FormatSearchablePhoneNumber|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|IsBlank|AddTime|SubtractTime $stringToCheck;

    /** @var list<mixed>|null $inputs */
    #[Optional(list: Input::class)]
    public ?array $inputs;

    #[Optional]
    public ?string $propertyName;

    #[Optional]
    public ?bool $value;

    /**
     * `new BeginsWith()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BeginsWith::with(operator: ..., stringToCheck: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BeginsWith)->withOperator(...)->withStringToCheck(...)
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
     * @param StringToCheckShape $stringToCheck
     * @param Operator|value-of<Operator> $operator
     * @param list<mixed>|null $inputs
     */
    public static function with(
        ConstantBoolean|array|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|TimeBetweenSkipWeekends|PeriodToMonths|PeriodToWeeks|And_|Or_|Xor_|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|FormatPhoneNumber|FormatSearchablePhoneNumber|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|IsBlank|AddTime|SubtractTime $stringToCheck,
        Operator|string $operator = 'BEGINS_WITH',
        ?array $inputs = null,
        ?string $propertyName = null,
        ?bool $value = null,
    ): self {
        $self = new self;

        $self['operator'] = $operator;
        $self['stringToCheck'] = $stringToCheck;

        null !== $inputs && $self['inputs'] = $inputs;
        null !== $propertyName && $self['propertyName'] = $propertyName;
        null !== $value && $self['value'] = $value;

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

    /**
     * @param StringToCheckShape $stringToCheck
     */
    public function withStringToCheck(
        ConstantBoolean|array|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|AddNumbers|SubtractNumbers|MultiplyNumbers|DivideNumbers|RoundDownNumbers|RoundUpNumbers|RoundNearestNumbers|UpperCase|LowerCase|ConcatStrings|Contains|BeginsWith|NumberToString|ParseNumber|FetchExchangeRate|FetchCurrencyDecimalPlaces|FetchSingleCurrencyPortalCurrency|DatedExchangeRate|PipelineProbability|MaxNumbers|MinNumbers|LessThan|LessThanOrEqual|MoreThan|MoreThanOrEqual|NumberEquals|StringEquals|IsPipelineStageClosed|Not|Date|Month|Year|Now|TimeBetween|TimeBetweenSkipWeekends|PeriodToMonths|PeriodToWeeks|And_|Or_|Xor_|IfString|IfNumber|IfBoolean|IsPresent|HasEmailReply|HasPlainTextEmailReply|ExtractMostRecentEmailReplyHTML|ExtractMostRecentEmailReplyText|ExtractMostRecentPlainTextEmailReply|SetContainsString|IsEngagementType|FormatFullName|FormatPhoneNumber|FormatSearchablePhoneNumber|AbsoluteValue|SquareRoot|Power|Substring|Euler|StringLength|IsBlank|AddTime|SubtractTime $stringToCheck,
    ): self {
        $self = clone $this;
        $self['stringToCheck'] = $stringToCheck;

        return $self;
    }

    /**
     * @param list<mixed> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

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
