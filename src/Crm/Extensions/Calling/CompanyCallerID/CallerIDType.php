<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling\CompanyCallerID;

/**
 * Specifies the type of caller ID, which is set to 'COMPANY' by default.
 */
enum CallerIDType: string
{
    case COMPANY = 'COMPANY';
}
