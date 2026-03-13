<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\HubSpotFormDefinitionCreateRequest;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsExplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsImplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest;
use HubspotSDK\Marketing\Forms\LegalConsentOptionsNone;

/**
 * @phpstan-import-type LegalConsentOptionsNoneShape from \HubspotSDK\Marketing\Forms\LegalConsentOptionsNone
 * @phpstan-import-type LegalConsentOptionsLegitimateInterestShape from \HubspotSDK\Marketing\Forms\LegalConsentOptionsLegitimateInterest
 * @phpstan-import-type LegalConsentOptionsExplicitConsentToProcessShape from \HubspotSDK\Marketing\Forms\LegalConsentOptionsExplicitConsentToProcess
 * @phpstan-import-type LegalConsentOptionsImplicitConsentToProcessShape from \HubspotSDK\Marketing\Forms\LegalConsentOptionsImplicitConsentToProcess
 *
 * @phpstan-type LegalConsentOptionsVariants = LegalConsentOptionsNone|LegalConsentOptionsLegitimateInterest|LegalConsentOptionsExplicitConsentToProcess|LegalConsentOptionsImplicitConsentToProcess
 * @phpstan-type LegalConsentOptionsShape = LegalConsentOptionsVariants|LegalConsentOptionsNoneShape|LegalConsentOptionsLegitimateInterestShape|LegalConsentOptionsExplicitConsentToProcessShape|LegalConsentOptionsImplicitConsentToProcessShape
 */
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
