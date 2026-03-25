<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Auth;

use HubspotSDK\Auth\OAuth\OAuthCreateTokenParams\GrantType;
use HubspotSDK\Auth\OAuth\TokenInfoResponseBaseIf;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface OAuthContract
{
    /**
     * @api
     *
     * @param GrantType|value-of<GrantType> $grantType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createToken(
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $code = null,
        ?string $codeVerifier = null,
        GrantType|string|null $grantType = null,
        ?string $redirectUri = null,
        ?string $refreshToken = null,
        ?string $scope = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function introspectToken(
        ?string $token = null,
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $tokenTypeHint = null,
        RequestOptions|array|null $requestOptions = null,
    ): TokenInfoResponseBaseIf;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function revokeToken(
        ?string $token = null,
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $tokenTypeHint = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
