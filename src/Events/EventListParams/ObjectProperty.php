<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventListParams;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectPropertyShape = array{_propname?: mixed}
 */
final class ObjectProperty implements BaseModel
{
    /** @use SdkModel<ObjectPropertyShape> */
    use SdkModel;

    /**
     * Instead of retrieving event data for a specific object by its ID, you can specify a unique identifier property. For contacts, you can use the `email` property. (e.g., `objectProperty.email=name@domain.com`).
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
     * Instead of retrieving event data for a specific object by its ID, you can specify a unique identifier property. For contacts, you can use the `email` property. (e.g., `objectProperty.email=name@domain.com`).
     */
    public function withPropname(mixed $_propname): self
    {
        $self = clone $this;
        $self['_propname'] = $_propname;

        return $self;
    }
}
