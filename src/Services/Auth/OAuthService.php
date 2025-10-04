<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Auth;

use HubspotSDK\Auth\OAuth\AuthOAuthRefreshTokenInfoResponse;
use HubspotSDK\Auth\OAuth\AuthOAuthTokenResponseIf;
use HubspotSDK\Auth\OAuth\OAuthCreateParams;
use HubspotSDK\Auth\OAuth\OAuthCreateParams\GrantType;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Auth\OAuthContract;

use const HubspotSDK\Core\OMIT as omit;

final class OAuthService implements OAuthContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Refresh an access token
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
    public function create(
        $clientID = omit,
        $clientSecret = omit,
        $code = omit,
        $grantType = omit,
        $redirectUri = omit,
        $refreshToken = omit,
        ?RequestOptions $requestOptions = null,
    ): AuthOAuthTokenResponseIf {
        $params = [
            'clientID' => $clientID,
            'clientSecret' => $clientSecret,
            'code' => $code,
            'grantType' => $grantType,
            'redirectUri' => $redirectUri,
            'refreshToken' => $refreshToken,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AuthOAuthTokenResponseIf {
        [$parsed, $options] = OAuthCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'oauth/v1/token',
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body: (object) $parsed,
            options: $options,
            convert: AuthOAuthTokenResponseIf::class,
        );
    }

    /**
     * @api
     *
     * Delete a refresh token
     *
     * @throws APIException
     */
    public function delete(
        string $token,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['oauth/v1/refresh-tokens/%1$s', $token],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve refresh token metadata
     *
     * @throws APIException
     */
    public function get(
        string $token,
        ?RequestOptions $requestOptions = null
    ): AuthOAuthRefreshTokenInfoResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['oauth/v1/refresh-tokens/%1$s', $token],
            options: $requestOptions,
            convert: AuthOAuthRefreshTokenInfoResponse::class,
        );
    }
}
