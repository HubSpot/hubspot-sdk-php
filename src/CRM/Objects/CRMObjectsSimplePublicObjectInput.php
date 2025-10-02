<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_objects_simple_public_object_input = array{
 *   properties: array<string, string>
 * }
 */
final class CRMObjectsSimplePublicObjectInput implements BaseModel
{
    /** @use SdkModel<crm_objects_simple_public_object_input> */
    use SdkModel;

    /** @var array<string, string> $properties */
    #[Api(map: 'string')]
    public array $properties;

    /**
     * `new CRMObjectsSimplePublicObjectInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsSimplePublicObjectInput::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsSimplePublicObjectInput)->withProperties(...)
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
     * @param array<string, string> $properties
     */
    public static function with(array $properties): self
    {
        $obj = new self;

        $obj->properties = $properties;

        return $obj;
    }

    /**
     * @param array<string, string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }
}
