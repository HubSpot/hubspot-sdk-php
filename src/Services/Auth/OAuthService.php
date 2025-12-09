<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Auth;

use HubspotSDK\Auth\OAuth\AccessTokenInfoResponse;
use HubspotSDK\Auth\OAuth\OAuthCreateAccessTokenParams\GrantType;
use HubspotSDK\Auth\OAuth\RefreshTokenInfoResponse;
use HubspotSDK\Auth\OAuth\TokenResponseIf;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Auth\OAuthContract;

final class OAuthService implements OAuthContract
{
    /**
     * @api
     */
    public OAuthRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OAuthRawService($client);
    }

    /**
     * @api
     *
     * Use a [previously obtained refresh token](#get-oauth-2.0-access-and-refresh-tokens) to generate a new access token.
     *
     * Access tokens are short lived. You can check the `expires_in` parameter when generating an access token to determine its lifetime (in seconds). If you need offline access to HubSpot data, store the refresh token you get when [initiating your OAuth integration](https://developers.hubspot.com/docs/guides/api/app-management/oauth-tokens#initiating-oauth-access) and use it to generate a new access token once the initial one expires.
     *
     * Note: HubSpot access tokens will fluctuate in size as the information that's encoded in them changes over time. It's recommended to allow for tokens to be up to 300 characters to account for any potential changes.
     *
     * @param string $clientSecret Body param:
     * @param string $refreshToken Body param:
     * @param string $clientID Body param:
     * @param string $code Body param:
     * @param string $codeVerifier Body param:
     * @param 'authorization_code'|'client_credentials'|'refresh_token'|GrantType $grantType Body param:
     * @param string $redirectUri Body param:
     * @param string $scope Body param:
     *
     * @throws APIException
     */
    public function createAccessToken(
        ?string $clientSecret = null,
        ?string $refreshToken = null,
        ?string $clientID = null,
        ?string $code = null,
        ?string $codeVerifier = null,
        string|GrantType|null $grantType = null,
        ?string $redirectUri = null,
        ?string $scope = null,
        ?RequestOptions $requestOptions = null,
    ): TokenResponseIf {
        $params = [
            'clientSecret' => $clientSecret,
            'refreshToken' => $refreshToken,
            'clientID' => $clientID,
            'code' => $code,
            'codeVerifier' => $codeVerifier,
            'grantType' => $grantType,
            'redirectUri' => $redirectUri,
            'scope' => $scope,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createAccessToken(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function deleteRefreshToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteRefreshToken($token, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function getAccessToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): AccessTokenInfoResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAccessToken($token, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function getRefreshToken(
        string $token,
        ?RequestOptions $requestOptions = null
    ): RefreshTokenInfoResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getRefreshToken($token, requestOptions: $requestOptions);

        return $response->parse();
    }
}
