<?php

declare(strict_types=1);

namespace HubSpotSDK\Auth\OAuth;

use HubSpotSDK\Auth\OAuth\OAuthCreateTokenParams\GrantType;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Authenticates a client and returns access and refresh tokens.
 *
 * @see HubSpotSDK\Services\Auth\OAuthService::createToken()
 *
 * @phpstan-type OAuthCreateTokenParamsShape = array{
 *   clientID?: string|null,
 *   clientSecret?: string|null,
 *   code?: string|null,
 *   codeVerifier?: string|null,
 *   grantType?: null|GrantType|value-of<GrantType>,
 *   redirectUri?: string|null,
 *   refreshToken?: string|null,
 *   scope?: string|null,
 * }
 */
final class OAuthCreateTokenParams implements BaseModel
{
    /** @use SdkModel<OAuthCreateTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional('client_id')]
    public ?string $clientID;

    #[Optional('client_secret')]
    public ?string $clientSecret;

    #[Optional]
    public ?string $code;

    #[Optional('code_verifier')]
    public ?string $codeVerifier;

    /** @var value-of<GrantType>|null $grantType */
    #[Optional('grant_type', enum: GrantType::class)]
    public ?string $grantType;

    #[Optional('redirect_uri')]
    public ?string $redirectUri;

    #[Optional('refresh_token')]
    public ?string $refreshToken;

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
     * @param GrantType|value-of<GrantType>|null $grantType
     */
    public static function with(
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $code = null,
        ?string $codeVerifier = null,
        GrantType|string|null $grantType = null,
        ?string $redirectUri = null,
        ?string $refreshToken = null,
        ?string $scope = null,
    ): self {
        $self = new self;

        null !== $clientID && $self['clientID'] = $clientID;
        null !== $clientSecret && $self['clientSecret'] = $clientSecret;
        null !== $code && $self['code'] = $code;
        null !== $codeVerifier && $self['codeVerifier'] = $codeVerifier;
        null !== $grantType && $self['grantType'] = $grantType;
        null !== $redirectUri && $self['redirectUri'] = $redirectUri;
        null !== $refreshToken && $self['refreshToken'] = $refreshToken;
        null !== $scope && $self['scope'] = $scope;

        return $self;
    }

    public function withClientID(string $clientID): self
    {
        $self = clone $this;
        $self['clientID'] = $clientID;

        return $self;
    }

    public function withClientSecret(string $clientSecret): self
    {
        $self = clone $this;
        $self['clientSecret'] = $clientSecret;

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

    public function withRefreshToken(string $refreshToken): self
    {
        $self = clone $this;
        $self['refreshToken'] = $refreshToken;

        return $self;
    }

    public function withScope(string $scope): self
    {
        $self = clone $this;
        $self['scope'] = $scope;

        return $self;
    }
}
