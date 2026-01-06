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
 *   appID: int,
 *   expiresIn: int,
 *   hubID: int,
 *   scopes: list<string>,
 *   tokenType: string,
 *   userID: int,
 *   hubDomain?: string|null,
 *   isPrivateDistribution?: bool|null,
 *   signedAccessToken?: SignedAccessToken|null,
 *   user?: string|null,
 * }
 */
final class AccessTokenInfoResponse implements BaseModel
{
    /** @use SdkModel<AccessTokenInfoResponseShape> */
    use SdkModel;

    #[Required]
    public string $token;

    #[Required('app_id')]
    public int $appID;

    #[Required('expires_in')]
    public int $expiresIn;

    #[Required('hub_id')]
    public int $hubID;

    /** @var list<string> $scopes */
    #[Required(list: 'string')]
    public array $scopes;

    #[Required('token_type')]
    public string $tokenType;

    #[Required('user_id')]
    public int $userID;

    #[Optional('hub_domain')]
    public ?string $hubDomain;

    #[Optional('is_private_distribution')]
    public ?bool $isPrivateDistribution;

    #[Optional('signed_access_token')]
    public ?SignedAccessToken $signedAccessToken;

    #[Optional]
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
     * @param SignedAccessToken|array{
     *   appID: int,
     *   expiresAt: int,
     *   hubID: int,
     *   hublet: string,
     *   installingUserID: int,
     *   isPrivateDistribution: bool,
     *   isServiceAccount: bool,
     *   isUserLevel: bool,
     *   newSignature: string,
     *   scopes: string,
     *   scopeToScopeGroupPks: string,
     *   signature: string,
     *   trialScopes: string,
     *   trialScopeToScopeGroupPks: string,
     *   userID: int,
     * } $signedAccessToken
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
        ?bool $isPrivateDistribution = null,
        SignedAccessToken|array|null $signedAccessToken = null,
        ?string $user = null,
    ): self {
        $obj = new self;

        $obj['token'] = $token;
        $obj['appID'] = $appID;
        $obj['expiresIn'] = $expiresIn;
        $obj['hubID'] = $hubID;
        $obj['scopes'] = $scopes;
        $obj['tokenType'] = $tokenType;
        $obj['userID'] = $userID;

        null !== $hubDomain && $obj['hubDomain'] = $hubDomain;
        null !== $isPrivateDistribution && $obj['isPrivateDistribution'] = $isPrivateDistribution;
        null !== $signedAccessToken && $obj['signedAccessToken'] = $signedAccessToken;
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
        $obj['appID'] = $appID;

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

    public function withHubDomain(string $hubDomain): self
    {
        $obj = clone $this;
        $obj['hubDomain'] = $hubDomain;

        return $obj;
    }

    public function withIsPrivateDistribution(bool $isPrivateDistribution): self
    {
        $obj = clone $this;
        $obj['isPrivateDistribution'] = $isPrivateDistribution;

        return $obj;
    }

    /**
     * @param SignedAccessToken|array{
     *   appID: int,
     *   expiresAt: int,
     *   hubID: int,
     *   hublet: string,
     *   installingUserID: int,
     *   isPrivateDistribution: bool,
     *   isServiceAccount: bool,
     *   isUserLevel: bool,
     *   newSignature: string,
     *   scopes: string,
     *   scopeToScopeGroupPks: string,
     *   signature: string,
     *   trialScopes: string,
     *   trialScopeToScopeGroupPks: string,
     *   userID: int,
     * } $signedAccessToken
     */
    public function withSignedAccessToken(
        SignedAccessToken|array $signedAccessToken
    ): self {
        $obj = clone $this;
        $obj['signedAccessToken'] = $signedAccessToken;

        return $obj;
    }

    public function withUser(string $user): self
    {
        $obj = clone $this;
        $obj['user'] = $user;

        return $obj;
    }
}
