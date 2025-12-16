<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest;

use HubspotSDK\Automation\Workflows\APIEventBasedEnrollmentCriteria;
use HubspotSDK\Automation\Workflows\APIListBasedEnrollmentCriteria;
use HubspotSDK\Automation\Workflows\APIManualEnrollmentCriteria;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type APIListBasedEnrollmentCriteriaShape from \HubspotSDK\Automation\Workflows\APIListBasedEnrollmentCriteria
 * @phpstan-import-type APIEventBasedEnrollmentCriteriaShape from \HubspotSDK\Automation\Workflows\APIEventBasedEnrollmentCriteria
 * @phpstan-import-type APIManualEnrollmentCriteriaShape from \HubspotSDK\Automation\Workflows\APIManualEnrollmentCriteria
 *
 * @phpstan-type EnrollmentCriteriaShape = APIListBasedEnrollmentCriteriaShape|APIEventBasedEnrollmentCriteriaShape|APIManualEnrollmentCriteriaShape
 */
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
