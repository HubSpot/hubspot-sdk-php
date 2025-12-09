<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
        $obj = new self;

        $obj['appID'] = $appID;
        $obj['expiresAt'] = $expiresAt;
        $obj['hubID'] = $hubID;
        $obj['hublet'] = $hublet;
        $obj['installingUserID'] = $installingUserID;
        $obj['isPrivateDistribution'] = $isPrivateDistribution;
        $obj['isServiceAccount'] = $isServiceAccount;
        $obj['isUserLevel'] = $isUserLevel;
        $obj['newSignature'] = $newSignature;
        $obj['scopes'] = $scopes;
        $obj['scopeToScopeGroupPks'] = $scopeToScopeGroupPks;
        $obj['signature'] = $signature;
        $obj['trialScopes'] = $trialScopes;
        $obj['trialScopeToScopeGroupPks'] = $trialScopeToScopeGroupPks;
        $obj['userID'] = $userID;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appID'] = $appID;

        return $obj;
    }

    public function withExpiresAt(int $expiresAt): self
    {
        $obj = clone $this;
        $obj['expiresAt'] = $expiresAt;

        return $obj;
    }

    public function withHubID(int $hubID): self
    {
        $obj = clone $this;
        $obj['hubID'] = $hubID;

        return $obj;
    }

    public function withHublet(string $hublet): self
    {
        $obj = clone $this;
        $obj['hublet'] = $hublet;

        return $obj;
    }

    public function withInstallingUserID(int $installingUserID): self
    {
        $obj = clone $this;
        $obj['installingUserID'] = $installingUserID;

        return $obj;
    }

    public function withIsPrivateDistribution(bool $isPrivateDistribution): self
    {
        $obj = clone $this;
        $obj['isPrivateDistribution'] = $isPrivateDistribution;

        return $obj;
    }

    public function withIsServiceAccount(bool $isServiceAccount): self
    {
        $obj = clone $this;
        $obj['isServiceAccount'] = $isServiceAccount;

        return $obj;
    }

    public function withIsUserLevel(bool $isUserLevel): self
    {
        $obj = clone $this;
        $obj['isUserLevel'] = $isUserLevel;

        return $obj;
    }

    public function withNewSignature(string $newSignature): self
    {
        $obj = clone $this;
        $obj['newSignature'] = $newSignature;

        return $obj;
    }

    public function withScopes(string $scopes): self
    {
        $obj = clone $this;
        $obj['scopes'] = $scopes;

        return $obj;
    }

    public function withScopeToScopeGroupPks(string $scopeToScopeGroupPks): self
    {
        $obj = clone $this;
        $obj['scopeToScopeGroupPks'] = $scopeToScopeGroupPks;

        return $obj;
    }

    public function withSignature(string $signature): self
    {
        $obj = clone $this;
        $obj['signature'] = $signature;

        return $obj;
    }

    public function withTrialScopes(string $trialScopes): self
    {
        $obj = clone $this;
        $obj['trialScopes'] = $trialScopes;

        return $obj;
    }

    public function withTrialScopeToScopeGroupPks(
        string $trialScopeToScopeGroupPks
    ): self {
        $obj = clone $this;
        $obj['trialScopeToScopeGroupPks'] = $trialScopeToScopeGroupPks;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }
}
