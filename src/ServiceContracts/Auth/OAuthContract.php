<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Auth;

use HubspotSDK\Auth\OAuth\AccessTokenInfoResponse;
use HubspotSDK\Auth\OAuth\OAuthCreateAccessTokenParams\GrantType;
use HubspotSDK\Auth\OAuth\RefreshTokenInfoResponse;
use HubspotSDK\Auth\OAuth\TokenResponseIf;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface OAuthContract
{
    /**
     * @api
     *
     * @param string $clientID
     * @param string $clientSecret
     * @param string $code
     * @param GrantType|value-of<GrantType> $grantType
     * @param string $redirectUri
     * @param string $refreshToken
     *
     * @throws APIException
     */
    public function createAccessToken(
        $clientID = omit,
        $clientSecret = omit,
        $code = omit,
        $grantType = omit,
        $redirectUri = omit,
        $refreshToken = omit,
        ?RequestOptions $requestOptions = null,
    ): TokenResponseIf;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createAccessTokenRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TokenResponseIf;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRefreshToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getAccessToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): AccessTokenInfoResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getRefreshToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): RefreshTokenInfoResponse;
}
