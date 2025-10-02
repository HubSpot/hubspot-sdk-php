<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIPlatformFlowCreateRequest;

use HubspotSDK\Automation\AutomationAPIAssociationDataSource;
use HubspotSDK\Automation\AutomationAPIAssociationTimestampDataSource;
use HubspotSDK\Automation\AutomationAPIDatasetFieldPropertyFilterDataSource;
use HubspotSDK\Automation\AutomationAPIEnrolledArgumentPropertyFilterDataSource;
use HubspotSDK\Automation\AutomationAPIEnrolledRecordPropertyFilterDataSource;
use HubspotSDK\Automation\AutomationAPIStaticPropertyFilterDataSource;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class DataSource implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            AutomationAPIAssociationDataSource::class,
            AutomationAPIAssociationTimestampDataSource::class,
            AutomationAPIStaticPropertyFilterDataSource::class,
            AutomationAPIEnrolledRecordPropertyFilterDataSource::class,
            AutomationAPIDatasetFieldPropertyFilterDataSource::class,
            AutomationAPIEnrolledArgumentPropertyFilterDataSource::class,
        ];
    }
}
