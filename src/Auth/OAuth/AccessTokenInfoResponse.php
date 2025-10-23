<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type access_token_info_response = array{
 *   token: string,
 *   appID: int,
 *   expiresIn: int,
 *   hubID: int,
 *   scopes: list<string>,
 *   tokenType: string,
 *   userID: int,
 *   hubDomain?: string,
 *   user?: string,
 * }
 */
final class AccessTokenInfoResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<access_token_info_response> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $token;

    #[Api('app_id')]
    public int $appID;

    #[Api('expires_in')]
    public int $expiresIn;

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
     * `new AccessTokenInfoResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessTokenInfoResponse::with(
     *   token: ...,
     *   appID: ...,
     *   expiresIn: ...,
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
     * (new AccessTokenInfoResponse)
     *   ->withToken(...)
     *   ->withAppID(...)
     *   ->withExpiresIn(...)
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
        int $appID,
        int $expiresIn,
        int $hubID,
        array $scopes,
        string $tokenType,
        int $userID,
        ?string $hubDomain = null,
        ?string $user = null,
    ): self {
        $obj = new self;

        $obj->token = $token;
        $obj->appID = $appID;
        $obj->expiresIn = $expiresIn;
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

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withExpiresIn(int $expiresIn): self
    {
        $obj = clone $this;
        $obj->expiresIn = $expiresIn;

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
