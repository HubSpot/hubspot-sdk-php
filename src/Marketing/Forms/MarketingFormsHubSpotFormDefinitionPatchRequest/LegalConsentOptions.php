<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\MarketingFormsHubSpotFormDefinitionPatchRequest;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Marketing\Forms\MarketingFormsLegalConsentOptionsExplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\MarketingFormsLegalConsentOptionsImplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\MarketingFormsLegalConsentOptionsLegitimateInterest;
use HubspotSDK\Marketing\Forms\MarketingFormsLegalConsentOptionsNone;

final class LegalConsentOptions implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            MarketingFormsLegalConsentOptionsNone::class,
            MarketingFormsLegalConsentOptionsLegitimateInterest::class,
            MarketingFormsLegalConsentOptionsExplicitConsentToProcess::class,
            MarketingFormsLegalConsentOptionsImplicitConsentToProcess::class,
        ];
    }
}
