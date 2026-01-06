<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Auth\OAuth\OAuthCreateAccessTokenParams\GrantType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Use a [previously obtained refresh token](#get-oauth-2.0-access-and-refresh-tokens) to generate a new access token.
 *
 * Access tokens are short lived. You can check the `expires_in` parameter when generating an access token to determine its lifetime (in seconds). If you need offline access to HubSpot data, store the refresh token you get when [initiating your OAuth integration](https://developers.hubspot.com/docs/guides/api/app-management/oauth-tokens#initiating-oauth-access) and use it to generate a new access token once the initial one expires.
 *
 * Note: HubSpot access tokens will fluctuate in size as the information that's encoded in them changes over time. It's recommended to allow for tokens to be up to 300 characters to account for any potential changes.
 *
 * @see HubspotSDK\Services\Auth\OAuthService::createAccessToken()
 *
 * @phpstan-type OAuthCreateAccessTokenParamsShape = array{
 *   clientSecret?: string,
 *   refreshToken?: string,
 *   clientID?: string,
 *   code?: string,
 *   codeVerifier?: string,
 *   grantType?: GrantType|value-of<GrantType>,
 *   redirectUri?: string,
 *   scope?: string,
 * }
 */
final class OAuthCreateAccessTokenParams implements BaseModel
{
    /** @use SdkModel<OAuthCreateAccessTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional('client_secret')]
    public ?string $clientSecret;

    #[Optional('refresh_token')]
    public ?string $refreshToken;

    #[Optional('client_id')]
    public ?string $clientID;

    #[Optional]
    public ?string $code;

    #[Optional('code_verifier')]
    public ?string $codeVerifier;

    /** @var value-of<GrantType>|null $grantType */
    #[Optional('grant_type', enum: GrantType::class)]
    public ?string $grantType;

    #[Optional('redirect_uri')]
    public ?string $redirectUri;

    #[Optional]
    public ?string $scope;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GrantType|value-of<GrantType> $grantType
     */
    public static function with(
        ?string $clientSecret = null,
        ?string $refreshToken = null,
        ?string $clientID = null,
        ?string $code = null,
        ?string $codeVerifier = null,
        GrantType|string|null $grantType = null,
        ?string $redirectUri = null,
        ?string $scope = null,
    ): self {
        $obj = new self;

        null !== $clientSecret && $obj['clientSecret'] = $clientSecret;
        null !== $refreshToken && $obj['refreshToken'] = $refreshToken;
        null !== $clientID && $obj['clientID'] = $clientID;
        null !== $code && $obj['code'] = $code;
        null !== $codeVerifier && $obj['codeVerifier'] = $codeVerifier;
        null !== $grantType && $obj['grantType'] = $grantType;
        null !== $redirectUri && $obj['redirectUri'] = $redirectUri;
        null !== $scope && $obj['scope'] = $scope;

        return $obj;
    }

    public function withClientSecret(string $clientSecret): self
    {
        $obj = clone $this;
        $obj['clientSecret'] = $clientSecret;

        return $obj;
    }

    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj['refreshToken'] = $refreshToken;

        return $obj;
    }

    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj['clientID'] = $clientID;

        return $obj;
    }

    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    public function withCodeVerifier(string $codeVerifier): self
    {
        $obj = clone $this;
        $obj['codeVerifier'] = $codeVerifier;

        return $obj;
    }

    /**
     * @param GrantType|value-of<GrantType> $grantType
     */
    public function withGrantType(GrantType|string $grantType): self
    {
        $obj = clone $this;
        $obj['grantType'] = $grantType;

        return $obj;
    }

    public function withRedirectUri(string $redirectUri): self
    {
        $obj = clone $this;
        $obj['redirectUri'] = $redirectUri;

        return $obj;
    }

    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj['scope'] = $scope;

        return $obj;
    }
}
