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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface OAuthRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|OAuthCreateAccessTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenResponseIf>
     *
     * @throws APIException
     */
    public function createAccessToken(
        array|OAuthCreateAccessTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $token the refresh token to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteRefreshToken(
        string $token,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $token the access token that you want to retrieve information about
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccessTokenInfoResponse>
     *
     * @throws APIException
     */
    public function getAccessToken(
        string $token,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $token the refresh token to retrieve information about
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RefreshTokenInfoResponse>
     *
     * @throws APIException
     */
    public function getRefreshToken(
        string $token,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
