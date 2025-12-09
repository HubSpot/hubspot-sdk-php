<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CrmPropertyWrapperShape = array{name: string, value: string}
 */
final class CrmPropertyWrapper implements BaseModel
{
    /** @use SdkModel<CrmPropertyWrapperShape> */
    use SdkModel;

    #[Required]
    public string $name;

    #[Required]
    public string $value;

    /**
     * `new CrmPropertyWrapper()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CrmPropertyWrapper::with(name: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CrmPropertyWrapper)->withName(...)->withValue(...)
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
    public static function with(string $name, string $value): self
    {
        $self = new self;

        $self['name'] = $name;
        $self['value'] = $value;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
