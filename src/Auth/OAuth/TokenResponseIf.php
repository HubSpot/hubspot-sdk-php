<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type TokenResponseIfShape = array{
 *   accessToken?: string|null,
 *   expiresIn?: int|null,
 *   hubId?: int|null,
 *   idToken?: string|null,
 *   scopes?: list<string>|null,
 *   tokenType?: string|null,
 *   userId?: int|null,
 * }
 */
final class TokenResponseIf implements BaseModel
{
    /** @use SdkModel<TokenResponseIfShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $accessToken;

    #[Api(optional: true)]
    public ?int $expiresIn;

    #[Api(optional: true)]
    public ?int $hubId;

    #[Api(optional: true)]
    public ?string $idToken;

    /** @var list<string>|null $scopes */
    #[Api(list: 'string', optional: true)]
    public ?array $scopes;

    #[Api(optional: true)]
    public ?string $tokenType;

    #[Api(optional: true)]
    public ?int $userId;

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
        ?int $hubId = null,
        ?string $idToken = null,
        ?array $scopes = null,
        ?string $tokenType = null,
        ?int $userId = null,
    ): self {
        $obj = new self;

        null !== $accessToken && $obj['accessToken'] = $accessToken;
        null !== $expiresIn && $obj['expiresIn'] = $expiresIn;
        null !== $hubId && $obj['hubId'] = $hubId;
        null !== $idToken && $obj['idToken'] = $idToken;
        null !== $scopes && $obj['scopes'] = $scopes;
        null !== $tokenType && $obj['tokenType'] = $tokenType;
        null !== $userId && $obj['userId'] = $userId;

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
        $obj['hubId'] = $hubID;

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
        $obj['userId'] = $userID;

        return $obj;
    }
}
