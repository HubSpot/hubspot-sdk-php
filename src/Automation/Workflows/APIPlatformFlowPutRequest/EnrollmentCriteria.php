<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIPlatformFlowPutRequest;

use HubspotSDK\Automation\Workflows\APIEventBasedEnrollmentCriteria;
use HubspotSDK\Automation\Workflows\APIListBasedEnrollmentCriteria;
use HubspotSDK\Automation\Workflows\APIManualEnrollmentCriteria;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class EnrollmentCriteria implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            APIListBasedEnrollmentCriteria::class,
            APIEventBasedEnrollmentCriteria::class,
            APIManualEnrollmentCriteria::class,
        ];
    }
}
