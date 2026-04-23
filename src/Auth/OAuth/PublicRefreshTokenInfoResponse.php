<?php

declare(strict_types=1);

namespace HubSpotSDK\Auth\OAuth;

use HubSpotSDK\Auth\OAuth\PublicRefreshTokenInfoResponse\TokenUse;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicRefreshTokenInfoResponseShape = array{
 *   token: string,
 *   active: bool,
 *   appID: int,
 *   clientID: string,
 *   hubID: int,
 *   scopes: list<string>,
 *   tokenType: string,
 *   tokenUse: TokenUse|value-of<TokenUse>,
 *   userID: int,
 *   hubDomain?: string|null,
 *   user?: string|null,
 * }
 */
final class PublicRefreshTokenInfoResponse implements BaseModel
{
    /** @use SdkModel<PublicRefreshTokenInfoResponseShape> */
    use SdkModel;

    #[Required]
    public string $token;

    #[Required]
    public bool $active;

    #[Required('app_id')]
    public int $appID;

    #[Required('client_id')]
    public string $clientID;

    #[Required('hub_id')]
    public int $hubID;

    /** @var list<string> $scopes */
    #[Required(list: 'string')]
    public array $scopes;

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
     * `new PublicRefreshTokenInfoResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicRefreshTokenInfoResponse::with(
     *   token: ...,
     *   active: ...,
     *   appID: ...,
     *   clientID: ...,
     *   hubID: ...,
     *   scopes: ...,
     *   tokenType: ...,
     *   tokenUse: ...,
     *   userID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicRefreshTokenInfoResponse)
     *   ->withToken(...)
     *   ->withActive(...)
     *   ->withAppID(...)
     *   ->withClientID(...)
     *   ->withHubID(...)
     *   ->withScopes(...)
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
     * @param TokenUse|value-of<TokenUse> $tokenUse
     */
    public static function with(
        string $token,
        bool $active,
        int $appID,
        string $clientID,
        int $hubID,
        array $scopes,
        string $tokenType,
        int $userID,
        TokenUse|string $tokenUse = 'refresh_token',
        ?string $hubDomain = null,
        ?string $user = null,
    ): self {
        $self = new self;

        $self['token'] = $token;
        $self['active'] = $active;
        $self['appID'] = $appID;
        $self['clientID'] = $clientID;
        $self['hubID'] = $hubID;
        $self['scopes'] = $scopes;
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

    public function withHubID(int $hubID): self
    {
        $self = clone $this;
        $self['hubID'] = $hubID;

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
