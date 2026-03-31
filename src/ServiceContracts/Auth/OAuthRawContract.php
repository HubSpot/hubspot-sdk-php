<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Auth;

use HubspotSDK\Auth\OAuth\OAuthCreateTokenParams;
use HubspotSDK\Auth\OAuth\OAuthIntrospectTokenParams;
use HubspotSDK\Auth\OAuth\OAuthRevokeTokenParams;
use HubspotSDK\Auth\OAuth\PublicAccessTokenInfoResponse;
use HubspotSDK\Auth\OAuth\PublicRefreshTokenInfoResponse;
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
     * @param array<string,mixed>|OAuthCreateTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
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
