<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Auth;

use HubSpotSDK\Auth\OAuth\AccessTokenResponse;
use HubSpotSDK\Auth\OAuth\ClientCredentialsTokenResponse;
use HubSpotSDK\Auth\OAuth\OAuthCreateTokenParams;
use HubSpotSDK\Auth\OAuth\OAuthCreateTokenParams\GrantType;
use HubSpotSDK\Auth\OAuth\OAuthIntrospectTokenParams;
use HubSpotSDK\Auth\OAuth\OAuthRevokeTokenParams;
use HubSpotSDK\Auth\OAuth\PublicAccessTokenInfoResponse;
use HubSpotSDK\Auth\OAuth\PublicRefreshTokenInfoResponse;
use HubSpotSDK\Auth\OAuth\TokenInfoResponseBaseIf;
use HubSpotSDK\Auth\OAuth\TokenResponseIf;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Auth\OAuthRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
     * Authenticates a client and returns access and refresh tokens.
     *
     * @param array{
     *   clientID?: string,
     *   clientSecret?: string,
     *   code?: string,
     *   codeVerifier?: string,
     *   grantType?: GrantType|value-of<GrantType>,
     *   redirectUri?: string,
     *   refreshToken?: string,
     *   scope?: string,
     * }|OAuthCreateTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccessTokenResponse|ClientCredentialsTokenResponse>
     *
     * @throws APIException
     */
    public function createToken(
        array|OAuthCreateTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthCreateTokenParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'oauth/2026-03/token',
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) $parsed,
            options: $options,
            convert: TokenResponseIf::class,
        );
    }

    /**
     * @api
     *
     * Returns validity and metadata for access and refresh tokens.
     *
     * @param array{
     *   token?: string,
     *   clientID?: string,
     *   clientSecret?: string,
     *   tokenTypeHint?: string,
     * }|OAuthIntrospectTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicAccessTokenInfoResponse|PublicRefreshTokenInfoResponse,>
     *
     * @throws APIException
     */
    public function introspectToken(
        array|OAuthIntrospectTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthIntrospectTokenParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'oauth/2026-03/token/introspect',
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) $parsed,
            options: $options,
            convert: TokenInfoResponseBaseIf::class,
        );
    }

    /**
     * @api
     *
     * Deletes/Revokes provided Refresh Token
     *
     * @param array{
     *   token?: string,
     *   clientID?: string,
     *   clientSecret?: string,
     *   tokenTypeHint?: string,
     * }|OAuthRevokeTokenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function revokeToken(
        array|OAuthRevokeTokenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthRevokeTokenParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'oauth/2026-03/token/revoke',
            headers: [
                'Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => '*/*',
            ],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }
}
