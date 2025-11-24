<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Auth;

use HubspotSDK\Auth\OAuth\AccessTokenInfoResponse;
use HubspotSDK\Auth\OAuth\OAuthCreateAccessTokenParams;
use HubspotSDK\Auth\OAuth\RefreshTokenInfoResponse;
use HubspotSDK\Auth\OAuth\TokenResponseIf;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface OAuthContract
{
    /**
     * @api
     *
     * @param array<mixed>|OAuthCreateAccessTokenParams $params
     *
     * @throws APIException
     */
    public function createAccessToken(
        array|OAuthCreateAccessTokenParams $params,
        ?RequestOptions $requestOptions = null,
    ): TokenResponseIf;

    /**
     * @deprecated
     *
     * @api
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
     * @throws APIException
     */
    public function getRefreshToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): RefreshTokenInfoResponse;
}
