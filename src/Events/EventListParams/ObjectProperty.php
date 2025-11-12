<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventListParams;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectPropertyShape = array{_propname_?: mixed}
 */
final class ObjectProperty implements BaseModel
{
    /** @use SdkModel<ObjectPropertyShape> */
    use SdkModel;

    /**
     * Instead of retrieving event data for a specific object by its ID, you can specify a unique identifier property. For contacts, you can use the `email` property. (e.g., `objectProperty.email=name@domain.com`).
     */
    #[Api('{propname}', optional: true)]
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

        null !== $_propname_ && $obj->_propname_ = $_propname_;

        return $obj;
    }

    /**
     * Instead of retrieving event data for a specific object by its ID, you can specify a unique identifier property. For contacts, you can use the `email` property. (e.g., `objectProperty.email=name@domain.com`).
     */
    public function withPropname(mixed $propname): self
    {
        $obj = clone $this;
        $obj->_propname_ = $propname;

        return $obj;
    }
}
