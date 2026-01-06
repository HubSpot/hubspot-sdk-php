<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Auth;

use HubspotSDK\Auth\OAuth\AccessTokenInfoResponse;
use HubspotSDK\Auth\OAuth\OAuthCreateAccessTokenParams\GrantType;
use HubspotSDK\Auth\OAuth\RefreshTokenInfoResponse;
use HubspotSDK\Auth\OAuth\TokenResponseIf;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface OAuthContract
{
    /**
     * @api
     *
     * @param string $clientSecret Body param:
     * @param string $refreshToken Body param:
     * @param string $clientID Body param:
     * @param string $code Body param:
     * @param string $codeVerifier Body param:
     * @param 'authorization_code'|'client_credentials'|'refresh_token'|GrantType $grantType Body param:
     * @param string $redirectUri Body param:
     * @param string $scope Body param:
     *
     * @throws APIException
     */
    public function createAccessToken(
        ?string $clientSecret = null,
        ?string $refreshToken = null,
        ?string $clientID = null,
        ?string $code = null,
        ?string $codeVerifier = null,
        string|GrantType|null $grantType = null,
        ?string $redirectUri = null,
        ?string $scope = null,
        ?RequestOptions $requestOptions = null,
    ): TokenResponseIf;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $token the refresh token to delete
     *
     * @throws APIException
     */
    public function deleteRefreshToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $token the access token that you want to retrieve information about
     *
     * @throws APIException
     */
    public function getAccessToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): AccessTokenInfoResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $token the refresh token to retrieve information about
     *
     * @throws APIException
     */
    public function getRefreshToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): RefreshTokenInfoResponse;
}
