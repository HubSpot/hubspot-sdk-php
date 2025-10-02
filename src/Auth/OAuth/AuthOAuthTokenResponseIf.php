<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type auth_oauth_token_response_if = array{
 *   accessToken: string,
 *   expiresIn: int,
 *   refreshToken: string,
 *   tokenType: string,
 *   idToken?: string,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class AuthOAuthTokenResponseIf implements BaseModel
{
    /** @use SdkModel<auth_oauth_token_response_if> */
    use SdkModel;

    #[Api('access_token')]
    public string $accessToken;

    #[Api('expires_in')]
    public int $expiresIn;

    #[Api('refresh_token')]
    public string $refreshToken;

    #[Api('token_type')]
    public string $tokenType;

    #[Api('id_token', optional: true)]
    public ?string $idToken;

    /**
     * `new AuthOAuthTokenResponseIf()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthOAuthTokenResponseIf::with(
     *   accessToken: ..., expiresIn: ..., refreshToken: ..., tokenType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthOAuthTokenResponseIf)
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
        string $accessToken,
        int $expiresIn,
        string $refreshToken,
        string $tokenType,
        ?string $idToken = null,
    ): self {
        $obj = new self;

        $obj->accessToken = $accessToken;
        $obj->expiresIn = $expiresIn;
        $obj->refreshToken = $refreshToken;
        $obj->tokenType = $tokenType;

        null !== $idToken && $obj->idToken = $idToken;

        return $obj;
    }

    public function withAccessToken(string $accessToken): self
    {
        $obj = clone $this;
        $obj->accessToken = $accessToken;

        return $obj;
    }

    public function withExpiresIn(int $expiresIn): self
    {
        $obj = clone $this;
        $obj->expiresIn = $expiresIn;

        return $obj;
    }

    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj->refreshToken = $refreshToken;

        return $obj;
    }

    public function withTokenType(string $tokenType): self
    {
        $obj = clone $this;
        $obj->tokenType = $tokenType;

        return $obj;
    }

    public function withIDToken(string $idToken): self
    {
        $obj = clone $this;
        $obj->idToken = $idToken;

        return $obj;
    }
}
