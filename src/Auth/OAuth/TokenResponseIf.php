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
     * @param list<string> $scopes
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
        $obj = new self;

        null !== $accessToken && $obj['accessToken'] = $accessToken;
        null !== $expiresIn && $obj['expiresIn'] = $expiresIn;
        null !== $hubID && $obj['hubID'] = $hubID;
        null !== $idToken && $obj['idToken'] = $idToken;
        null !== $scopes && $obj['scopes'] = $scopes;
        null !== $tokenType && $obj['tokenType'] = $tokenType;
        null !== $userID && $obj['userID'] = $userID;

        return $obj;
    }

    public function withAccessToken(string $accessToken): self
    {
        $obj = clone $this;
        $obj['accessToken'] = $accessToken;

        return $obj;
    }

    public function withExpiresIn(int $expiresIn): self
    {
        $obj = clone $this;
        $obj['expiresIn'] = $expiresIn;

        return $obj;
    }

    public function withHubID(int $hubID): self
    {
        $obj = clone $this;
        $obj['hubID'] = $hubID;

        return $obj;
    }

    public function withIDToken(string $idToken): self
    {
        $obj = clone $this;
        $obj['idToken'] = $idToken;

        return $obj;
    }

    /**
     * @param list<string> $scopes
     */
    public function withScopes(array $scopes): self
    {
        $obj = clone $this;
        $obj['scopes'] = $scopes;

        return $obj;
    }

    public function withTokenType(string $tokenType): self
    {
        $obj = clone $this;
        $obj['tokenType'] = $tokenType;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }
}
