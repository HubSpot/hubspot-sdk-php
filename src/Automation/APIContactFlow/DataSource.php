<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\APIContactFlow;

use HubspotSDK\Automation\APIAssociationDataSource;
use HubspotSDK\Automation\APIAssociationTimestampDataSource;
use HubspotSDK\Automation\APIDatasetFieldPropertyFilterDataSource;
use HubspotSDK\Automation\APIEnrolledArgumentPropertyFilterDataSource;
use HubspotSDK\Automation\APIEnrolledRecordPropertyFilterDataSource;
use HubspotSDK\Automation\APIStaticPropertyFilterDataSource;
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
            APIAssociationDataSource::class,
            APIAssociationTimestampDataSource::class,
            APIStaticPropertyFilterDataSource::class,
            APIEnrolledRecordPropertyFilterDataSource::class,
            APIDatasetFieldPropertyFilterDataSource::class,
            APIEnrolledArgumentPropertyFilterDataSource::class,
        ];
    }
}
