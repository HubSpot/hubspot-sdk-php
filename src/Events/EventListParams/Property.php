<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventListParams;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PropertyShape = array{_propname_?: mixed}
 */
final class Property implements BaseModel
{
    /** @use SdkModel<PropertyShape> */
    use SdkModel;

    /**
     * Filter for event completions that contain a specific value for an event property (e.g., `property.hs_city=portland`). For properties values with spaces, replaces spaces with `%20` or `+` (e.g., `property.hs_city=new+york`).
     */
    #[Optional('{propname}')]
    public mixed $_propname_;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(mixed $_propname_ = null): self
    {
        $obj = new self;

        null !== $_propname_ && $obj['_propname_'] = $_propname_;

        return $obj;
    }

    /**
     * Filter for event completions that contain a specific value for an event property (e.g., `property.hs_city=portland`). For properties values with spaces, replaces spaces with `%20` or `+` (e.g., `property.hs_city=new+york`).
     */
    public function withPropname(mixed $propname): self
    {
        $obj = clone $this;
        $obj['_propname_'] = $propname;

        return $obj;
    }
}
