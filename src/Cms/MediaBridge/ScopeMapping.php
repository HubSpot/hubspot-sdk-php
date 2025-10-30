<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public string $accessLevel;

    #[Api]
    public string $requestAction;

    #[Api]
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
        $obj = new self;

        $obj->accessLevel = $accessLevel;
        $obj->requestAction = $requestAction;
        $obj->scopeName = $scopeName;

        return $obj;
    }

    public function withAccessLevel(string $accessLevel): self
    {
        $obj = clone $this;
        $obj->accessLevel = $accessLevel;

        return $obj;
    }

    public function withRequestAction(string $requestAction): self
    {
        $obj = clone $this;
        $obj->requestAction = $requestAction;

        return $obj;
    }

    public function withScopeName(string $scopeName): self
    {
        $obj = clone $this;
        $obj->scopeName = $scopeName;

        return $obj;
    }
}
