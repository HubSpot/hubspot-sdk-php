<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIUnEnrollmentSetting;

enum Type: string
{
    case ALL = 'ALL';

    case SELECTIVE = 'SELECTIVE';
}
