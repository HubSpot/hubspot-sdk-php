<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Auth;

use HubspotSDK\Auth\OAuth\AuthOAuthRefreshTokenInfoResponse;
use HubspotSDK\Auth\OAuth\AuthOAuthTokenResponseIf;
use HubspotSDK\Auth\OAuth\OAuthCreateParams\GrantType;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
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
     * @return AuthOAuthTokenResponseIf<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $clientID = omit,
        $clientSecret = omit,
        $code = omit,
        $grantType = omit,
        $redirectUri = omit,
        $refreshToken = omit,
        ?RequestOptions $requestOptions = null,
    ): AuthOAuthTokenResponseIf;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AuthOAuthTokenResponseIf<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AuthOAuthTokenResponseIf;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $token,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $token,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return AuthOAuthRefreshTokenInfoResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function get(
        string $token,
        ?RequestOptions $requestOptions = null
    ): AuthOAuthRefreshTokenInfoResponse;

    /**
     * @api
     *
     * @return AuthOAuthRefreshTokenInfoResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getRaw(
        string $token,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): AuthOAuthRefreshTokenInfoResponse;
}
