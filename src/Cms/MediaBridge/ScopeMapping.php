<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\ScopeMapping\AccessLevel;
use HubspotSDK\Cms\MediaBridge\ScopeMapping\RequestAction;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ScopeMappingShape = array{
 *   accessLevel: AccessLevel|value-of<AccessLevel>,
 *   requestAction: RequestAction|value-of<RequestAction>,
 *   scopeName: string,
 * }
 */
final class ScopeMapping implements BaseModel
{
    /** @use SdkModel<ScopeMappingShape> */
    use SdkModel;

    /** @var value-of<AccessLevel> $accessLevel */
    #[Required(enum: AccessLevel::class)]
    public string $accessLevel;

    /** @var value-of<RequestAction> $requestAction */
    #[Required(enum: RequestAction::class)]
    public string $requestAction;

    #[Required]
    public string $scopeName;

    /**
     * `new ScopeMapping()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScopeMapping::with(accessLevel: ..., requestAction: ..., scopeName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScopeMapping)
     *   ->withAccessLevel(...)
     *   ->withRequestAction(...)
     *   ->withScopeName(...)
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
     * @param AccessLevel|value-of<AccessLevel> $accessLevel
     * @param RequestAction|value-of<RequestAction> $requestAction
     */
    public static function with(
        AccessLevel|string $accessLevel,
        RequestAction|string $requestAction,
        string $scopeName,
    ): self {
        $self = new self;

        $self['accessLevel'] = $accessLevel;
        $self['requestAction'] = $requestAction;
        $self['scopeName'] = $scopeName;

        return $self;
    }

    /**
     * @param AccessLevel|value-of<AccessLevel> $accessLevel
     */
    public function withAccessLevel(AccessLevel|string $accessLevel): self
    {
        $self = clone $this;
        $self['accessLevel'] = $accessLevel;

        return $self;
    }

    /**
     * @param RequestAction|value-of<RequestAction> $requestAction
     */
    public function withRequestAction(RequestAction|string $requestAction): self
    {
        $self = clone $this;
        $self['requestAction'] = $requestAction;

        return $self;
    }

    public function withScopeName(string $scopeName): self
    {
        $self = clone $this;
        $self['scopeName'] = $scopeName;

        return $self;
    }
}
