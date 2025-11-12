<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest;

use HubspotSDK\Automation\Workflows\APIAssociationDataSource;
use HubspotSDK\Automation\Workflows\APIAssociationTimestampDataSource;
use HubspotSDK\Automation\Workflows\APIDatasetFieldPropertyFilterDataSource;
use HubspotSDK\Automation\Workflows\APIEnrolledArgumentPropertyFilterDataSource;
use HubspotSDK\Automation\Workflows\APIEnrolledRecordPropertyFilterDataSource;
use HubspotSDK\Automation\Workflows\APIStaticPropertyFilterDataSource;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class DataSource implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            APIAssociationDataSource::class,
            APIAssociationTimestampDataSource::class,
            APIStaticPropertyFilterDataSource::class,
            APIEnrolledRecordPropertyFilterDataSource::class,
            APIDatasetFieldPropertyFilterDataSource::class,
            APIEnrolledArgumentPropertyFilterDataSource::class,
        ];
    }
}
