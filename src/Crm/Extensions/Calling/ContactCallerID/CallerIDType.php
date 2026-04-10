<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling\ContactCallerID;

/**
 * Specifies the type of caller ID, with the default value being CONTACT.
 */
enum CallerIDType: string
{
    case CONTACT = 'CONTACT';
}
