<?php

declare(strict_types=1);

namespace HubspotSDK\DataStudio\Datasource\DataSourceGetResponse;

/**
 * The type of the data source, which is a string with a valid value of 'FILE'.
 */
enum DatasourceType: string
{
    case FILE = 'FILE';
}
