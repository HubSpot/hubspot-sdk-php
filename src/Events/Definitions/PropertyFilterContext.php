<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PropertyFilterContextShape = array{objectTypeID: string}
 */
final class PropertyFilterContext implements BaseModel
{
    /** @use SdkModel<PropertyFilterContextShape> */
    use SdkModel;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * `new PropertyFilterContext()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyFilterContext::with(objectTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyFilterContext)->withObjectTypeID(...)
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
    public static function with(string $objectTypeID): self
    {
        $self = new self;

        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }
}
