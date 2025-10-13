<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIEventBasedEnrollmentCriteria;

/**
 * The type of enrollment criteria this is, this can be "LIST_BASED", "EVENT_BASED", or "MANUAL".
 */
enum Type: string
{
    case EVENT_BASED = 'EVENT_BASED';
}
