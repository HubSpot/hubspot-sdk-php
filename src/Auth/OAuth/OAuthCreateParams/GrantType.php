<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth\OAuthCreateParams;

enum GrantType: string
{
    case AUTHORIZATION_CODE = 'authorization_code';

    case REFRESH_TOKEN = 'refresh_token';
}
