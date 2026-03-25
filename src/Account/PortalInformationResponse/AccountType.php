<?php

declare(strict_types=1);

namespace HubspotSDK\Account\PortalInformationResponse;

/**
 * The type of account, such as APP_DEVELOPER, DEVELOPER_TEST, SANDBOX, or STANDARD.
 */
enum AccountType: string
{
    case APP_DEVELOPER = 'APP_DEVELOPER';

    case DEVELOPER_TEST = 'DEVELOPER_TEST';

    case SANDBOX = 'SANDBOX';

    case STANDARD = 'STANDARD';
}
