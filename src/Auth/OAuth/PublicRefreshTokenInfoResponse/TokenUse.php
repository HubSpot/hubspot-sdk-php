<?php

declare(strict_types=1);

namespace HubSpotSDK\Auth\OAuth\PublicRefreshTokenInfoResponse;

enum TokenUse: string
{
    case REFRESH_TOKEN = 'refresh_token';
}
