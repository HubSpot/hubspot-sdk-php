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
 *   client_id: string,
 *   hub_id: int,
 *   scopes: list<string>,
 *   token_type: string,
 *   user_id: int,
 *   hub_domain?: string|null,
 *   user?: string|null,
 * }
 */
final class RefreshTokenInfoResponse implements BaseModel
{
    /** @use SdkModel<RefreshTokenInfoResponseShape> */
    use SdkModel;

    #[Required]
    public string $token;

    #[Required]
    public string $client_id;

    #[Required]
    public int $hub_id;

    /** @var list<string> $scopes */
    #[Required(list: 'string')]
    public array $scopes;

    #[Required]
    public string $token_type;

    #[Required]
    public int $user_id;

    #[Optional]
    public ?string $hub_domain;

    #[Optional]
    public ?string $user;

    /**
     * `new RefreshTokenInfoResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RefreshTokenInfoResponse::with(
     *   token: ...,
     *   client_id: ...,
     *   hub_id: ...,
     *   scopes: ...,
     *   token_type: ...,
     *   user_id: ...,
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
        string $client_id,
        int $hub_id,
        array $scopes,
        string $token_type,
        int $user_id,
        ?string $hub_domain = null,
        ?string $user = null,
    ): self {
        $obj = new self;

        $obj['token'] = $token;
        $obj['client_id'] = $client_id;
        $obj['hub_id'] = $hub_id;
        $obj['scopes'] = $scopes;
        $obj['token_type'] = $token_type;
        $obj['user_id'] = $user_id;

        null !== $hub_domain && $obj['hub_domain'] = $hub_domain;
        null !== $user && $obj['user'] = $user;

        return $obj;
    }

    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj['token'] = $token;

        return $obj;
    }

    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj['client_id'] = $clientID;

        return $obj;
    }

    public function withHubID(int $hubID): self
    {
        $obj = clone $this;
        $obj['hub_id'] = $hubID;

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
        $obj['token_type'] = $tokenType;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }

    public function withHubDomain(string $hubDomain): self
    {
        $obj = clone $this;
        $obj['hub_domain'] = $hubDomain;

        return $obj;
    }

    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj['user'] = $user;

        return $obj;
    }
}
