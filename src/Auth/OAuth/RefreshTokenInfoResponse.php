<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RefreshTokenInfoResponseShape = array{
 *   token: string,
 *   clientID: string,
 *   hubID: int,
 *   scopes: list<string>,
 *   tokenType: string,
 *   userID: int,
 *   hubDomain?: string|null,
 *   user?: string|null,
 * }
 */
final class RefreshTokenInfoResponse implements BaseModel
{
    /** @use SdkModel<RefreshTokenInfoResponseShape> */
    use SdkModel;

    #[Required]
    public string $token;

    #[Required('client_id')]
    public string $clientID;

    #[Required('hub_id')]
    public int $hubID;

    /** @var list<string> $scopes */
    #[Required(list: 'string')]
    public array $scopes;

    #[Required('token_type')]
    public string $tokenType;

    #[Required('user_id')]
    public int $userID;

    #[Optional('hub_domain')]
    public ?string $hubDomain;

    #[Optional]
    public ?string $user;

    /**
     * `new RefreshTokenInfoResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RefreshTokenInfoResponse::with(
     *   token: ...,
     *   clientID: ...,
     *   hubID: ...,
     *   scopes: ...,
     *   tokenType: ...,
     *   userID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RefreshTokenInfoResponse)
     *   ->withToken(...)
     *   ->withClientID(...)
     *   ->withHubID(...)
     *   ->withScopes(...)
     *   ->withTokenType(...)
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
     */
    public static function with(
        string $token,
        string $clientID,
        int $hubID,
        array $scopes,
        string $tokenType,
        int $userID,
        ?string $hubDomain = null,
        ?string $user = null,
    ): self {
        $self = new self;

        $self['token'] = $token;
        $self['clientID'] = $clientID;
        $self['hubID'] = $hubID;
        $self['scopes'] = $scopes;
        $self['tokenType'] = $tokenType;
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
