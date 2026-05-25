<?php

declare(strict_types=1);

namespace HubSpotSDK\Auth\OAuth\ClientCredentialsTokenResponse;

enum TokenUse: string
{
    case CLIENT_CREDENTIALS = 'client_credentials';
}
