<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Occurrences\OccurrenceListParams;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectPropertyShape = array{_propname?: mixed}
 */
final class ObjectProperty implements BaseModel
{
    /** @use SdkModel<ObjectPropertyShape> */
    use SdkModel;

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

    public function withPropname(mixed $_propname): self
    {
        $self = clone $this;
        $self['_propname'] = $_propname;

        return $self;
    }
}
