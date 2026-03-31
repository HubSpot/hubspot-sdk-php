<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Auth\OAuth\PublicAccessTokenInfoResponse\TokenUse;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SignedAccessTokenShape from \HubspotSDK\Auth\OAuth\SignedAccessToken
 *
 * @phpstan-type PublicAccessTokenInfoResponseShape = array{
 *   token: string,
 *   active: bool,
 *   appID: int,
 *   clientID: string,
 *   expiresIn: int,
 *   hubID: int,
 *   isPrivateDistribution: bool,
 *   scopes: list<string>,
 *   signedAccessToken: SignedAccessToken|SignedAccessTokenShape,
 *   tokenType: string,
 *   tokenUse: TokenUse|value-of<TokenUse>,
 *   userID: int,
 *   hubDomain?: string|null,
 *   user?: string|null,
 * }
 */
final class PublicAccessTokenInfoResponse implements BaseModel
{
    /** @use SdkModel<PublicAccessTokenInfoResponseShape> */
    use SdkModel;

    #[Required]
    public string $token;

    #[Required]
    public bool $active;

    #[Required('app_id')]
    public int $appID;

    #[Required('client_id')]
    public string $clientID;

    #[Required('expires_in')]
    public int $expiresIn;

    #[Required('hub_id')]
    public int $hubID;

    #[Required('is_private_distribution')]
    public bool $isPrivateDistribution;

    /** @var list<string> $scopes */
    #[Required(list: 'string')]
    public array $scopes;

    #[Required('signed_access_token')]
    public SignedAccessToken $signedAccessToken;

    #[Required('token_type')]
    public string $tokenType;

    /** @var value-of<TokenUse> $tokenUse */
    #[Required('token_use', enum: TokenUse::class)]
    public string $tokenUse;

    #[Required('user_id')]
    public int $userID;

    #[Optional('hub_domain')]
    public ?string $hubDomain;

    #[Optional]
    public ?string $user;

    /**
     * `new PublicAccessTokenInfoResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAccessTokenInfoResponse::with(
     *   token: ...,
     *   active: ...,
     *   appID: ...,
     *   clientID: ...,
     *   expiresIn: ...,
     *   hubID: ...,
     *   isPrivateDistribution: ...,
     *   scopes: ...,
     *   signedAccessToken: ...,
     *   tokenType: ...,
     *   tokenUse: ...,
     *   userID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAccessTokenInfoResponse)
     *   ->withToken(...)
     *   ->withActive(...)
     *   ->withAppID(...)
     *   ->withClientID(...)
     *   ->withExpiresIn(...)
     *   ->withHubID(...)
     *   ->withIsPrivateDistribution(...)
     *   ->withScopes(...)
     *   ->withSignedAccessToken(...)
     *   ->withTokenType(...)
     *   ->withTokenUse(...)
     *   ->withUserID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $scopes
     * @param SignedAccessToken|SignedAccessTokenShape $signedAccessToken
     * @param TokenUse|value-of<TokenUse> $tokenUse
     */
    public static function with(
        string $token,
        bool $active,
        int $appID,
        string $clientID,
        int $expiresIn,
        int $hubID,
        bool $isPrivateDistribution,
        array $scopes,
        SignedAccessToken|array $signedAccessToken,
        string $tokenType,
        int $userID,
        TokenUse|string $tokenUse = 'access_token',
        ?string $hubDomain = null,
        ?string $user = null,
    ): self {
        $self = new self;

        $self['token'] = $token;
        $self['active'] = $active;
        $self['appID'] = $appID;
        $self['clientID'] = $clientID;
        $self['expiresIn'] = $expiresIn;
        $self['hubID'] = $hubID;
        $self['isPrivateDistribution'] = $isPrivateDistribution;
        $self['scopes'] = $scopes;
        $self['signedAccessToken'] = $signedAccessToken;
        $self['tokenType'] = $tokenType;
        $self['tokenUse'] = $tokenUse;
        $self['userID'] = $userID;

        null !== $hubDomain && $self['hubDomain'] = $hubDomain;
        null !== $user && $self['user'] = $user;

        return $self;
    }

    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }

    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withClientID(string $clientID): self
    {
        $self = clone $this;
        $self['clientID'] = $clientID;

        return $self;
    }

    public function withExpiresIn(int $expiresIn): self
    {
        $self = clone $this;
        $self['expiresIn'] = $expiresIn;

        return $self;
    }

    public function withHubID(int $hubID): self
    {
        $self = clone $this;
        $self['hubID'] = $hubID;

        return $self;
    }

    public function withIsPrivateDistribution(bool $isPrivateDistribution): self
    {
        $self = clone $this;
        $self['isPrivateDistribution'] = $isPrivateDistribution;

        return $self;
    }

    /**
     * @param list<string> $scopes
     */
    public function withScopes(array $scopes): self
    {
        $self = clone $this;
        $self['scopes'] = $scopes;

        return $self;
    }

    /**
     * @param SignedAccessToken|SignedAccessTokenShape $signedAccessToken
     */
    public function withSignedAccessToken(
        SignedAccessToken|array $signedAccessToken
    ): self {
        $self = clone $this;
        $self['signedAccessToken'] = $signedAccessToken;

        return $self;
    }

    public function withTokenType(string $tokenType): self
    {
        $self = clone $this;
        $self['tokenType'] = $tokenType;

        return $self;
    }

    /**
     * @param TokenUse|value-of<TokenUse> $tokenUse
     */
    public function withTokenUse(TokenUse|string $tokenUse): self
    {
        $self = clone $this;
        $self['tokenUse'] = $tokenUse;

        return $self;
    }

    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    public function withHubDomain(string $hubDomain): self
    {
        $self = clone $this;
        $self['hubDomain'] = $hubDomain;

        return $self;
    }

    public function withUser(string $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
