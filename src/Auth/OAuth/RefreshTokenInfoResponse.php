<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type RefreshTokenInfoResponseShape = array{
 *   token: string,
 *   clientID: string,
 *   hubID: int,
 *   scopes: list<string>,
 *   tokenType: string,
 *   userID: int,
 *   hubDomain?: string,
 *   user?: string,
 * }
 */
final class RefreshTokenInfoResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RefreshTokenInfoResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $token;

    #[Api('client_id')]
    public string $clientID;

    #[Api('hub_id')]
    public int $hubID;

    /** @var list<string> $scopes */
    #[Api(list: 'string')]
    public array $scopes;

    #[Api('token_type')]
    public string $tokenType;

    #[Api('user_id')]
    public int $userID;

    #[Api('hub_domain', optional: true)]
    public ?string $hubDomain;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->token = $token;
        $obj->clientID = $clientID;
        $obj->hubID = $hubID;
        $obj->scopes = $scopes;
        $obj->tokenType = $tokenType;
        $obj->userID = $userID;

        null !== $hubDomain && $obj->hubDomain = $hubDomain;
        null !== $user && $obj->user = $user;

        return $obj;
    }

    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj->token = $token;

        return $obj;
    }

    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->clientID = $clientID;

        return $obj;
    }

    public function withHubID(int $hubID): self
    {
        $obj = clone $this;
        $obj->hubID = $hubID;

        return $obj;
    }

    /**
     * @param list<string> $scopes
     */
    public function withScopes(array $scopes): self
    {
        $obj = clone $this;
        $obj->scopes = $scopes;

        return $obj;
    }

    public function withTokenType(string $tokenType): self
    {
        $obj = clone $this;
        $obj->tokenType = $tokenType;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    public function withHubDomain(string $hubDomain): self
    {
        $obj = clone $this;
        $obj->hubDomain = $hubDomain;

        return $obj;
    }

    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }
}
