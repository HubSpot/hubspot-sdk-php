<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\AuthContract;
use HubspotSDK\Services\Auth\OAuthService;

final class AuthService implements AuthContract
{
    /**
     * @api
     */
    public AuthRawService $raw;

    /**
     * @api
     */
    public OAuthService $oauth;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AuthRawService($client);
        $this->oauth = new OAuthService($client);
    }
}
