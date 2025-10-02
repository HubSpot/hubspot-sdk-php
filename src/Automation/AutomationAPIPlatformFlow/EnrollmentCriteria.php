<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIPlatformFlow;

use HubspotSDK\Automation\AutomationAPIEventBasedEnrollmentCriteria;
use HubspotSDK\Automation\AutomationAPIListBasedEnrollmentCriteria;
use HubspotSDK\Automation\AutomationAPIManualEnrollmentCriteria;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class EnrollmentCriteria implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            AutomationAPIListBasedEnrollmentCriteria::class,
            AutomationAPIEventBasedEnrollmentCriteria::class,
            AutomationAPIManualEnrollmentCriteria::class,
        ];
    }
}
