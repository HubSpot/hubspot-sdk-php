<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\StringLength;

use HubSpotSDK\Cms\MediaBridge\AbsoluteValue;
use HubSpotSDK\Cms\MediaBridge\AddNumbers;
use HubSpotSDK\Cms\MediaBridge\AddTime;
use HubSpotSDK\Cms\MediaBridge\And_;
use HubSpotSDK\Cms\MediaBridge\BeginsWith;
use HubSpotSDK\Cms\MediaBridge\BooleanPropertyVariable;
use HubSpotSDK\Cms\MediaBridge\BooleanTargetPropertyVariable;
use HubSpotSDK\Cms\MediaBridge\ConcatStrings;
use HubSpotSDK\Cms\MediaBridge\ConstantBoolean;
use HubSpotSDK\Cms\MediaBridge\ConstantNumber;
use HubSpotSDK\Cms\MediaBridge\ConstantString;
use HubSpotSDK\Cms\MediaBridge\Contains;
use HubSpotSDK\Cms\MediaBridge\Date;
use HubSpotSDK\Cms\MediaBridge\DatedExchangeRate;
use HubSpotSDK\Cms\MediaBridge\DivideNumbers;
use HubSpotSDK\Cms\MediaBridge\Euler;
use HubSpotSDK\Cms\MediaBridge\ExtractMostRecentEmailReplyHTML;
use HubSpotSDK\Cms\MediaBridge\ExtractMostRecentEmailReplyText;
use HubSpotSDK\Cms\MediaBridge\ExtractMostRecentPlainTextEmailReply;
use HubSpotSDK\Cms\MediaBridge\FetchCurrencyDecimalPlaces;
use HubSpotSDK\Cms\MediaBridge\FetchExchangeRate;
use HubSpotSDK\Cms\MediaBridge\FetchSingleCurrencyPortalCurrency;
use HubSpotSDK\Cms\MediaBridge\FormatFullName;
use HubSpotSDK\Cms\MediaBridge\FormatPhoneNumber;
use HubSpotSDK\Cms\MediaBridge\FormatSearchablePhoneNumber;
use HubSpotSDK\Cms\MediaBridge\HasEmailReply;
use HubSpotSDK\Cms\MediaBridge\HasPlainTextEmailReply;
use HubSpotSDK\Cms\MediaBridge\IfBoolean;
use HubSpotSDK\Cms\MediaBridge\IfNumber;
use HubSpotSDK\Cms\MediaBridge\IfString;
use HubSpotSDK\Cms\MediaBridge\IsEngagementType;
use HubSpotSDK\Cms\MediaBridge\IsPipelineStageClosed;
use HubSpotSDK\Cms\MediaBridge\IsPresent;
use HubSpotSDK\Cms\MediaBridge\LessThan;
use HubSpotSDK\Cms\MediaBridge\LessThanOrEqual;
use HubSpotSDK\Cms\MediaBridge\LowerCase;
use HubSpotSDK\Cms\MediaBridge\MaxNumbers;
use HubSpotSDK\Cms\MediaBridge\MinNumbers;
use HubSpotSDK\Cms\MediaBridge\Month;
use HubSpotSDK\Cms\MediaBridge\MoreThan;
use HubSpotSDK\Cms\MediaBridge\MoreThanOrEqual;
use HubSpotSDK\Cms\MediaBridge\MultiplyNumbers;
use HubSpotSDK\Cms\MediaBridge\Not;
use HubSpotSDK\Cms\MediaBridge\Now;
use HubSpotSDK\Cms\MediaBridge\NumberEquals;
use HubSpotSDK\Cms\MediaBridge\NumberPropertyVariable;
use HubSpotSDK\Cms\MediaBridge\NumberTargetPropertyVariable;
use HubSpotSDK\Cms\MediaBridge\NumberToString;
use HubSpotSDK\Cms\MediaBridge\Or_;
use HubSpotSDK\Cms\MediaBridge\ParseNumber;
use HubSpotSDK\Cms\MediaBridge\PeriodToMonths;
use HubSpotSDK\Cms\MediaBridge\PeriodToWeeks;
use HubSpotSDK\Cms\MediaBridge\PipelineProbability;
use HubSpotSDK\Cms\MediaBridge\Power;
use HubSpotSDK\Cms\MediaBridge\RoundDownNumbers;
use HubSpotSDK\Cms\MediaBridge\RoundNearestNumbers;
use HubSpotSDK\Cms\MediaBridge\RoundUpNumbers;
use HubSpotSDK\Cms\MediaBridge\SetContainsString;
use HubSpotSDK\Cms\MediaBridge\SquareRoot;
use HubSpotSDK\Cms\MediaBridge\StringEquals;
use HubSpotSDK\Cms\MediaBridge\StringLength;
use HubSpotSDK\Cms\MediaBridge\StringPropertyVariable;
use HubSpotSDK\Cms\MediaBridge\StringTargetPropertyVariable;
use HubSpotSDK\Cms\MediaBridge\Substring;
use HubSpotSDK\Cms\MediaBridge\SubtractNumbers;
use HubSpotSDK\Cms\MediaBridge\SubtractTime;
use HubSpotSDK\Cms\MediaBridge\TimeBetween;
use HubSpotSDK\Cms\MediaBridge\TimeBetweenSkipWeekends;
use HubSpotSDK\Cms\MediaBridge\TimestampOfPropertyVariable;
use HubSpotSDK\Cms\MediaBridge\TimestampOfTargetPropertyVariable;
use HubSpotSDK\Cms\MediaBridge\UpperCase;
use HubSpotSDK\Cms\MediaBridge\Xor_;
use HubSpotSDK\Cms\MediaBridge\Year;
use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type ConstantBooleanShape from \HubSpotSDK\Cms\MediaBridge\ConstantBoolean
 * @phpstan-import-type ConstantNumberShape from \HubSpotSDK\Cms\MediaBridge\ConstantNumber
 * @phpstan-import-type ConstantStringShape from \HubSpotSDK\Cms\MediaBridge\ConstantString
 * @phpstan-import-type BooleanPropertyVariableShape from \HubSpotSDK\Cms\MediaBridge\BooleanPropertyVariable
 * @phpstan-import-type StringPropertyVariableShape from \HubSpotSDK\Cms\MediaBridge\StringPropertyVariable
 * @phpstan-import-type NumberPropertyVariableShape from \HubSpotSDK\Cms\MediaBridge\NumberPropertyVariable
 * @phpstan-import-type TimestampOfPropertyVariableShape from \HubSpotSDK\Cms\MediaBridge\TimestampOfPropertyVariable
 * @phpstan-import-type BooleanTargetPropertyVariableShape from \HubSpotSDK\Cms\MediaBridge\BooleanTargetPropertyVariable
 * @phpstan-import-type StringTargetPropertyVariableShape from \HubSpotSDK\Cms\MediaBridge\StringTargetPropertyVariable
 * @phpstan-import-type NumberTargetPropertyVariableShape from \HubSpotSDK\Cms\MediaBridge\NumberTargetPropertyVariable
 * @phpstan-import-type TimestampOfTargetPropertyVariableShape from \HubSpotSDK\Cms\MediaBridge\TimestampOfTargetPropertyVariable
 * @phpstan-import-type AddNumbersShape from \HubSpotSDK\Cms\MediaBridge\AddNumbers
 * @phpstan-import-type SubtractNumbersShape from \HubSpotSDK\Cms\MediaBridge\SubtractNumbers
 * @phpstan-import-type MultiplyNumbersShape from \HubSpotSDK\Cms\MediaBridge\MultiplyNumbers
 * @phpstan-import-type DivideNumbersShape from \HubSpotSDK\Cms\MediaBridge\DivideNumbers
 * @phpstan-import-type RoundDownNumbersShape from \HubSpotSDK\Cms\MediaBridge\RoundDownNumbers
 * @phpstan-import-type RoundUpNumbersShape from \HubSpotSDK\Cms\MediaBridge\RoundUpNumbers
 * @phpstan-import-type RoundNearestNumbersShape from \HubSpotSDK\Cms\MediaBridge\RoundNearestNumbers
 * @phpstan-import-type UpperCaseShape from \HubSpotSDK\Cms\MediaBridge\UpperCase
 * @phpstan-import-type LowerCaseShape from \HubSpotSDK\Cms\MediaBridge\LowerCase
 * @phpstan-import-type ConcatStringsShape from \HubSpotSDK\Cms\MediaBridge\ConcatStrings
 * @phpstan-import-type ContainsShape from \HubSpotSDK\Cms\MediaBridge\Contains
 * @phpstan-import-type BeginsWithShape from \HubSpotSDK\Cms\MediaBridge\BeginsWith
 * @phpstan-import-type NumberToStringShape from \HubSpotSDK\Cms\MediaBridge\NumberToString
 * @phpstan-import-type ParseNumberShape from \HubSpotSDK\Cms\MediaBridge\ParseNumber
 * @phpstan-import-type FetchExchangeRateShape from \HubSpotSDK\Cms\MediaBridge\FetchExchangeRate
 * @phpstan-import-type FetchCurrencyDecimalPlacesShape from \HubSpotSDK\Cms\MediaBridge\FetchCurrencyDecimalPlaces
 * @phpstan-import-type FetchSingleCurrencyPortalCurrencyShape from \HubSpotSDK\Cms\MediaBridge\FetchSingleCurrencyPortalCurrency
 * @phpstan-import-type DatedExchangeRateShape from \HubSpotSDK\Cms\MediaBridge\DatedExchangeRate
 * @phpstan-import-type PipelineProbabilityShape from \HubSpotSDK\Cms\MediaBridge\PipelineProbability
 * @phpstan-import-type MaxNumbersShape from \HubSpotSDK\Cms\MediaBridge\MaxNumbers
 * @phpstan-import-type MinNumbersShape from \HubSpotSDK\Cms\MediaBridge\MinNumbers
 * @phpstan-import-type LessThanShape from \HubSpotSDK\Cms\MediaBridge\LessThan
 * @phpstan-import-type LessThanOrEqualShape from \HubSpotSDK\Cms\MediaBridge\LessThanOrEqual
 * @phpstan-import-type MoreThanShape from \HubSpotSDK\Cms\MediaBridge\MoreThan
 * @phpstan-import-type MoreThanOrEqualShape from \HubSpotSDK\Cms\MediaBridge\MoreThanOrEqual
 * @phpstan-import-type NumberEqualsShape from \HubSpotSDK\Cms\MediaBridge\NumberEquals
 * @phpstan-import-type StringEqualsShape from \HubSpotSDK\Cms\MediaBridge\StringEquals
 * @phpstan-import-type IsPipelineStageClosedShape from \HubSpotSDK\Cms\MediaBridge\IsPipelineStageClosed
 * @phpstan-import-type NotShape from \HubSpotSDK\Cms\MediaBridge\Not
 * @phpstan-import-type DateShape from \HubSpotSDK\Cms\MediaBridge\Date
 * @phpstan-import-type MonthShape from \HubSpotSDK\Cms\MediaBridge\Month
 * @phpstan-import-type YearShape from \HubSpotSDK\Cms\MediaBridge\Year
 * @phpstan-import-type NowShape from \HubSpotSDK\Cms\MediaBridge\Now
 * @phpstan-import-type TimeBetweenShape from \HubSpotSDK\Cms\MediaBridge\TimeBetween
 * @phpstan-import-type TimeBetweenSkipWeekendsShape from \HubSpotSDK\Cms\MediaBridge\TimeBetweenSkipWeekends
 * @phpstan-import-type PeriodToMonthsShape from \HubSpotSDK\Cms\MediaBridge\PeriodToMonths
 * @phpstan-import-type PeriodToWeeksShape from \HubSpotSDK\Cms\MediaBridge\PeriodToWeeks
 * @phpstan-import-type AndShape from \HubSpotSDK\Cms\MediaBridge\And_
 * @phpstan-import-type OrShape from \HubSpotSDK\Cms\MediaBridge\Or_
 * @phpstan-import-type XorShape from \HubSpotSDK\Cms\MediaBridge\Xor_
 * @phpstan-import-type IfStringShape from \HubSpotSDK\Cms\MediaBridge\IfString
 * @phpstan-import-type IfNumberShape from \HubSpotSDK\Cms\MediaBridge\IfNumber
 * @phpstan-import-type IfBooleanShape from \HubSpotSDK\Cms\MediaBridge\IfBoolean
 * @phpstan-import-type IsPresentShape from \HubSpotSDK\Cms\MediaBridge\IsPresent
 * @phpstan-import-type HasEmailReplyShape from \HubSpotSDK\Cms\MediaBridge\HasEmailReply
 * @phpstan-import-type HasPlainTextEmailReplyShape from \HubSpotSDK\Cms\MediaBridge\HasPlainTextEmailReply
 * @phpstan-import-type ExtractMostRecentEmailReplyHTMLShape from \HubSpotSDK\Cms\MediaBridge\ExtractMostRecentEmailReplyHTML
 * @phpstan-import-type ExtractMostRecentEmailReplyTextShape from \HubSpotSDK\Cms\MediaBridge\ExtractMostRecentEmailReplyText
 * @phpstan-import-type ExtractMostRecentPlainTextEmailReplyShape from \HubSpotSDK\Cms\MediaBridge\ExtractMostRecentPlainTextEmailReply
 * @phpstan-import-type SetContainsStringShape from \HubSpotSDK\Cms\MediaBridge\SetContainsString
 * @phpstan-import-type IsEngagementTypeShape from \HubSpotSDK\Cms\MediaBridge\IsEngagementType
 * @phpstan-import-type FormatFullNameShape from \HubSpotSDK\Cms\MediaBridge\FormatFullName
 * @phpstan-import-type FormatPhoneNumberShape from \HubSpotSDK\Cms\MediaBridge\FormatPhoneNumber
 * @phpstan-import-type FormatSearchablePhoneNumberShape from \HubSpotSDK\Cms\MediaBridge\FormatSearchablePhoneNumber
 * @phpstan-import-type AbsoluteValueShape from \HubSpotSDK\Cms\MediaBridge\AbsoluteValue
 * @phpstan-import-type SquareRootShape from \HubSpotSDK\Cms\MediaBridge\SquareRoot
 * @phpstan-import-type PowerShape from \HubSpotSDK\Cms\MediaBridge\Power
 * @phpstan-import-type SubstringShape from \HubSpotSDK\Cms\MediaBridge\Substring
 * @phpstan-import-type EulerShape from \HubSpotSDK\Cms\MediaBridge\Euler
 * @phpstan-import-type StringLengthShape from \HubSpotSDK\Cms\MediaBridge\StringLength
 * @phpstan-import-type AddTimeShape from \HubSpotSDK\Cms\MediaBridge\AddTime
 * @phpstan-import-type SubtractTimeShape from \HubSpotSDK\Cms\MediaBridge\SubtractTime
 *
 * @phpstan-type InputVariants = mixed|ConstantBoolean|ConstantNumber|ConstantString|BooleanPropertyVariable|StringPropertyVariable|NumberPropertyVariable|TimestampOfPropertyVariable|BooleanTargetPropertyVariable|StringTargetPropertyVariable|NumberTargetPropertyVariable|TimestampOfTargetPropertyVariable|FetchSingleCurrencyPortalCurrency|Now|IsEngagementType|Euler
 * @phpstan-type InputShape = InputVariants|ConstantBooleanShape|ConstantNumberShape|ConstantStringShape|BooleanPropertyVariableShape|StringPropertyVariableShape|NumberPropertyVariableShape|TimestampOfPropertyVariableShape|BooleanTargetPropertyVariableShape|StringTargetPropertyVariableShape|NumberTargetPropertyVariableShape|TimestampOfTargetPropertyVariableShape|AddNumbersShape|SubtractNumbersShape|MultiplyNumbersShape|DivideNumbersShape|RoundDownNumbersShape|RoundUpNumbersShape|RoundNearestNumbersShape|UpperCaseShape|LowerCaseShape|ConcatStringsShape|ContainsShape|BeginsWithShape|NumberToStringShape|ParseNumberShape|FetchExchangeRateShape|FetchCurrencyDecimalPlacesShape|FetchSingleCurrencyPortalCurrencyShape|DatedExchangeRateShape|PipelineProbabilityShape|MaxNumbersShape|MinNumbersShape|LessThanShape|LessThanOrEqualShape|MoreThanShape|MoreThanOrEqualShape|NumberEqualsShape|StringEqualsShape|IsPipelineStageClosedShape|NotShape|DateShape|MonthShape|YearShape|NowShape|TimeBetweenShape|TimeBetweenSkipWeekendsShape|PeriodToMonthsShape|PeriodToWeeksShape|AndShape|OrShape|XorShape|IfStringShape|IfNumberShape|IfBooleanShape|IsPresentShape|HasEmailReplyShape|HasPlainTextEmailReplyShape|ExtractMostRecentEmailReplyHTMLShape|ExtractMostRecentEmailReplyTextShape|ExtractMostRecentPlainTextEmailReplyShape|SetContainsStringShape|IsEngagementTypeShape|FormatFullNameShape|FormatPhoneNumberShape|FormatSearchablePhoneNumberShape|AbsoluteValueShape|SquareRootShape|PowerShape|SubstringShape|EulerShape|StringLengthShape|AddTimeShape|SubtractTimeShape
 */
final class Input implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            ConstantBoolean::class,
            ConstantNumber::class,
            ConstantString::class,
            BooleanPropertyVariable::class,
            StringPropertyVariable::class,
            NumberPropertyVariable::class,
            TimestampOfPropertyVariable::class,
            BooleanTargetPropertyVariable::class,
            StringTargetPropertyVariable::class,
            NumberTargetPropertyVariable::class,
            TimestampOfTargetPropertyVariable::class,
            AddNumbers::class,
            SubtractNumbers::class,
            MultiplyNumbers::class,
            DivideNumbers::class,
            RoundDownNumbers::class,
            RoundUpNumbers::class,
            RoundNearestNumbers::class,
            UpperCase::class,
            LowerCase::class,
            ConcatStrings::class,
            Contains::class,
            BeginsWith::class,
            NumberToString::class,
            ParseNumber::class,
            FetchExchangeRate::class,
            FetchCurrencyDecimalPlaces::class,
            FetchSingleCurrencyPortalCurrency::class,
            DatedExchangeRate::class,
            PipelineProbability::class,
            MaxNumbers::class,
            MinNumbers::class,
            LessThan::class,
            LessThanOrEqual::class,
            MoreThan::class,
            MoreThanOrEqual::class,
            NumberEquals::class,
            StringEquals::class,
            IsPipelineStageClosed::class,
            Not::class,
            Date::class,
            Month::class,
            Year::class,
            Now::class,
            TimeBetween::class,
            TimeBetweenSkipWeekends::class,
            PeriodToMonths::class,
            PeriodToWeeks::class,
            And_::class,
            Or_::class,
            Xor_::class,
            IfString::class,
            IfNumber::class,
            IfBoolean::class,
            IsPresent::class,
            HasEmailReply::class,
            HasPlainTextEmailReply::class,
            ExtractMostRecentEmailReplyHTML::class,
            ExtractMostRecentEmailReplyText::class,
            ExtractMostRecentPlainTextEmailReply::class,
            SetContainsString::class,
            IsEngagementType::class,
            FormatFullName::class,
            FormatPhoneNumber::class,
            FormatSearchablePhoneNumber::class,
            AbsoluteValue::class,
            SquareRoot::class,
            Power::class,
            Substring::class,
            Euler::class,
            StringLength::class,
            AddTime::class,
            SubtractTime::class,
        ];
    }
}
