<?php

declare(strict_types=1);

namespace HubspotSDK\Auth\OAuth;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SignedAccessTokenShape = array{
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
 * }
 */
final class SignedAccessToken implements BaseModel
{
    /** @use SdkModel<SignedAccessTokenShape> */
    use SdkModel;

    #[Api]
    public int $appId;

    #[Api]
    public int $expiresAt;

    #[Api]
    public int $hubId;

    #[Api]
    public string $hublet;

    #[Api]
    public int $installingUserId;

    #[Api]
    public bool $isPrivateDistribution;

    #[Api]
    public bool $isServiceAccount;

    #[Api]
    public bool $isUserLevel;

    #[Api]
    public string $newSignature;

    #[Api]
    public string $scopes;

    #[Api]
    public string $scopeToScopeGroupPks;

    #[Api]
    public string $signature;

    #[Api]
    public string $trialScopes;

    #[Api]
    public string $trialScopeToScopeGroupPks;

    #[Api]
    public int $userId;

    /**
     * `new SignedAccessToken()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SignedAccessToken::with(
     *   appId: ...,
     *   expiresAt: ...,
     *   hubId: ...,
     *   hublet: ...,
     *   installingUserId: ...,
     *   isPrivateDistribution: ...,
     *   isServiceAccount: ...,
     *   isUserLevel: ...,
     *   newSignature: ...,
     *   scopes: ...,
     *   scopeToScopeGroupPks: ...,
     *   signature: ...,
     *   trialScopes: ...,
     *   trialScopeToScopeGroupPks: ...,
     *   userId: ...,
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
        int $appId,
        int $expiresAt,
        int $hubId,
        string $hublet,
        int $installingUserId,
        bool $isPrivateDistribution,
        bool $isServiceAccount,
        bool $isUserLevel,
        string $newSignature,
        string $scopes,
        string $scopeToScopeGroupPks,
        string $signature,
        string $trialScopes,
        string $trialScopeToScopeGroupPks,
        int $userId,
    ): self {
        $obj = new self;

        $obj->appId = $appId;
        $obj->expiresAt = $expiresAt;
        $obj->hubId = $hubId;
        $obj->hublet = $hublet;
        $obj->installingUserId = $installingUserId;
        $obj->isPrivateDistribution = $isPrivateDistribution;
        $obj->isServiceAccount = $isServiceAccount;
        $obj->isUserLevel = $isUserLevel;
        $obj->newSignature = $newSignature;
        $obj->scopes = $scopes;
        $obj->scopeToScopeGroupPks = $scopeToScopeGroupPks;
        $obj->signature = $signature;
        $obj->trialScopes = $trialScopes;
        $obj->trialScopeToScopeGroupPks = $trialScopeToScopeGroupPks;
        $obj->userId = $userId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

        return $obj;
    }

    public function withExpiresAt(int $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    public function withHubID(int $hubID): self
    {
        $obj = clone $this;
        $obj->hubId = $hubID;

        return $obj;
    }

    public function withHublet(string $hublet): self
    {
        $obj = clone $this;
        $obj->hublet = $hublet;

        return $obj;
    }

    public function withInstallingUserID(int $installingUserID): self
    {
        $obj = clone $this;
        $obj->installingUserId = $installingUserID;

        return $obj;
    }

    public function withIsPrivateDistribution(bool $isPrivateDistribution): self
    {
        $obj = clone $this;
        $obj->isPrivateDistribution = $isPrivateDistribution;

        return $obj;
    }

    public function withIsServiceAccount(bool $isServiceAccount): self
    {
        $obj = clone $this;
        $obj->isServiceAccount = $isServiceAccount;

        return $obj;
    }

    public function withIsUserLevel(bool $isUserLevel): self
    {
        $obj = clone $this;
        $obj->isUserLevel = $isUserLevel;

        return $obj;
    }

    public function withNewSignature(string $newSignature): self
    {
        $obj = clone $this;
        $obj->newSignature = $newSignature;

        return $obj;
    }

    public function withScopes(string $scopes): self
    {
        $obj = clone $this;
        $obj->scopes = $scopes;

        return $obj;
    }

    public function withScopeToScopeGroupPks(string $scopeToScopeGroupPks): self
    {
        $obj = clone $this;
        $obj->scopeToScopeGroupPks = $scopeToScopeGroupPks;

        return $obj;
    }

    public function withSignature(string $signature): self
    {
        $obj = clone $this;
        $obj->signature = $signature;

        return $obj;
    }

    public function withTrialScopes(string $trialScopes): self
    {
        $obj = clone $this;
        $obj->trialScopes = $trialScopes;

        return $obj;
    }

    public function withTrialScopeToScopeGroupPks(
        string $trialScopeToScopeGroupPks
    ): self {
        $obj = clone $this;
        $obj->trialScopeToScopeGroupPks = $trialScopeToScopeGroupPks;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userId = $userID;

        return $obj;
    }
}
