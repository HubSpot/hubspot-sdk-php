<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIUnEnrollmentSetting;

/**
 * The type of unenrollment to perform:
 *
 * "ALL" - unenroll the object from all other flows
 *
 * "SELECTIVE" - only unenroll the object from the flows specified in `flowIds`
 */
enum Type: string
{
    case ALL = 'ALL';

    case SELECTIVE = 'SELECTIVE';
}
