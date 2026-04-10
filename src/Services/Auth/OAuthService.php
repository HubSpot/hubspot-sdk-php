<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Auth;

use HubSpotSDK\Auth\OAuth\OAuthCreateTokenParams\GrantType;
use HubSpotSDK\Auth\OAuth\PublicAccessTokenInfoResponse;
use HubSpotSDK\Auth\OAuth\PublicRefreshTokenInfoResponse;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Auth\OAuthContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
     * Authenticates a client and returns access and refresh tokens.
     *
     * @param GrantType|value-of<GrantType> $grantType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createToken(
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $code = null,
        ?string $codeVerifier = null,
        GrantType|string|null $grantType = null,
        ?string $redirectUri = null,
        ?string $refreshToken = null,
        ?string $scope = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'clientID' => $clientID,
                'clientSecret' => $clientSecret,
                'code' => $code,
                'codeVerifier' => $codeVerifier,
                'grantType' => $grantType,
                'redirectUri' => $redirectUri,
                'refreshToken' => $refreshToken,
                'scope' => $scope,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createToken(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns validity and metadata for access and refresh tokens.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function introspectToken(
        ?string $token = null,
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $tokenTypeHint = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicAccessTokenInfoResponse|PublicRefreshTokenInfoResponse {
        $params = Util::removeNulls(
            [
                'token' => $token,
                'clientID' => $clientID,
                'clientSecret' => $clientSecret,
                'tokenTypeHint' => $tokenTypeHint,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->introspectToken(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes/Revokes provided Refresh Token
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function revokeToken(
        ?string $token = null,
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $tokenTypeHint = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'token' => $token,
                'clientID' => $clientID,
                'clientSecret' => $clientSecret,
                'tokenTypeHint' => $tokenTypeHint,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->revokeToken(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
