<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIListBasedEnrollmentCriteria;

/**
 * The type of enrollment criteria this is, this can be "LIST_BASED", "EVENT_BASED", or "MANUAL".
 */
enum Type: string
{
    case LIST_BASED = 'LIST_BASED';
}
