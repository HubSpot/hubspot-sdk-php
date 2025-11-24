<?php

declare(strict_types=1);

namespace HubspotSDK\Account\PortalInformationResponse;

enum AccountType: string
{
    case APP_DEVELOPER = 'APP_DEVELOPER';

    case DEVELOPER_TEST = 'DEVELOPER_TEST';

    case SANDBOX = 'SANDBOX';

    case STANDARD = 'STANDARD';
}
