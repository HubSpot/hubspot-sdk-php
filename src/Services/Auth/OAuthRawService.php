<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Auth;

use HubspotSDK\Auth\OAuth\OAuthCreateTokenParams;
use HubspotSDK\Auth\OAuth\OAuthCreateTokenParams\GrantType;
use HubspotSDK\Auth\OAuth\OAuthIntrospectTokenParams;
use HubspotSDK\Auth\OAuth\OAuthRevokeTokenParams;
use HubspotSDK\Auth\OAuth\TokenInfoResponseBaseIf;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Auth\OAuthRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * @return BaseResponse<string>
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
            headers: [
                'Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => '*/*',
            ],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
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
     * @return BaseResponse<TokenInfoResponseBaseIf>
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
