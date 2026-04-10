<?php

declare(strict_types=1);

namespace HubSpotSDK\Auth\OAuth\OAuthCreateTokenParams;

enum GrantType: string
{
    case AUTHORIZATION_CODE = 'authorization_code';

    case REFRESH_TOKEN = 'refresh_token';
}
