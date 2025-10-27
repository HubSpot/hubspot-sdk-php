<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\ObjectLibrary;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type portal_object_type_enablement_public_response = array{
 *   enablementByObjectTypeID: array<string, bool>
 * }
 */
final class PortalObjectTypeEnablementPublicResponse implements BaseModel
{
    /** @use SdkModel<portal_object_type_enablement_public_response> */
    use SdkModel;

    /** @var array<string, bool> $enablementByObjectTypeID */
    #[Api('enablementByObjectTypeId', map: 'bool')]
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
     * @param array<string, bool> $enablementByObjectTypeID
     */
    public static function with(array $enablementByObjectTypeID): self
    {
        $obj = new self;

        $obj->enablementByObjectTypeID = $enablementByObjectTypeID;

        return $obj;
    }

    /**
     * @param array<string, bool> $enablementByObjectTypeID
     */
    public function withEnablementByObjectTypeID(
        array $enablementByObjectTypeID
    ): self {
        $obj = clone $this;
        $obj->enablementByObjectTypeID = $enablementByObjectTypeID;

        return $obj;
    }
}
