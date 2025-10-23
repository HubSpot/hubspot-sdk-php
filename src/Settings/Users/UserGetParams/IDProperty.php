<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users\UserGetParams;

/**
 * The name of a property with unique user values. Valid values are `USER_ID`(default) or `EMAIL`.
 */
enum IDProperty: string
{
    case USER_ID = 'USER_ID';

    case EMAIL = 'EMAIL';
}
