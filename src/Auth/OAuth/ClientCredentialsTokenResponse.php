<?php

declare(strict_types=1);

namespace HubSpotSDK\Auth\OAuth;

use HubSpotSDK\Auth\OAuth\ClientCredentialsTokenResponse\TokenUse;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ClientCredentialsTokenResponseShape = array{
 *   accessToken: string,
 *   expiresIn: int,
 *   tokenType: string,
 *   tokenUse: TokenUse|value-of<TokenUse>,
 *   hubID?: int|null,
 *   idToken?: string|null,
 *   scopes?: list<string>|null,
 *   userID?: int|null,
 * }
 */
final class ClientCredentialsTokenResponse implements BaseModel
{
    /** @use SdkModel<ClientCredentialsTokenResponseShape> */
    use SdkModel;

    #[Required('access_token')]
    public string $accessToken;

    #[Required('expires_in')]
    public int $expiresIn;

    #[Required('token_type')]
    public string $tokenType;

    /** @var value-of<TokenUse> $tokenUse */
    #[Required('token_use', enum: TokenUse::class)]
    public string $tokenUse;

    #[Optional('hub_id')]
    public ?int $hubID;

    #[Optional('id_token')]
    public ?string $idToken;

    /** @var list<string>|null $scopes */
    #[Optional(list: 'string')]
    public ?array $scopes;

    #[Optional('user_id')]
    public ?int $userID;

    /**
     * `new ClientCredentialsTokenResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClientCredentialsTokenResponse::with(
     *   accessToken: ..., expiresIn: ..., tokenType: ..., tokenUse: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClientCredentialsTokenResponse)
     *   ->withAccessToken(...)
     *   ->withExpiresIn(...)
     *   ->withTokenType(...)
     *   ->withTokenUse(...)
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
     * @param TokenUse|value-of<TokenUse> $tokenUse
     * @param list<string>|null $scopes
     */
    public static function with(
        string $accessToken,
        int $expiresIn,
        string $tokenType,
        TokenUse|string $tokenUse = 'client_credentials',
        ?int $hubID = null,
        ?string $idToken = null,
        ?array $scopes = null,
        ?int $userID = null,
    ): self {
        $self = new self;

        $self['accessToken'] = $accessToken;
        $self['expiresIn'] = $expiresIn;
        $self['tokenType'] = $tokenType;
        $self['tokenUse'] = $tokenUse;

        null !== $hubID && $self['hubID'] = $hubID;
        null !== $idToken && $self['idToken'] = $idToken;
        null !== $scopes && $self['scopes'] = $scopes;
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

    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
