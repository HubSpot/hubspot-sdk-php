<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\ObjectLibrary;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type object_type_enablement_public_response = array{enablement: bool}
 */
final class ObjectTypeEnablementPublicResponse implements BaseModel
{
    /** @use SdkModel<object_type_enablement_public_response> */
    use SdkModel;

    #[Api]
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
        $obj = new self;

        $obj->enablement = $enablement;

        return $obj;
    }

    public function withEnablement(bool $enablement): self
    {
        $obj = clone $this;
        $obj->enablement = $enablement;

        return $obj;
    }
}
