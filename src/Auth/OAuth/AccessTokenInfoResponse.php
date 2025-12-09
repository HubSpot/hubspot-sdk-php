<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AccessTokenInfoResponseShape = array{
 *   token: string,
 *   app_id: int,
 *   expires_in: int,
 *   hub_id: int,
 *   scopes: list<string>,
 *   token_type: string,
 *   user_id: int,
 *   hub_domain?: string|null,
 *   is_private_distribution?: bool|null,
 *   signed_access_token?: SignedAccessToken|null,
 *   user?: string|null,
 * }
 */
final class AccessTokenInfoResponse implements BaseModel
{
    /** @use SdkModel<AccessTokenInfoResponseShape> */
    use SdkModel;

    #[Required]
    public string $token;

    #[Required]
    public int $app_id;

    #[Required]
    public int $expires_in;

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
    public ?bool $is_private_distribution;

    #[Optional]
    public ?SignedAccessToken $signed_access_token;

    #[Optional]
    public ?string $user;

    /**
     * `new AccessTokenInfoResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessTokenInfoResponse::with(
     *   token: ...,
     *   app_id: ...,
     *   expires_in: ...,
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
     * @param SignedAccessToken|array{
     *   appId: int,
     *   expiresAt: int,
     *   hubId: int,
     *   hublet: string,
     *   installingUserId: int,
     *   isPrivateDistribution: bool,
     *   isServiceAccount: bool,
     *   isUserLevel: bool,
     *   newSignature: string,
     *   scopes: string,
     *   scopeToScopeGroupPks: string,
     *   signature: string,
     *   trialScopes: string,
     *   trialScopeToScopeGroupPks: string,
     *   userId: int,
     * } $signed_access_token
     */
    public static function with(
        string $token,
        int $app_id,
        int $expires_in,
        int $hub_id,
        array $scopes,
        string $token_type,
        int $user_id,
        ?string $hub_domain = null,
        ?bool $is_private_distribution = null,
        SignedAccessToken|array|null $signed_access_token = null,
        ?string $user = null,
    ): self {
        $obj = new self;

        $obj['token'] = $token;
        $obj['app_id'] = $app_id;
        $obj['expires_in'] = $expires_in;
        $obj['hub_id'] = $hub_id;
        $obj['scopes'] = $scopes;
        $obj['token_type'] = $token_type;
        $obj['user_id'] = $user_id;

        null !== $hub_domain && $obj['hub_domain'] = $hub_domain;
        null !== $is_private_distribution && $obj['is_private_distribution'] = $is_private_distribution;
        null !== $signed_access_token && $obj['signed_access_token'] = $signed_access_token;
        null !== $user && $obj['user'] = $user;

        return $obj;
    }

    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj['token'] = $token;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['app_id'] = $appID;

        return $obj;
    }

    public function withExpiresIn(int $expiresIn): self
    {
        $obj = clone $this;
        $obj['expires_in'] = $expiresIn;

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

    public function withIsPrivateDistribution(bool $isPrivateDistribution): self
    {
        $obj = clone $this;
        $obj['is_private_distribution'] = $isPrivateDistribution;

        return $obj;
    }

    /**
     * @param SignedAccessToken|array{
     *   appId: int,
     *   expiresAt: int,
     *   hubId: int,
     *   hublet: string,
     *   installingUserId: int,
     *   isPrivateDistribution: bool,
     *   isServiceAccount: bool,
     *   isUserLevel: bool,
     *   newSignature: string,
     *   scopes: string,
     *   scopeToScopeGroupPks: string,
     *   signature: string,
     *   trialScopes: string,
     *   trialScopeToScopeGroupPks: string,
     *   userId: int,
     * } $signedAccessToken
     */
    public function withSignedAccessToken(
        SignedAccessToken|array $signedAccessToken
    ): self {
        $obj = clone $this;
        $obj['signed_access_token'] = $signedAccessToken;

        return $obj;
    }

    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj['user'] = $user;

        return $obj;
    }
}
