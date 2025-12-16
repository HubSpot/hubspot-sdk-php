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
 *   clientSecret?: string|null,
 *   refreshToken?: string|null,
 *   clientID?: string|null,
 *   code?: string|null,
 *   codeVerifier?: string|null,
 *   grantType?: null|GrantType|value-of<GrantType>,
 *   redirectUri?: string|null,
 *   scope?: string|null,
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
        $self = new self;

        null !== $clientSecret && $self['clientSecret'] = $clientSecret;
        null !== $refreshToken && $self['refreshToken'] = $refreshToken;
        null !== $clientID && $self['clientID'] = $clientID;
        null !== $code && $self['code'] = $code;
        null !== $codeVerifier && $self['codeVerifier'] = $codeVerifier;
        null !== $grantType && $self['grantType'] = $grantType;
        null !== $redirectUri && $self['redirectUri'] = $redirectUri;
        null !== $scope && $self['scope'] = $scope;

        return $self;
    }

    public function withClientSecret(string $clientSecret): self
    {
        $self = clone $this;
        $self['clientSecret'] = $clientSecret;

        return $self;
    }

    public function withRefreshToken(string $refreshToken): self
    {
        $self = clone $this;
        $self['refreshToken'] = $refreshToken;

        return $self;
    }

    public function withClientID(string $clientID): self
    {
        $self = clone $this;
        $self['clientID'] = $clientID;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withCodeVerifier(string $codeVerifier): self
    {
        $self = clone $this;
        $self['codeVerifier'] = $codeVerifier;

        return $self;
    }

    /**
     * @param GrantType|value-of<GrantType> $grantType
     */
    public function withGrantType(GrantType|string $grantType): self
    {
        $self = clone $this;
        $self['grantType'] = $grantType;

        return $self;
    }

    public function withRedirectUri(string $redirectUri): self
    {
        $self = clone $this;
        $self['redirectUri'] = $redirectUri;

        return $self;
    }

    public function withScope(string $scope): self
    {
        $self = clone $this;
        $self['scope'] = $scope;

        return $self;
    }
}
