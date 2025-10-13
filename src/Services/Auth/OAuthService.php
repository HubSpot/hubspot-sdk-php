<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Auth;

use HubspotSDK\Auth\OAuth\OAuthCreateParams;
use HubspotSDK\Auth\OAuth\OAuthCreateParams\GrantType;
use HubspotSDK\Auth\OAuth\RefreshTokenInfoResponse;
use HubspotSDK\Auth\OAuth\TokenResponseIf;
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
     * Use a [previously obtained refresh token](#get-oauth-2.0-access-and-refresh-tokens) to generate a new access token.
     *
     * Access tokens are short lived. You can check the `expires_in` parameter when generating an access token to determine its lifetime (in seconds). If you need offline access to HubSpot data, store the refresh token you get when [initiating your OAuth integration](https://developers.hubspot.com/docs/guides/api/app-management/oauth-tokens#initiating-oauth-access) and use it to generate a new access token once the initial one expires.
     *
     * Note: HubSpot access tokens will fluctuate in size as the information that's encoded in them changes over time. It's recommended to allow for tokens to be up to 300 characters to account for any potential changes.
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
    ): TokenResponseIf {
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
    ): TokenResponseIf {
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
            convert: TokenResponseIf::class,
        );
    }

    /**
     * @api
     *
     * Delete a refresh token, typically after a user uninstalls your app. Access tokens generated with the refresh token will not be affected.
     *
     * This will not uninstall the application from HubSpot or inhibit data syncing between an account and the app.
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
     * Retrieve a refresh token's metadata, including the email address of the user that the token was created for and the ID of the account it's associated with. Learn more about [refresh tokens](https://developers.hubspot.com/docs/guides/api/app-management/oauth-tokens#generate-initial-access-and-refresh-tokens).
     *
     * @throws APIException
     */
    public function get(
        string $token,
        ?RequestOptions $requestOptions = null
    ): RefreshTokenInfoResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['oauth/v1/refresh-tokens/%1$s', $token],
            options: $requestOptions,
            convert: RefreshTokenInfoResponse::class,
        );
    }
}
