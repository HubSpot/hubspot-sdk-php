<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Auth;

use HubSpotSDK\Auth\OAuth\OAuthCreateTokenParams\GrantType;
use HubSpotSDK\Auth\OAuth\PublicAccessTokenInfoResponse;
use HubSpotSDK\Auth\OAuth\PublicRefreshTokenInfoResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
    ): PublicAccessTokenInfoResponse|PublicRefreshTokenInfoResponse;

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
