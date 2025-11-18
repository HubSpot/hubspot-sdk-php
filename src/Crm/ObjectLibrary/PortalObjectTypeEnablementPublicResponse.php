<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\ObjectLibrary;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortalObjectTypeEnablementPublicResponseShape = array{
 *   enablementByObjectTypeId: array<string,bool>
 * }
 */
final class PortalObjectTypeEnablementPublicResponse implements BaseModel
{
    /** @use SdkModel<PortalObjectTypeEnablementPublicResponseShape> */
    use SdkModel;

    /**
     * A map of objectTypeId to whether that object type is enabled or not.
     *
     * @var array<string,bool> $enablementByObjectTypeId
     */
    #[Api(map: 'bool')]
    public array $enablementByObjectTypeId;

    /**
     * `new PortalObjectTypeEnablementPublicResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalObjectTypeEnablementPublicResponse::with(enablementByObjectTypeId: ...)
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
     * @param array<string,bool> $enablementByObjectTypeId
     */
    public static function with(array $enablementByObjectTypeId): self
    {
        $obj = new self;

        $obj->enablementByObjectTypeId = $enablementByObjectTypeId;

        return $obj;
    }

    /**
     * A map of objectTypeId to whether that object type is enabled or not.
     *
     * @param array<string,bool> $enablementByObjectTypeID
     */
    public function withEnablementByObjectTypeID(
        array $enablementByObjectTypeID
    ): self {
        $obj = clone $this;
        $obj->enablementByObjectTypeId = $enablementByObjectTypeID;

        return $obj;
    }
}
