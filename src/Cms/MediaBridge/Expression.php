<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

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
