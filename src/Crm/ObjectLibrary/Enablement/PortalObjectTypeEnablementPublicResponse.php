<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\ObjectLibrary\Enablement;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortalObjectTypeEnablementPublicResponseShape = array{
 *   enablementByObjectTypeID: array<string,bool>
 * }
 */
final class PortalObjectTypeEnablementPublicResponse implements BaseModel
{
    /** @use SdkModel<PortalObjectTypeEnablementPublicResponseShape> */
    use SdkModel;

    /**
     * A map of objectTypeId to whether that object type is enabled or not.
     *
     * @var array<string,bool> $enablementByObjectTypeID
     */
    #[Required('enablementByObjectTypeId', map: 'bool')]
    public array $enablementByObjectTypeID;

    /**
     * `new PortalObjectTypeEnablementPublicResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalObjectTypeEnablementPublicResponse::with(enablementByObjectTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortalObjectTypeEnablementPublicResponse)
     *   ->withEnablementByObjectTypeID(...)
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
     *
     * @param array<string,bool> $enablementByObjectTypeID
     */
    public static function with(array $enablementByObjectTypeID): self
    {
        $self = new self;

        $self['enablementByObjectTypeID'] = $enablementByObjectTypeID;

        return $self;
    }

    /**
     * A map of objectTypeId to whether that object type is enabled or not.
     *
     * @param array<string,bool> $enablementByObjectTypeID
     */
    public function withEnablementByObjectTypeID(
        array $enablementByObjectTypeID
    ): self {
        $self = clone $this;
        $self['enablementByObjectTypeID'] = $enablementByObjectTypeID;

        return $self;
    }
}
