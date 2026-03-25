<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Extensions\Calling\CompanyCallerID;
use HubspotSDK\Crm\Extensions\Calling\ContactCallerID;

/**
 * @phpstan-import-type ContactCallerIDShape from \HubspotSDK\Crm\Extensions\Calling\ContactCallerID
 * @phpstan-import-type CompanyCallerIDShape from \HubspotSDK\Crm\Extensions\Calling\CompanyCallerID
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
