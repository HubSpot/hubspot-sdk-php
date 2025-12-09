<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Auth;

use HubspotSDK\Auth\OAuth\AccessTokenInfoResponse;
use HubspotSDK\Auth\OAuth\OAuthCreateAccessTokenParams;
use HubspotSDK\Auth\OAuth\RefreshTokenInfoResponse;
use HubspotSDK\Auth\OAuth\TokenResponseIf;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface OAuthRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|OAuthCreateAccessTokenParams $params
     *
     * @return BaseResponse<TokenResponseIf>
     *
     * @throws APIException
     */
    public function createAccessToken(
        array|OAuthCreateAccessTokenParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $token the refresh token to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteRefreshToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $token the access token that you want to retrieve information about
     *
     * @return BaseResponse<AccessTokenInfoResponse>
     *
     * @throws APIException
     */
    public function getAccessToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $token the refresh token to retrieve information about
     *
     * @return BaseResponse<RefreshTokenInfoResponse>
     *
     * @throws APIException
     */
    public function getRefreshToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
