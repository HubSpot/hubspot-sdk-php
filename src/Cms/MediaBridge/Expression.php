<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type ConstantBooleanShape from \HubspotSDK\Cms\MediaBridge\ConstantBoolean
 * @phpstan-import-type ConstantNumberShape from \HubspotSDK\Cms\MediaBridge\ConstantNumber
 * @phpstan-import-type ConstantStringShape from \HubspotSDK\Cms\MediaBridge\ConstantString
 * @phpstan-import-type BooleanPropertyVariableShape from \HubspotSDK\Cms\MediaBridge\BooleanPropertyVariable
 * @phpstan-import-type StringPropertyVariableShape from \HubspotSDK\Cms\MediaBridge\StringPropertyVariable
 * @phpstan-import-type NumberPropertyVariableShape from \HubspotSDK\Cms\MediaBridge\NumberPropertyVariable
 * @phpstan-import-type TimestampOfPropertyVariableShape from \HubspotSDK\Cms\MediaBridge\TimestampOfPropertyVariable
 * @phpstan-import-type BooleanTargetPropertyVariableShape from \HubspotSDK\Cms\MediaBridge\BooleanTargetPropertyVariable
 * @phpstan-import-type StringTargetPropertyVariableShape from \HubspotSDK\Cms\MediaBridge\StringTargetPropertyVariable
 * @phpstan-import-type NumberTargetPropertyVariableShape from \HubspotSDK\Cms\MediaBridge\NumberTargetPropertyVariable
 * @phpstan-import-type TimestampOfTargetPropertyVariableShape from \HubspotSDK\Cms\MediaBridge\TimestampOfTargetPropertyVariable
 * @phpstan-import-type AddNumbersShape from \HubspotSDK\Cms\MediaBridge\AddNumbers
 * @phpstan-import-type SubtractNumbersShape from \HubspotSDK\Cms\MediaBridge\SubtractNumbers
 * @phpstan-import-type MultiplyNumbersShape from \HubspotSDK\Cms\MediaBridge\MultiplyNumbers
 * @phpstan-import-type DivideNumbersShape from \HubspotSDK\Cms\MediaBridge\DivideNumbers
 * @phpstan-import-type RoundDownNumbersShape from \HubspotSDK\Cms\MediaBridge\RoundDownNumbers
 * @phpstan-import-type RoundUpNumbersShape from \HubspotSDK\Cms\MediaBridge\RoundUpNumbers
 * @phpstan-import-type RoundNearestNumbersShape from \HubspotSDK\Cms\MediaBridge\RoundNearestNumbers
 * @phpstan-import-type UpperCaseShape from \HubspotSDK\Cms\MediaBridge\UpperCase
 * @phpstan-import-type LowerCaseShape from \HubspotSDK\Cms\MediaBridge\LowerCase
 * @phpstan-import-type ConcatStringsShape from \HubspotSDK\Cms\MediaBridge\ConcatStrings
 * @phpstan-import-type ContainsShape from \HubspotSDK\Cms\MediaBridge\Contains
 * @phpstan-import-type BeginsWithShape from \HubspotSDK\Cms\MediaBridge\BeginsWith
 * @phpstan-import-type NumberToStringShape from \HubspotSDK\Cms\MediaBridge\NumberToString
 * @phpstan-import-type ParseNumberShape from \HubspotSDK\Cms\MediaBridge\ParseNumber
 * @phpstan-import-type FetchExchangeRateShape from \HubspotSDK\Cms\MediaBridge\FetchExchangeRate
 * @phpstan-import-type FetchCurrencyDecimalPlacesShape from \HubspotSDK\Cms\MediaBridge\FetchCurrencyDecimalPlaces
 * @phpstan-import-type FetchSingleCurrencyPortalCurrencyShape from \HubspotSDK\Cms\MediaBridge\FetchSingleCurrencyPortalCurrency
 * @phpstan-import-type DatedExchangeRateShape from \HubspotSDK\Cms\MediaBridge\DatedExchangeRate
 * @phpstan-import-type PipelineProbabilityShape from \HubspotSDK\Cms\MediaBridge\PipelineProbability
 * @phpstan-import-type MaxNumbersShape from \HubspotSDK\Cms\MediaBridge\MaxNumbers
 * @phpstan-import-type MinNumbersShape from \HubspotSDK\Cms\MediaBridge\MinNumbers
 * @phpstan-import-type LessThanShape from \HubspotSDK\Cms\MediaBridge\LessThan
 * @phpstan-import-type LessThanOrEqualShape from \HubspotSDK\Cms\MediaBridge\LessThanOrEqual
 * @phpstan-import-type MoreThanShape from \HubspotSDK\Cms\MediaBridge\MoreThan
 * @phpstan-import-type MoreThanOrEqualShape from \HubspotSDK\Cms\MediaBridge\MoreThanOrEqual
 * @phpstan-import-type NumberEqualsShape from \HubspotSDK\Cms\MediaBridge\NumberEquals
 * @phpstan-import-type StringEqualsShape from \HubspotSDK\Cms\MediaBridge\StringEquals
 * @phpstan-import-type IsPipelineStageClosedShape from \HubspotSDK\Cms\MediaBridge\IsPipelineStageClosed
 * @phpstan-import-type NotShape from \HubspotSDK\Cms\MediaBridge\Not
 * @phpstan-import-type DateShape from \HubspotSDK\Cms\MediaBridge\Date
 * @phpstan-import-type MonthShape from \HubspotSDK\Cms\MediaBridge\Month
 * @phpstan-import-type YearShape from \HubspotSDK\Cms\MediaBridge\Year
 * @phpstan-import-type NowShape from \HubspotSDK\Cms\MediaBridge\Now
 * @phpstan-import-type TimeBetweenShape from \HubspotSDK\Cms\MediaBridge\TimeBetween
 * @phpstan-import-type PeriodToMonthsShape from \HubspotSDK\Cms\MediaBridge\PeriodToMonths
 * @phpstan-import-type PeriodToWeeksShape from \HubspotSDK\Cms\MediaBridge\PeriodToWeeks
 * @phpstan-import-type AndShape from \HubspotSDK\Cms\MediaBridge\And_
 * @phpstan-import-type OrShape from \HubspotSDK\Cms\MediaBridge\Or_
 * @phpstan-import-type XorShape from \HubspotSDK\Cms\MediaBridge\Xor_
 * @phpstan-import-type IfStringShape from \HubspotSDK\Cms\MediaBridge\IfString
 * @phpstan-import-type IfNumberShape from \HubspotSDK\Cms\MediaBridge\IfNumber
 * @phpstan-import-type IfBooleanShape from \HubspotSDK\Cms\MediaBridge\IfBoolean
 * @phpstan-import-type IsPresentShape from \HubspotSDK\Cms\MediaBridge\IsPresent
 * @phpstan-import-type HasEmailReplyShape from \HubspotSDK\Cms\MediaBridge\HasEmailReply
 * @phpstan-import-type HasPlainTextEmailReplyShape from \HubspotSDK\Cms\MediaBridge\HasPlainTextEmailReply
 * @phpstan-import-type ExtractMostRecentEmailReplyHTMLShape from \HubspotSDK\Cms\MediaBridge\ExtractMostRecentEmailReplyHTML
 * @phpstan-import-type ExtractMostRecentEmailReplyTextShape from \HubspotSDK\Cms\MediaBridge\ExtractMostRecentEmailReplyText
 * @phpstan-import-type ExtractMostRecentPlainTextEmailReplyShape from \HubspotSDK\Cms\MediaBridge\ExtractMostRecentPlainTextEmailReply
 * @phpstan-import-type SetContainsStringShape from \HubspotSDK\Cms\MediaBridge\SetContainsString
 * @phpstan-import-type IsEngagementTypeShape from \HubspotSDK\Cms\MediaBridge\IsEngagementType
 * @phpstan-import-type FormatFullNameShape from \HubspotSDK\Cms\MediaBridge\FormatFullName
 * @phpstan-import-type AbsoluteValueShape from \HubspotSDK\Cms\MediaBridge\AbsoluteValue
 * @phpstan-import-type SquareRootShape from \HubspotSDK\Cms\MediaBridge\SquareRoot
 * @phpstan-import-type PowerShape from \HubspotSDK\Cms\MediaBridge\Power
 * @phpstan-import-type SubstringShape from \HubspotSDK\Cms\MediaBridge\Substring
 * @phpstan-import-type EulerShape from \HubspotSDK\Cms\MediaBridge\Euler
 * @phpstan-import-type StringLengthShape from \HubspotSDK\Cms\MediaBridge\StringLength
 * @phpstan-import-type AddTimeShape from \HubspotSDK\Cms\MediaBridge\AddTime
 * @phpstan-import-type SubtractTimeShape from \HubspotSDK\Cms\MediaBridge\SubtractTime
 *
 * @phpstan-type ExpressionShape = ConstantBooleanShape|ConstantNumberShape|ConstantStringShape|BooleanPropertyVariableShape|StringPropertyVariableShape|NumberPropertyVariableShape|TimestampOfPropertyVariableShape|BooleanTargetPropertyVariableShape|StringTargetPropertyVariableShape|NumberTargetPropertyVariableShape|TimestampOfTargetPropertyVariableShape|AddNumbersShape|SubtractNumbersShape|MultiplyNumbersShape|DivideNumbersShape|RoundDownNumbersShape|RoundUpNumbersShape|RoundNearestNumbersShape|UpperCaseShape|LowerCaseShape|ConcatStringsShape|ContainsShape|BeginsWithShape|NumberToStringShape|ParseNumberShape|FetchExchangeRateShape|FetchCurrencyDecimalPlacesShape|FetchSingleCurrencyPortalCurrencyShape|DatedExchangeRateShape|PipelineProbabilityShape|MaxNumbersShape|MinNumbersShape|LessThanShape|LessThanOrEqualShape|MoreThanShape|MoreThanOrEqualShape|NumberEqualsShape|StringEqualsShape|IsPipelineStageClosedShape|NotShape|DateShape|MonthShape|YearShape|NowShape|TimeBetweenShape|PeriodToMonthsShape|PeriodToWeeksShape|AndShape|OrShape|XorShape|IfStringShape|IfNumberShape|IfBooleanShape|IsPresentShape|HasEmailReplyShape|HasPlainTextEmailReplyShape|ExtractMostRecentEmailReplyHTMLShape|ExtractMostRecentEmailReplyTextShape|ExtractMostRecentPlainTextEmailReplyShape|SetContainsStringShape|IsEngagementTypeShape|FormatFullNameShape|AbsoluteValueShape|SquareRootShape|PowerShape|SubstringShape|EulerShape|StringLengthShape|AddTimeShape|SubtractTimeShape
 */
final class Expression implements ConverterSource
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
