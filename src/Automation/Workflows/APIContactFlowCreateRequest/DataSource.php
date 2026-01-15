<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest;

use HubspotSDK\Automation\Workflows\APIAssociationDataSource;
use HubspotSDK\Automation\Workflows\APIAssociationTimestampDataSource;
use HubspotSDK\Automation\Workflows\APIDatasetFieldPropertyFilterDataSource;
use HubspotSDK\Automation\Workflows\APIEnrolledArgumentPropertyFilterDataSource;
use HubspotSDK\Automation\Workflows\APIEnrolledRecordPropertyFilterDataSource;
use HubspotSDK\Automation\Workflows\APIStaticPropertyFilterDataSource;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type APIAssociationDataSourceShape from \HubspotSDK\Automation\Workflows\APIAssociationDataSource
 * @phpstan-import-type APIAssociationTimestampDataSourceShape from \HubspotSDK\Automation\Workflows\APIAssociationTimestampDataSource
 * @phpstan-import-type APIStaticPropertyFilterDataSourceShape from \HubspotSDK\Automation\Workflows\APIStaticPropertyFilterDataSource
 * @phpstan-import-type APIEnrolledRecordPropertyFilterDataSourceShape from \HubspotSDK\Automation\Workflows\APIEnrolledRecordPropertyFilterDataSource
 * @phpstan-import-type APIDatasetFieldPropertyFilterDataSourceShape from \HubspotSDK\Automation\Workflows\APIDatasetFieldPropertyFilterDataSource
 * @phpstan-import-type APIEnrolledArgumentPropertyFilterDataSourceShape from \HubspotSDK\Automation\Workflows\APIEnrolledArgumentPropertyFilterDataSource
 *
 * @phpstan-type DataSourceVariants = APIAssociationDataSource|APIAssociationTimestampDataSource|APIStaticPropertyFilterDataSource|APIEnrolledRecordPropertyFilterDataSource|APIDatasetFieldPropertyFilterDataSource|APIEnrolledArgumentPropertyFilterDataSource
 * @phpstan-type DataSourceShape = DataSourceVariants|APIAssociationDataSourceShape|APIAssociationTimestampDataSourceShape|APIStaticPropertyFilterDataSourceShape|APIEnrolledRecordPropertyFilterDataSourceShape|APIDatasetFieldPropertyFilterDataSourceShape|APIEnrolledArgumentPropertyFilterDataSourceShape
 */
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
