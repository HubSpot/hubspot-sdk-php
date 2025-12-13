<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventListParams;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PropertyShape = array{_propname?: mixed}
 */
final class Property implements BaseModel
{
    /** @use SdkModel<PropertyShape> */
    use SdkModel;

    /**
     * Filter for event completions that contain a specific value for an event property (e.g., `property.hs_city=portland`). For properties values with spaces, replaces spaces with `%20` or `+` (e.g., `property.hs_city=new+york`).
     */
    #[Optional('{propname}')]
    public mixed $_propname;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(mixed $_propname = null): self
    {
        $self = new self;

        null !== $_propname && $self['_propname'] = $_propname;

        return $self;
    }

    /**
     * Filter for event completions that contain a specific value for an event property (e.g., `property.hs_city=portland`). For properties values with spaces, replaces spaces with `%20` or `+` (e.g., `property.hs_city=new+york`).
     */
    public function withPropname(mixed $_propname): self
    {
        $self = clone $this;
        $self['_propname'] = $_propname;

        return $self;
    }
}
