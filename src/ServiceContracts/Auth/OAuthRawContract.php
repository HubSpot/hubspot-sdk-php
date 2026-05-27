<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Auth;

use HubSpotSDK\Auth\OAuth\AccessTokenResponse;
use HubSpotSDK\Auth\OAuth\ClientCredentialsTokenResponse;
use HubSpotSDK\Auth\OAuth\OAuthCreateTokenParams;
use HubSpotSDK\Auth\OAuth\OAuthIntrospectTokenParams;
use HubSpotSDK\Auth\OAuth\OAuthRevokeTokenParams;
use HubSpotSDK\Auth\OAuth\PublicAccessTokenInfoResponse;
use HubSpotSDK\Auth\OAuth\PublicRefreshTokenInfoResponse;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface OAuthRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|OAuthCreateTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccessTokenResponse|ClientCredentialsTokenResponse>
     *
     * @throws APIException
     */
    public function createToken(
        array|OAuthCreateTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|OAuthIntrospectTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicAccessTokenInfoResponse|PublicRefreshTokenInfoResponse,>
     *
     * @throws APIException
     */
    public function introspectToken(
        array|OAuthIntrospectTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|OAuthRevokeTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function revokeToken(
        array|OAuthRevokeTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
