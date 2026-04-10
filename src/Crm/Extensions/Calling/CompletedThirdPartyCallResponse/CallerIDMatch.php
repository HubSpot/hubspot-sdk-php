<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Crm\Extensions\Calling\CompanyCallerID;
use HubSpotSDK\Crm\Extensions\Calling\ContactCallerID;

/**
 * @phpstan-import-type ContactCallerIDShape from \HubSpotSDK\Crm\Extensions\Calling\ContactCallerID
 * @phpstan-import-type CompanyCallerIDShape from \HubSpotSDK\Crm\Extensions\Calling\CompanyCallerID
 *
 * @phpstan-type CallerIDMatchVariants = ContactCallerID|CompanyCallerID
 * @phpstan-type CallerIDMatchShape = CallerIDMatchVariants|ContactCallerIDShape|CompanyCallerIDShape
 */
final class CallerIDMatch implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [ContactCallerID::class, CompanyCallerID::class];
    }
}
