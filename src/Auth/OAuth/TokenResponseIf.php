<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type TokenResponseIfShape = array{
 *   access_token: string,
 *   expires_in: int,
 *   refresh_token: string,
 *   token_type: string,
 *   id_token?: string|null,
 * }
 */
final class TokenResponseIf implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TokenResponseIfShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $access_token;

    #[Api]
    public int $expires_in;

    #[Api]
    public string $refresh_token;

    #[Api]
    public string $token_type;

    #[Api(optional: true)]
    public ?string $id_token;

    /**
     * `new TokenResponseIf()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenResponseIf::with(
     *   access_token: ..., expires_in: ..., refresh_token: ..., token_type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenResponseIf)
     *   ->withAccessToken(...)
     *   ->withExpiresIn(...)
     *   ->withRefreshToken(...)
     *   ->withTokenType(...)
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
     */
    public static function with(
        string $access_token,
        int $expires_in,
        string $refresh_token,
        string $token_type,
        ?string $id_token = null,
    ): self {
        $obj = new self;

        $obj->access_token = $access_token;
        $obj->expires_in = $expires_in;
        $obj->refresh_token = $refresh_token;
        $obj->token_type = $token_type;

        null !== $id_token && $obj->id_token = $id_token;

        return $obj;
    }

    public function withAccessToken(string $accessToken): self
    {
        $obj = clone $this;
        $obj->access_token = $accessToken;

        return $obj;
    }

    public function withExpiresIn(int $expiresIn): self
    {
        $obj = clone $this;
        $obj->expires_in = $expiresIn;

        return $obj;
    }

    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj->refresh_token = $refreshToken;

        return $obj;
    }

    public function withTokenType(string $tokenType): self
    {
        $obj = clone $this;
        $obj->token_type = $tokenType;

        return $obj;
    }

    public function withIDToken(string $idToken): self
    {
        $obj = clone $this;
        $obj->id_token = $idToken;

        return $obj;
    }
}
