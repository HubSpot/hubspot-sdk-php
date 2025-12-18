<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type TokenResponseIfShape = array{
 *   accessToken?: string|null,
 *   expiresIn?: int|null,
 *   hubID?: int|null,
 *   idToken?: string|null,
 *   scopes?: list<string>|null,
 *   tokenType?: string|null,
 *   userID?: int|null,
 * }
 */
final class TokenResponseIf implements BaseModel
{
    /** @use SdkModel<TokenResponseIfShape> */
    use SdkModel;

    #[Optional]
    public ?string $accessToken;

    #[Optional]
    public ?int $expiresIn;

    #[Optional('hubId')]
    public ?int $hubID;

    #[Optional]
    public ?string $idToken;

    /** @var list<string>|null $scopes */
    #[Optional(list: 'string')]
    public ?array $scopes;

    #[Optional]
    public ?string $tokenType;

    #[Optional('userId')]
    public ?int $userID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $scopes
     */
    public static function with(
        ?string $accessToken = null,
        ?int $expiresIn = null,
        ?int $hubID = null,
        ?string $idToken = null,
        ?array $scopes = null,
        ?string $tokenType = null,
        ?int $userID = null,
    ): self {
        $self = new self;

        null !== $accessToken && $self['accessToken'] = $accessToken;
        null !== $expiresIn && $self['expiresIn'] = $expiresIn;
        null !== $hubID && $self['hubID'] = $hubID;
        null !== $idToken && $self['idToken'] = $idToken;
        null !== $scopes && $self['scopes'] = $scopes;
        null !== $tokenType && $self['tokenType'] = $tokenType;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    public function withAccessToken(string $accessToken): self
    {
        $self = clone $this;
        $self['accessToken'] = $accessToken;

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

    public function withIDToken(string $idToken): self
    {
        $self = clone $this;
        $self['idToken'] = $idToken;

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
}
