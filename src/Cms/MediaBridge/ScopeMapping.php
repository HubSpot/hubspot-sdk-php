<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ScopeMappingShape = array{
 *   accessLevel: string, requestAction: string, scopeName: string
 * }
 */
final class ScopeMapping implements BaseModel
{
    /** @use SdkModel<ScopeMappingShape> */
    use SdkModel;

    #[Required]
    public string $accessLevel;

    #[Required]
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
     */
    public static function with(
        string $accessLevel,
        string $requestAction,
        string $scopeName
    ): self {
        $self = new self;

        $self['accessLevel'] = $accessLevel;
        $self['requestAction'] = $requestAction;
        $self['scopeName'] = $scopeName;

        return $self;
    }

    public function withAccessLevel(string $accessLevel): self
    {
        $self = clone $this;
        $self['accessLevel'] = $accessLevel;

        return $self;
    }

    public function withRequestAction(string $requestAction): self
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
