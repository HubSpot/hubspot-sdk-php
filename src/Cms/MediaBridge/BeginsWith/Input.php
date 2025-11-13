<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\BeginsWith;

use HubspotSDK\Cms\MediaBridge\AbsoluteValue;
use HubspotSDK\Cms\MediaBridge\AddNumbers;
use HubspotSDK\Cms\MediaBridge\AddTime;
use HubspotSDK\Cms\MediaBridge\And1;
use HubspotSDK\Cms\MediaBridge\BeginsWith;
use HubspotSDK\Cms\MediaBridge\BooleanPropertyVariable;
use HubspotSDK\Cms\MediaBridge\BooleanTargetPropertyVariable;
use HubspotSDK\Cms\MediaBridge\ConcatStrings;
use HubspotSDK\Cms\MediaBridge\ConstantBoolean;
use HubspotSDK\Cms\MediaBridge\ConstantNumber;
use HubspotSDK\Cms\MediaBridge\ConstantString;
use HubspotSDK\Cms\MediaBridge\Contains;
use HubspotSDK\Cms\MediaBridge\Date;
use HubspotSDK\Cms\MediaBridge\DatedExchangeRate;
use HubspotSDK\Cms\MediaBridge\DivideNumbers;
use HubspotSDK\Cms\MediaBridge\Euler;
use HubspotSDK\Cms\MediaBridge\ExtractMostRecentEmailReplyHTML;
use HubspotSDK\Cms\MediaBridge\ExtractMostRecentEmailReplyText;
use HubspotSDK\Cms\MediaBridge\ExtractMostRecentPlainTextEmailReply;
use HubspotSDK\Cms\MediaBridge\FetchCurrencyDecimalPlaces;
use HubspotSDK\Cms\MediaBridge\FetchExchangeRate;
use HubspotSDK\Cms\MediaBridge\FetchSingleCurrencyPortalCurrency;
use HubspotSDK\Cms\MediaBridge\FormatFullName;
use HubspotSDK\Cms\MediaBridge\HasEmailReply;
use HubspotSDK\Cms\MediaBridge\HasPlainTextEmailReply;
use HubspotSDK\Cms\MediaBridge\IfBoolean;
use HubspotSDK\Cms\MediaBridge\IfNumber;
use HubspotSDK\Cms\MediaBridge\IfString;
use HubspotSDK\Cms\MediaBridge\IsEngagementType;
use HubspotSDK\Cms\MediaBridge\IsPipelineStageClosed;
use HubspotSDK\Cms\MediaBridge\IsPresent;
use HubspotSDK\Cms\MediaBridge\LessThan;
use HubspotSDK\Cms\MediaBridge\LessThanOrEqual;
use HubspotSDK\Cms\MediaBridge\LowerCase;
use HubspotSDK\Cms\MediaBridge\MaxNumbers;
use HubspotSDK\Cms\MediaBridge\MinNumbers;
use HubspotSDK\Cms\MediaBridge\Month;
use HubspotSDK\Cms\MediaBridge\MoreThan;
use HubspotSDK\Cms\MediaBridge\MoreThanOrEqual;
use HubspotSDK\Cms\MediaBridge\MultiplyNumbers;
use HubspotSDK\Cms\MediaBridge\Not;
use HubspotSDK\Cms\MediaBridge\Now;
use HubspotSDK\Cms\MediaBridge\NumberEquals;
use HubspotSDK\Cms\MediaBridge\NumberPropertyVariable;
use HubspotSDK\Cms\MediaBridge\NumberTargetPropertyVariable;
use HubspotSDK\Cms\MediaBridge\NumberToString;
use HubspotSDK\Cms\MediaBridge\Or1;
use HubspotSDK\Cms\MediaBridge\ParseNumber;
use HubspotSDK\Cms\MediaBridge\PeriodToMonths;
use HubspotSDK\Cms\MediaBridge\PeriodToWeeks;
use HubspotSDK\Cms\MediaBridge\PipelineProbability;
use HubspotSDK\Cms\MediaBridge\Power;
use HubspotSDK\Cms\MediaBridge\RoundDownNumbers;
use HubspotSDK\Cms\MediaBridge\RoundNearestNumbers;
use HubspotSDK\Cms\MediaBridge\RoundUpNumbers;
use HubspotSDK\Cms\MediaBridge\SetContainsString;
use HubspotSDK\Cms\MediaBridge\SquareRoot;
use HubspotSDK\Cms\MediaBridge\StringEquals;
use HubspotSDK\Cms\MediaBridge\StringLength;
use HubspotSDK\Cms\MediaBridge\StringPropertyVariable;
use HubspotSDK\Cms\MediaBridge\StringTargetPropertyVariable;
use HubspotSDK\Cms\MediaBridge\Substring;
use HubspotSDK\Cms\MediaBridge\SubtractNumbers;
use HubspotSDK\Cms\MediaBridge\SubtractTime;
use HubspotSDK\Cms\MediaBridge\TimeBetween;
use HubspotSDK\Cms\MediaBridge\TimestampOfPropertyVariable;
use HubspotSDK\Cms\MediaBridge\TimestampOfTargetPropertyVariable;
use HubspotSDK\Cms\MediaBridge\UpperCase;
use HubspotSDK\Cms\MediaBridge\Xor1;
use HubspotSDK\Cms\MediaBridge\Year;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

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
            PeriodToMonths::class,
            PeriodToWeeks::class,
            And1::class,
            Or1::class,
            Xor1::class,
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
