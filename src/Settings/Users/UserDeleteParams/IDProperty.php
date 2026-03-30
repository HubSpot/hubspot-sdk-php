<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users\UserDeleteParams;

enum IDProperty: string
{
    case EMAIL = 'EMAIL';

    case USER_ID = 'USER_ID';
}
