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
        $self = new self;

        $self['token'] = $token;
        $self['appID'] = $appID;
        $self['expiresIn'] = $expiresIn;
        $self['hubID'] = $hubID;
        $self['scopes'] = $scopes;
        $self['tokenType'] = $tokenType;
        $self['userID'] = $userID;

        null !== $hubDomain && $self['hubDomain'] = $hubDomain;
        null !== $isPrivateDistribution && $self['isPrivateDistribution'] = $isPrivateDistribution;
        null !== $signedAccessToken && $self['signedAccessToken'] = $signedAccessToken;
        null !== $user && $self['user'] = $user;

        return $self;
    }

    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withExpiresIn(int $expiresIn): self
    {
        $self = clone $this;
        $self['expiresIn'] = $expiresIn;

        return $self;
    }

    public function withHubID(int $hubID): self
    {
        $self = clone $this;
        $self['hubID'] = $hubID;

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

    public function withTokenType(string $tokenType): self
    {
        $self = clone $this;
        $self['tokenType'] = $tokenType;

        return $self;
    }

    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    public function withHubDomain(string $hubDomain): self
    {
        $self = clone $this;
        $self['hubDomain'] = $hubDomain;

        return $self;
    }

    public function withIsPrivateDistribution(bool $isPrivateDistribution): self
    {
        $self = clone $this;
        $self['isPrivateDistribution'] = $isPrivateDistribution;

        return $self;
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
        $self = clone $this;
        $self['signedAccessToken'] = $signedAccessToken;

        return $self;
    }

    public function withUser(string $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
