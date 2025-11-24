<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users\UserDeleteParams;

/**
 * The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`.
 */
enum IDProperty: string
{
    case EMAIL = 'EMAIL';

    case USER_ID = 'USER_ID';
}
