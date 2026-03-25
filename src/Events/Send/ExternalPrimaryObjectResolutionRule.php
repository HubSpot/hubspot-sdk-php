<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalPrimaryObjectResolutionRuleShape = array{
 *   eventPropertyName: string, targetObjectPropertyName: string
 * }
 */
final class ExternalPrimaryObjectResolutionRule implements BaseModel
{
    /** @use SdkModel<ExternalPrimaryObjectResolutionRuleShape> */
    use SdkModel;

    #[Required]
    public string $eventPropertyName;

    #[Required]
    public string $targetObjectPropertyName;

    /**
     * `new ExternalPrimaryObjectResolutionRule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalPrimaryObjectResolutionRule::with(
     *   eventPropertyName: ..., targetObjectPropertyName: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalPrimaryObjectResolutionRule)
     *   ->withEventPropertyName(...)
     *   ->withTargetObjectPropertyName(...)
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
        string $eventPropertyName,
        string $targetObjectPropertyName
    ): self {
        $self = new self;

        $self['eventPropertyName'] = $eventPropertyName;
        $self['targetObjectPropertyName'] = $targetObjectPropertyName;

        return $self;
    }

    public function withEventPropertyName(string $eventPropertyName): self
    {
        $self = clone $this;
        $self['eventPropertyName'] = $eventPropertyName;

        return $self;
    }

    public function withTargetObjectPropertyName(
        string $targetObjectPropertyName
    ): self {
        $self = clone $this;
        $self['targetObjectPropertyName'] = $targetObjectPropertyName;

        return $self;
    }
}
