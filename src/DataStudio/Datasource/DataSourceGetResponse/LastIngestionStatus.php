<?php

declare(strict_types=1);

namespace HubspotSDK\DataStudio\Datasource\DataSourceGetResponse;

/**
 * The status of the last data ingestion process, represented as a string. Valid values include 'SUCCESSFUL', 'IN_PROGRESS', and 'FAILED'.
 */
enum LastIngestionStatus: string
{
    case FAILED = 'FAILED';

    case IN_PROGRESS = 'IN_PROGRESS';

    case SUCCESSFUL = 'SUCCESSFUL';
}
