<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\ObjectLibrary\Enablement;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObjectTypeEnablementPublicResponseShape = array{enablement: bool}
 */
final class ObjectTypeEnablementPublicResponse implements BaseModel
{
    /** @use SdkModel<ObjectTypeEnablementPublicResponseShape> */
    use SdkModel;

    /**
     * Whether the object type is enabled or not.
     */
    #[Required]
    public bool $enablement;

    /**
     * `new ObjectTypeEnablementPublicResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectTypeEnablementPublicResponse::with(enablement: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectTypeEnablementPublicResponse)->withEnablement(...)
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
    public static function with(bool $enablement): self
    {
        $self = new self;

        $self['enablement'] = $enablement;

        return $self;
    }

    /**
     * Whether the object type is enabled or not.
     */
    public function withEnablement(bool $enablement): self
    {
        $self = clone $this;
        $self['enablement'] = $enablement;

        return $self;
    }
}
