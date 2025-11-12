<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\FormDefinitionBase;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsExplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsImplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsNone;

final class LegalConsentOptions implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            LegalConsentOptionsNone::class,
            LegalConsentOptionsLegitimateInterest::class,
            LegalConsentOptionsExplicitConsentToProcess::class,
            LegalConsentOptionsImplicitConsentToProcess::class,
        ];
    }
}
