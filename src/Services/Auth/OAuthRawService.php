<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Auth;

use HubspotSDK\Auth\OAuth\AccessTokenInfoResponse;
use HubspotSDK\Auth\OAuth\OAuthCreateAccessTokenParams;
use HubspotSDK\Auth\OAuth\OAuthCreateAccessTokenParams\GrantType;
use HubspotSDK\Auth\OAuth\RefreshTokenInfoResponse;
use HubspotSDK\Auth\OAuth\TokenResponseIf;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Auth\OAuthRawContract;

final class OAuthRawService implements OAuthRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Use a [previously obtained refresh token](#get-oauth-2.0-access-and-refresh-tokens) to generate a new access token.
     *
     * Access tokens are short lived. You can check the `expires_in` parameter when generating an access token to determine its lifetime (in seconds). If you need offline access to HubSpot data, store the refresh token you get when [initiating your OAuth integration](https://developers.hubspot.com/docs/guides/api/app-management/oauth-tokens#initiating-oauth-access) and use it to generate a new access token once the initial one expires.
     *
     * Note: HubSpot access tokens will fluctuate in size as the information that's encoded in them changes over time. It's recommended to allow for tokens to be up to 300 characters to account for any potential changes.
     *
     * @param array{
     *   clientSecret?: string,
     *   refreshToken?: string,
     *   clientID?: string,
     *   code?: string,
     *   codeVerifier?: string,
     *   grantType?: 'authorization_code'|'client_credentials'|'refresh_token'|GrantType,
     *   redirectUri?: string,
     *   scope?: string,
     * }|OAuthCreateAccessTokenParams $params
     *
     * @return BaseResponse<TokenResponseIf>
     *
     * @throws APIException
     */
    public function createAccessToken(
        array|OAuthCreateAccessTokenParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthCreateAccessTokenParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['clientSecret', 'refreshToken']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'oauth/v1/token',
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['clientSecret' => 'client_secret', 'refreshToken' => 'refresh_token'],
            ),
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: TokenResponseIf::class,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Delete a refresh token, typically after a user uninstalls your app. Access tokens generated with the refresh token will not be affected.
     *
     * This will not uninstall the application from HubSpot or inhibit data syncing between an account and the app.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['oauth/v1/refresh-tokens/%1$s', $token],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Retrieve a token's metadata, including the email address of the user that the token was created for and the ID of the account it's associated with.
     *
     * Note: HubSpot access tokens will fluctuate in size as the information that's encoded in them changes over time. It's recommended to allow for tokens to be up to 300 characters to account for any potential changes.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['oauth/v1/access-tokens/%1$s', $token],
            options: $requestOptions,
            convert: AccessTokenInfoResponse::class,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Retrieve a refresh token's metadata, including the email address of the user that the token was created for and the ID of the account it's associated with. Learn more about [refresh tokens](https://developers.hubspot.com/docs/guides/api/app-management/oauth-tokens#generate-initial-access-and-refresh-tokens).
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['oauth/v1/refresh-tokens/%1$s', $token],
            options: $requestOptions,
            convert: RefreshTokenInfoResponse::class,
        );
    }
}
