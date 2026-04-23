<?php

declare(strict_types=1);

namespace HubSpotSDK\Auth\OAuth;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SignedAccessTokenShape = array{
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
 * }
 */
final class SignedAccessToken implements BaseModel
{
    /** @use SdkModel<SignedAccessTokenShape> */
    use SdkModel;

    #[Required('appId')]
    public int $appID;

    #[Required]
    public int $expiresAt;

    #[Required('hubId')]
    public int $hubID;

    #[Required]
    public string $hublet;

    #[Required('installingUserId')]
    public int $installingUserID;

    #[Required]
    public bool $isPrivateDistribution;

    #[Required]
    public bool $isServiceAccount;

    #[Required]
    public bool $isUserLevel;

    #[Required]
    public string $newSignature;

    #[Required]
    public string $scopes;

    #[Required]
    public string $scopeToScopeGroupPks;

    #[Required]
    public string $signature;

    #[Required]
    public string $trialScopes;

    #[Required]
    public string $trialScopeToScopeGroupPks;

    #[Required('userId')]
    public int $userID;

    /**
     * `new SignedAccessToken()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SignedAccessToken::with(
     *   appID: ...,
     *   expiresAt: ...,
     *   hubID: ...,
     *   hublet: ...,
     *   installingUserID: ...,
     *   isPrivateDistribution: ...,
     *   isServiceAccount: ...,
     *   isUserLevel: ...,
     *   newSignature: ...,
     *   scopes: ...,
     *   scopeToScopeGroupPks: ...,
     *   signature: ...,
     *   trialScopes: ...,
     *   trialScopeToScopeGroupPks: ...,
     *   userID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SignedAccessToken)
     *   ->withAppID(...)
     *   ->withExpiresAt(...)
     *   ->withHubID(...)
     *   ->withHublet(...)
     *   ->withInstallingUserID(...)
     *   ->withIsPrivateDistribution(...)
     *   ->withIsServiceAccount(...)
     *   ->withIsUserLevel(...)
     *   ->withNewSignature(...)
     *   ->withScopes(...)
     *   ->withScopeToScopeGroupPks(...)
     *   ->withSignature(...)
     *   ->withTrialScopes(...)
     *   ->withTrialScopeToScopeGroupPks(...)
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
     */
    public static function with(
        int $appID,
        int $expiresAt,
        int $hubID,
        string $hublet,
        int $installingUserID,
        bool $isPrivateDistribution,
        bool $isServiceAccount,
        bool $isUserLevel,
        string $newSignature,
        string $scopes,
        string $scopeToScopeGroupPks,
        string $signature,
        string $trialScopes,
        string $trialScopeToScopeGroupPks,
        int $userID,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['expiresAt'] = $expiresAt;
        $self['hubID'] = $hubID;
        $self['hublet'] = $hublet;
        $self['installingUserID'] = $installingUserID;
        $self['isPrivateDistribution'] = $isPrivateDistribution;
        $self['isServiceAccount'] = $isServiceAccount;
        $self['isUserLevel'] = $isUserLevel;
        $self['newSignature'] = $newSignature;
        $self['scopes'] = $scopes;
        $self['scopeToScopeGroupPks'] = $scopeToScopeGroupPks;
        $self['signature'] = $signature;
        $self['trialScopes'] = $trialScopes;
        $self['trialScopeToScopeGroupPks'] = $trialScopeToScopeGroupPks;
        $self['userID'] = $userID;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withExpiresAt(int $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    public function withHubID(int $hubID): self
    {
        $self = clone $this;
        $self['hubID'] = $hubID;

        return $self;
    }

    public function withHublet(string $hublet): self
    {
        $self = clone $this;
        $self['hublet'] = $hublet;

        return $self;
    }

    public function withInstallingUserID(int $installingUserID): self
    {
        $self = clone $this;
        $self['installingUserID'] = $installingUserID;

        return $self;
    }

    public function withIsPrivateDistribution(bool $isPrivateDistribution): self
    {
        $self = clone $this;
        $self['isPrivateDistribution'] = $isPrivateDistribution;

        return $self;
    }

    public function withIsServiceAccount(bool $isServiceAccount): self
    {
        $self = clone $this;
        $self['isServiceAccount'] = $isServiceAccount;

        return $self;
    }

    public function withIsUserLevel(bool $isUserLevel): self
    {
        $self = clone $this;
        $self['isUserLevel'] = $isUserLevel;

        return $self;
    }

    public function withNewSignature(string $newSignature): self
    {
        $self = clone $this;
        $self['newSignature'] = $newSignature;

        return $self;
    }

    public function withScopes(string $scopes): self
    {
        $self = clone $this;
        $self['scopes'] = $scopes;

        return $self;
    }

    public function withScopeToScopeGroupPks(string $scopeToScopeGroupPks): self
    {
        $self = clone $this;
        $self['scopeToScopeGroupPks'] = $scopeToScopeGroupPks;

        return $self;
    }

    public function withSignature(string $signature): self
    {
        $self = clone $this;
        $self['signature'] = $signature;

        return $self;
    }

    public function withTrialScopes(string $trialScopes): self
    {
        $self = clone $this;
        $self['trialScopes'] = $trialScopes;

        return $self;
    }

    public function withTrialScopeToScopeGroupPks(
        string $trialScopeToScopeGroupPks
    ): self {
        $self = clone $this;
        $self['trialScopeToScopeGroupPks'] = $trialScopeToScopeGroupPks;

        return $self;
    }

    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
