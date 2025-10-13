<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APITimestampValue;

/**
 * Currently only EXECUTION_TIME is supported.
 */
enum TimestampType: string
{
    case EXECUTION_TIME = 'EXECUTION_TIME';
}
